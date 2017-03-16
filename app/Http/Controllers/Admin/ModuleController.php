<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Module, Validator, Session, App\Course, File;

class ModuleController extends Controller
{
    private $globalvar = array(
            'mainname' => 'Module',
            'i' => 1,
            'mainweb' => 'module',
            'model' => 'App\Module',
            'routeindex' => 'gtpadmin.module.index',
            'routecreate' => 'gtpadmin.module.create',
            'routedestroy' => 'gtpadmin.module.destroy',
            'routeedit' => 'gtpadmin.module.edit',
            'routepublish' => 'gtpadmin.module.publish',
            'routeupdate' => 'gtpadmin.module.update',
            'routeunpublish' => 'gtpadmin.module.unpublish',
            'routestore' => 'gtpadmin.module.store',
            'routeshow' => 'gtpadmin.module.show',
            'viewindex' => 'admin.module.index',
            'viewcreate' => 'admin.module.create',
            'viewedit' => 'admin.module.edit',
            'viewshow' => 'admin.module.show',
            'urlcreate' => 'gtpadmin/module/create',
            'creationsuccess' => 'Module created successfully',
            'updationsuccess' => 'Module updated successfully',
            'publishsuccess' => 'Module pubslished successfully',
            'unpublishsuccess' => 'Module unpubslished successfully',
            'deletionsuccess' => 'Module deleted successfully',
            'filenotvalidmessage' => 'Uploaded file is not valid',
            'createpagetitle' => 'Create Module',
            'editpagetitle' => 'Edit Module',
            'indexpagetitle' => 'All Modules',
            'totalitems' => 'Total Modules',
            'modulesinindex' => 5,
            'uploadpath' => 'uploads/module',
            'type' => 'text'
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
    private $slugresource = 'module_id';

    private $dbresource = array('id' => 'ID', 'module_id' => 'Module ID', 'name' => 'Module Name', 'image' => 'Module Image', 'course_id' => 'Course Name');

    private $indexcolumns = array('#','Module ID','Module Name','Course Name', 'Created At','Actions');

    private $validatewithslug = array(
            'module_id'  => 'required|alpha_dash|min:5|max:255|unique:modules,module_id',
            'name' => 'required|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'course_id' => 'required',
        );

    

    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $modules = $this->globalvar['model']::orderBy('id', 'desc')->paginate( $this->globalvar['modulesinindex']);
        foreach($modules as &$module)
        {
          $course = Course::find($module->id);
          $module->course_id = $course->name;
        }
        return view($this->globalvar['viewindex'])
                      ->with('modules' , $modules)
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
        $coursesavailable = Course::all()->pluck( 'name', 'id');
        // var_dump((array)$coursesavailable);
        $formfields = array(array(
                        'label' => 'Module ID',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'module_id',
                        'value' => 'MD'.time(),
                        'name' => 'module_id',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter module slug here.'
                          )
                        ),
                        array(
                        'label' => 'Module Name',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'name',
                        'value' => '',
                        'name' => 'name',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter module name here.'
                          )
                        ),
                      array(
                        'label' => 'Module Image',
                        'icon' => 'fa-user',
                        'type' => 'file',
                        'id' => 'image',
                        'name' => 'image',
                        'value' => '',
                        'placeholder' => '',
                        ),
                      array(
                        'label' => 'Course ID',
                        'icon' => 'fa-user',
                        'type' => 'select',
                        'id' => 'course_id',
                        'name' => 'course_id',
                        'coptions' => $coursesavailable,
                        'value' => 'S',
                        'options' => array(
                            'class' => 'form-control mb-md'
                          )
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
          $moduleer = '';
          $imageName = $this->checkimageandsave($request, $moduleer ,$resourceimage);

        //2. Store in the DB
        $module = new $this->globalvar['model'];

        foreach ($this->validatewithslug as $validkey => $value) 
        {
            if($validkey==$this->imageresource){
                $module->$validkey = $imageName;
            }
            else{
              $module->$validkey = $request->$validkey;
            }

        }

        $module->save();

        Session::flash('success', $this->globalvar['creationsuccess']);
        return redirect()->route($this->globalvar['routeshow'], $module->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $module = $this->globalvar['model']::find($id);
        $course = Course::find($module->course_id);
        $module->course_id = $course->name;

        return view($this->globalvar['viewshow'])
                  ->with('module',$module)
                  ->with('globalvar', $this->globalvar)
                  ->with('dbresources', $this->dbresource);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //find the module in the db ans save as a var
        $module = $this->globalvar['model']::find($id);

        $coursesavailable = Course::all()->pluck( 'name', 'id');
        // var_dump((array)$coursesavailable);
        $formfields = array(array(
                        'label' => 'Module ID',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'module_id',
                        'value' => $module->module_id,
                        'name' => 'module_id',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter module slug here.'
                          )
                        ),
                        array(
                        'label' => 'Module Name',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'name',
                        'value' => $module->name,
                        'name' => 'name',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter module name here.'
                          )
                        ),
                      array(
                        'label' => 'Module Image',
                        'icon' => 'fa-user',
                        'type' => 'file',
                        'id' => 'image',
                        'name' => 'image',
                        'value' => $module->image,
                        'placeholder' => '',
                        ),
                      array(
                        'label' => 'Course ID',
                        'icon' => 'fa-user',
                        'type' => 'select',
                        'id' => 'course_id',
                        'name' => 'course_id',
                        'coptions' => $coursesavailable,
                        'value' => $module->course_id,
                        'options' => array(
                            'class' => 'form-control mb-md'
                          )
                        )
                    );

        //return the view and pass in the var we previously created
        return view($this->globalvar['viewedit'])
                        ->with('module',$module)
                        ->with('globalvar', $this->globalvar)
                        ->with('formfields', $formfields);
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
        $module = $this->globalvar['model']::find($id);

        $validationrules = $this->validatewithslug;

        $slugname = $this->slugresource; //Name in databse

        if ($request->input($slugname) == $module->$slugname ) {
            unset($validationrules[$slugname]);
            $this->validate($request, $validationrules);
        }

        else{
            $this->validate($request, $validationrules);
        }

        $resourceimage = $this->imageresource;
        $imageName = $this->checkimageandsave($request, $module ,$resourceimage);
        
        

        //save the data
        foreach ($validationrules as $validkey => $value) 
        {
            if($validkey==$this->imageresource){
              if(!empty($imageName))
                $module->$validkey = $imageName;
            }
            else{
              $module->$validkey = $request->$validkey;
            }

        }

        $module->save();

        Session::flash('success', $this->globalvar['updationsuccess']);

        return redirect()->route($this->globalvar['routeshow'], $module->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $module = $this->globalvar['model']::find($id);
        $resourceimage = $this->imageresource;
        File::delete($this->globalvar['uploadpath'].'/'.$module->$resourceimage);
        $module->delete();

        Session::flash('Success', $this->globalvar['deletionsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function publish($id)
    {
        $module = $this->globalvar['model']::find($id);
        $publishresource = $this->resourcepublish;
        $module->$publishresource = 1;
        $module->save();

        Session::flash('Success', $this->globalvar['publishsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }

    public function unpublish($id)
    {
        $module = $this->globalvar['model']::find($id);
        $publishresource = $this->resourcepublish;
        $module->$publishresource = 0;
        $module->save();

        Session::flash('Success', $this->globalvar['unpublishsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function checkimageandsave(Request $request, $module,$resourceimage)
    {
        if($request->hasfile($resourceimage))
        {
            if($request->file($resourceimage)->isValid())
            {
                if(!empty($module))
                    File::delete($this->globalvar['uploadpath'].'/'.$module->image);
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
