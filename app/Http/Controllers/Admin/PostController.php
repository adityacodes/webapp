<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session, Auth, Validator, File;

class PostController extends Controller {

    private $uploadPath = 'uploads/post';

    public $globalvar = array(
            'model' => 'App\Post',
            'routeindex' => 'gtpadmin.post.index',
            'routecreate' => 'gtpadmin.post.create',
            'routedestroy' => 'gtpadmin.post.destroy',
            'routeedit' => 'gtpadmin.post.edit',
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
            'deletionsuccess' => 'Post deleted successfully',
            'filenotvalidmessage' => 'Uploaded file is not valid'
    );

    private $validatewithslug = array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'post_image'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subject' => 'required',
            'body' => 'required',
        );

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = $this->globalvar['model']::orderBy('id', 'desc')->paginate(5);
        return view($this->globalvar['viewindex'])->withPosts($posts)->with('globalvar', $this->globalvar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->globalvar['viewcreate'])->with('globalvar', $this->globalvar);
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

          $resourceimage = 'post_image';
          $post = '';
          $imageName = $this->checkimageandsave($request, $post ,$resourceimage);

        //2. Store in the DB
        $post = new $this->globalvar['model'];
        $post->image = $imageName;
        $post->subject = $request->subject;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

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
        return view($this->globalvar['viewshow'])->withPost($post);
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
        //return the view and pass in the var we previously created
        return view($this->globalvar['viewedit'])->withPost($post)->with('globalvar', $this->globalvar);
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

        $resourceimage = 'post_image';
        $imageName = $this->checkimageandsave($request, $post ,$resourceimage);
        
        

        //save the data
        $post->title = $request->title;
        $post->slug = $request->slug;
        if(!empty($imageName))
            $post->image = $imageName;
        $post->body = $request->body;

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
        File::delete($this->uploadPath.'/'.$post->image);
        $post->delete();

        Session::flash('Success', $this->globalvar['deletionsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function publish($id)
    {
        $post = $this->globalvar['model']::find($id);
        $post->publish = 1;
        $post->save();

        Session::flash('Success', $this->globalvar['publishsuccess']);
        return redirect()->route($this->globalvar['routeindex']);
    }


    public function checkimageandsave(Request $request, $post,$resourceimage)
    {
        if($request->hasfile($resourceimage))
        {
            if($request->file($resourceimage)->isValid())
            {
                if(!empty($post))
                    File::delete($this->uploadPath.'/'.$post->image);
                $imageName = time().'.'.$request->file($resourceimage)->getClientOriginalExtension();
                $request->file($resourceimage)->move($this->uploadPath, $imageName);

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
