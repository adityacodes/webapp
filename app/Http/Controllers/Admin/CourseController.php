<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course, Auth, Session, Validator, File;

class CourseController extends Controller
{
     private $globalvar = array(
            'mainname' => 'Course',
            'mainweb' => 'course',
            'model' => 'App\Course',
            'routeindex' => 'gtpadmin.course.index',
            'routecreate' => 'gtpadmin.course.create',
            'routedestroy' => 'gtpadmin.course.destroy',
            'routeedit' => 'gtpadmin.course.edit',
            'routepublish' => 'gtpadmin.course.publish',
            'routeupdate' => 'gtpadmin.course.update',
            'routeunpublish' => 'gtpadmin.course.unpublish',
            'routestore' => 'gtpadmin.course.store',
            'routeshow' => 'gtpadmin.course.show',
            'viewindex' => 'admin.course.index',
            'viewcreate' => 'admin.course.create',
            'viewedit' => 'admin.course.edit',
            'viewshow' => 'admin.course.show',
            'urlcreate' => 'gtpadmin/course/create',
            'creationsuccess' => 'course created successfully',
            'updationsuccess' => 'course updated successfully',
            'publishsuccess' => 'course pubslished successfully',
            'unpublishsuccess' => 'course unpubslished successfully',
            'deletionsuccess' => 'course deleted successfully',
            'filenotvalidmessage' => 'Uploaded file is not valid',
            'editpagetitle' => 'Edit course',
            'indexpagetitle' => 'All courses',
            'totalitems' => 'Total courses',
            'coursesinindex' => 5,
            'uploadpath' => 'uploads/course'
    );


    private $indexcolumns = array('#','Course Id','Name','Slug', 'Modules','Created At','Actions');

    private $validatewithslug = array(
            'course_id' => 'required|max:255',
            'name' => 'required',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:courses,slug',
            'image'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );

    /*
     * database name of publish property or column.
     */
    private $resourcepublish = 'published';

    /*
     * database name of image property or column.
     */
    private $imageresource = 'image';



    /*
     * database name of slug property or column.
     */
    private $slugresource = 'slug';

    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $courses = $this->globalvar['model']::orderBy('id', 'desc')->paginate( $this->globalvar['coursesinindex']);
        return view($this->globalvar['viewindex'])
                      ->with('courses' , $courses)
                      ->with('globalvar', $this->globalvar)
                      ->with('indexcolumns', $this->indexcolumns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formfields = array(array(
                        'label' => 'Course ID',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'course_id',
                        'value' => 'CI'.time(),
                        'name' => 'course_id',
                        'options' => array(
                            'value' => 'CI'.time(),
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter course slug here.'
                          )
                        ),
                        array(
                        'label' => 'Course Name',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'name',
                        'value' => '',
                        'name' => 'name',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter course name here.'
                          )
                        ),
                        array(
                        'label' => 'Slug',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'slug',
                        'value' => '',
                        'name' => 'slug',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter course slug here.'
                          )
                        ),
                      array(
                        'label' => 'Course Image',
                        'icon' => 'fa-user',
                        'type' => 'file',
                        'id' => 'image',
                        'name' => 'image',
                        'value' => '',
                        'placeholder' => '',
                        )
                    );

        return view($this->globalvar['viewcreate'])
                      ->with('globalvar', $this->globalvar)
                      ->with('formfields', $formfields);
    }

    /**\
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //1. validate the date
         $validator = Validator::make($request->all(), $this->validatewithslug);

          if ($validator->fails()) {
            return redirect($this->globalvar['urlcreate'])
                        ->withErrors($validator)
                        ->withInput();
          }

          $resourceimage = $this->imageresource;
          $courseer = '';
          $imageName = $this->checkimageandsave($request, $courseer ,$resourceimage);

        //2. Store in the DB
        $course = new $this->globalvar['model'];

        foreach ($this->validatewithslug as $validkey => $value) 
        {
            if($validkey==$this->imageresource){
                $course->$validkey = $imageName;
            }
            else{
              $course->$validkey = $request->$validkey;
            }

        }

        $course->save();

        Session::flash('success', $this->globalvar['creationsuccess']);
        return redirect()->route($this->globalvar['routeshow'], $course->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $course = $this->globalvar['model']::find($id);
        return view($this->globalvar['viewshow'])->with('course',$course)->with('globalvar', $this->globalvar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //find the course in the db ans save as a var
        $course = $this->globalvar['model']::find($id);
        //return the view and pass in the var we previously created
        return view($this->globalvar['viewedit'])->with('course',$course)->with('globalvar', $this->globalvar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        //validate data
        $course = $this->globalvar['model']::find($id);

        $validationrules = $this->validatewithslug;

        $slugname = $this->slugresource; //Name in databse

        if ($request->input($slugname) == $course->$slugname ) {
            unset($validationrules[$slugname]);
            $this->validate($request, $validationrules);
        }

        else{
            $this->validate($request, $validationrules);
        }

        $resourceimage = $this->imageresource;
        $imageName = $this->checkimageandsave($request, $course ,$resourceimage);
        
        

        //save the data
        foreach ($validationrules as $validkey => $value) 
        {
            if($validkey==$this->imageresource){
              if(!empty($imageName))
                $course->$validkey = $imageName;
            }
            else{
              $course->$validkey = $request->$validkey;
            }

        }

        $course->save();

        Session::flash('success', $this->globalvar['updationsuccess']);

        return redirect()->route($this->globalvar['routeshow'], $course->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $course = $this->globalvar['model']::find($id);
        $resourceimage = $this->imageresource;
        File::delete($this->globalvar['uploadpath'].'/'.$course->$resourceimage);
        $course->delete();

        Session::flash('Success', $this->globalvar['deletionsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function publish($id)
    {
        $course = $this->globalvar['model']::find($id);
        $publishresource = $this->resourcepublish;
        $course->$publishresource = 1;
        $course->save();

        Session::flash('Success', $this->globalvar['publishsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }

    public function unpublish($id)
    {
        $course = $this->globalvar['model']::find($id);
        $publishresource = $this->resourcepublish;
        $course->$publishresource = 0;
        $course->save();

        Session::flash('Success', $this->globalvar['unpublishsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function checkimageandsave(Request $request, $course,$resourceimage)
    {
        if($request->hasfile($resourceimage))
        {
            if($request->file($resourceimage)->isValid())
            {
                if(!empty($course))
                    File::delete($this->globalvar['uploadpath'].'/'.$course->image);
                $imageName = time().'.'.$request->file($resourceimage)->getClientOriginalExtension();
                $request->file($resourceimage)->move($this->globalvar['uploadpath'], $imageName);

                return $imageName;
                
            }
            else{     
              // sending back with error message.
              Session::flash('warning', $this->globalvar['filenotvalidmessage']);
              return back()->withErrors($validator)
                            ->withInput();
            }

        }
    }
}
