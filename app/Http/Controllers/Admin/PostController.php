<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post, App\Course, App\Module;
use Session, Auth, Validator, File;

class PostController extends Controller { 


    public $globalvar = array(
            'mainname' => 'Post',
            'mainweb' => 'post',
            'model' => 'App\Post',
            'routeindex' => 'gtpadmin.post.index',
            'routecreate' => 'gtpadmin.post.create',
            'routedestroy' => 'gtpadmin.post.destroy',
            'routeedit' => 'gtpadmin.post.edit',
            'routepublish' => 'gtpadmin.post.publish',
            'routeupdate' => 'gtpadmin.post.update',
            'routeunpublish' => 'gtpadmin.post.unpublish',
            'routestore' => 'gtpadmin.post.store',
            'routeshow' => 'gtpadmin.post.show',
            'viewindex' => 'admin.post.index',
            'viewcreate' => 'admin.post.create',
            'viewedit' => 'admin.post.edit',
            'viewshow' => 'admin.post.show',
            'urlcreate' => 'gtpadmin/post/create',
            'creationsuccess' => 'Post created successfully',
            'updationsuccess' => 'Post updated successfully',
            'publishsuccess' => 'Post pubslished successfully',
            'unpublishsuccess' => 'Post unpubslished successfully',
            'deletionsuccess' => 'Post deleted successfully',
            'filenotvalidmessage' => 'Uploaded file is not valid',
            'createpagetitle' => 'Create Post',
            'editpagetitle' => 'Edit Post',
            'indexpagetitle' => 'All Posts',
            'totalitems' => 'Total Posts',
            'postsinindex' => 5,
            'uploadpath' => 'uploads/post'
    );

    private $indexcolumns = array('#','Title','Question','Answer', 'Created At','Actions');

    

    private $dbresource = array('id' => 'ID', 'title' => 'Post Title', 'slug' => 'Post Slug', 'subject' => 'Question', 'image' => 'Post Image', 'body' => 'Answer', 'course_id' => 'Course Name' , 'module_id' => 'Module Name');

    private $validatewithslug = array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'image'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subject' => 'required',
            'course_id' => 'required',
            'module_id' => 'required',
            'body' => 'required',
        );

    /*
     * database name of publish property or column.
     */
    private $resourcepublish = 'published';

    /*
     * database name of image property or column.
     */
    private $imageresource = 'image';

    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = $this->globalvar['model']::orderBy('id', 'desc')->paginate( $this->globalvar['postsinindex']);
        return view($this->globalvar['viewindex'])
                      ->withPosts($posts)
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
      if(Course::count()==0)
      {
        Session::flash('warning', 'You need to create a course to continue.');
        return redirect()->back();
      }
         $coursesavailable = Course::all()->pluck( 'name', 'id');
        $formfields = array(
                        array(
                        'label' => 'Post Title',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'title',
                        'value' => '',
                        'name' => 'title',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter post slug here.'
                          )
                        ),
                        array(
                        'label' => 'Post Slug',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'slug',
                        'value' => '',
                        'name' => 'slug',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter post slug here.'
                          )
                        ),
                        array(
                        'label' => 'Question',
                        'icon' => 'fa-user',
                        'type' => 'textarea',
                        'id' => 'subject',
                        'value' => '',
                        'name' => 'subject',
                        'options' => array(

                            'style' => 'height:200px;width:100%',
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter question here.'
                          )
                        ),
                        array(
                        'label' => 'Answer',
                        'icon' => 'fa-user',
                        'type' => 'textarea',
                        'id' => 'body',
                        'value' => '',
                        'name' => 'body',
                        'options' => array(
                            'style' => 'height:200px;width:100%',
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter answer here.'
                          )
                        ),
                      array(
                        'label' => 'Image',
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
                        'name' => 'course_id',
                        'coptions' => $coursesavailable,
                        'value' => '',
                        'options' => array(
                            'id' => 'course_id',
                            'class' => 'form-control mb-md'
                          )
                        ),
                      array(
                        'label' => 'Module ID',
                        'icon' => 'fa-user',
                        'type' => 'select',
                        'name' => 'module_id',
                        'coptions' => array(),
                        'value' => '',
                        'options' => array(
                            'id' => 'module_id',
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
          $post = '';
          $imageName = $this->checkimageandsave($request, $post ,$resourceimage);

        //2. Store in the DB
        $post = new $this->globalvar['model'];

        foreach ($this->validatewithslug as $validkey => $value) 
        {
            if($validkey==$this->imageresource){
                $post->$validkey = $imageName;
            }
            else{
              $post->$validkey = $request->$validkey;
            }

        }

        $post->save();

        Session::flash('success', $this->globalvar['creationsuccess']);
        return redirect()->route($this->globalvar['routeshow'], $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = $this->globalvar['model']::find($id);
        $post->module_id = Module::find($post->module_id)->value('name');
        $post->course_id = Course::find($post->course_id)->value('name'); 
        return view($this->globalvar['viewshow'])
                  ->withPost($post)
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
        //find the post in the db ans save as a var
        $post = $this->globalvar['model']::find($id);

        $coursesavailable = Course::all()->pluck( 'name', 'id');
        // var_dump((array)$modulesavailable);
        $formfields = array(
                        array(
                        'label' => 'Post Title',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'title',
                        'value' => $post->title,
                        'name' => 'title',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter post slug here.'
                          )
                        ),
                        array(
                        'label' => 'Post Slug',
                        'icon' => 'fa-user',
                        'type' => 'text',
                        'id' => 'slug',
                        'value' => $post->slug,
                        'name' => 'slug',
                        'options' => array(
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter post slug here.'
                          )
                        ),
                        array(
                        'label' => 'Question',
                        'icon' => 'fa-user',
                        'type' => 'textarea',
                        'id' => 'subject',
                        'value' => $post->subject,
                        'name' => 'subject',
                        'options' => array(

                            'style' => 'height:200px;width:100%',
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter question here.'
                          )
                        ),
                        array(
                        'label' => 'Answer',
                        'icon' => 'fa-user',
                        'type' => 'textarea',
                        'id' => 'body',
                        'value' => $post->body,
                        'name' => 'body',
                        'options' => array(
                            'style' => 'height:200px;width:100%',
                            'class' => 'form-control border-input',
                            'placeholder' => 'Enter answer here.'
                          )
                        ),
                      array(
                        'label' => 'Image',
                        'icon' => 'fa-user',
                        'type' => 'file',
                        'id' => 'image',
                        'name' => 'image',
                        'value' => $post->image,
                        'placeholder' => '',
                        ),
                      array(
                        'label' => 'Course ID',
                        'icon' => 'fa-user',
                        'type' => 'select',
                        'name' => 'course_id',
                        'coptions' => $coursesavailable,
                        'value' => '',
                        'options' => array(
                            'id' => 'course_id',
                            'class' => 'form-control mb-md'
                          )
                        ),
                      array(
                        'label' => 'Module ID',
                        'icon' => 'fa-user',
                        'type' => 'select',
                        'name' => 'module_id',
                        'coptions' => array(),
                        'value' => $post->module_id,
                        'options' => array(
                            'id' => 'module_id',
                            'class' => 'form-control mb-md'
                          )
                        )
                    );

        //return the view and pass in the var we previously created
        return view($this->globalvar['viewedit'])
                    ->withPost($post)
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
        $post = $this->globalvar['model']::find($id);

        $validationrules = $this->validatewithslug;

        if ($request->input('slug') == $post->slug ) {
            unset($validationrules['slug']);
            $this->validate($request, $validationrules);
        }

        else{
            $this->validate($request, $validationrules);
        }

        $resourceimage = $this->imageresource;
        $imageName = $this->checkimageandsave($request, $post ,$resourceimage);
        
        

        //save the data
        foreach ($validationrules as $validkey => $value) 
        {
            if($validkey==$this->imageresource){
              if(!empty($imageName))
                $post->$validkey = $imageName;
            }
            else{
              $post->$validkey = $request->$validkey;
            }

        }

        $post->save();

        Session::flash('success', $this->globalvar['updationsuccess']);

        return redirect()->route($this->globalvar['routeshow'], $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $post = $this->globalvar['model']::find($id);
        $resourceimage = $this->imageresource;
        File::delete($this->globalvar['uploadpath'].'/'.$post->$resourceimage);
        $post->delete();

        Session::flash('Success', $this->globalvar['deletionsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function publish($id)
    {
        $post = $this->globalvar['model']::find($id);
        $publishresource = $this->resourcepublish;
        $post->$publishresource = 1;
        $post->save();

        Session::flash('Success', $this->globalvar['publishsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }

    public function unpublish($id)
    {
        $post = $this->globalvar['model']::find($id);
        $publishresource = $this->resourcepublish;
        $post->$publishresource = 0;
        $post->save();

        Session::flash('Success', $this->globalvar['unpublishsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function checkimageandsave(Request $request, $post,$resourceimage)
    {
        if($request->hasfile($resourceimage))
        {
            if($request->file($resourceimage)->isValid())
            {
                if(!empty($post))
                    File::delete($this->globalvar['uploadpath'].'/'.$post->image);
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

    public function getModulesByCourseId(Request $request)
    {
      $modules = Module::where('course_id', $request->id)->get();
      return json_encode($modules);
    }

    

}
