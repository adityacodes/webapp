<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session, Auth, Validator, File;

class PostController extends Controller {

    private $uploadPath = 'uploads/post';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //create a variable and store all the blog posts in it
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        //return a view and pass in the above variabe
        return view('admin.post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**\
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //1. validate the date
         $validator = Validator::make($request->all(), array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'post_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required',
            ));

          if ($validator->fails()) {
            // send back to the page with the input data and errors
            return redirect('gtpadmin/post/create')
                        ->withErrors($validator)
                        ->withInput();
          }

            if ($request->file('post_image')->isValid()) {
                $imageName = time().'.'.$request->file('post_image')->getClientOriginalExtension();
                $request->file('post_image')->move($this->uploadPath, $imageName);
            }
            else {
              // sending back with error message.
              Session::flash('warning', 'Uploaded file is not valid');
              return redirect('gtpadmin/post/create')
                            ->withErrors($validator)
                            ->withInput();
            }

        //2. Store in the DB
        $post = new Post;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        //3. Redirect to another page
        Session::flash('success', 'The post was successfully saved.');

        return redirect()->route('gtpadmin.post.show', $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show')->withPost($post);
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
        $post = Post::find($id);
        //return the view and pass in the var we previously created
        return view('admin.post.edit')->withPost($post);
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
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug ) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required',
                'post_image'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ));
        }

        else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'post_image'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required',
            ));
        }
        
        if($request->hasfile('post_image'))
        {
            if($request->file('post_image')->isValid())
            {
                File::delete($this->uploadPath.'/'.$post->image);
                $imageName = time().'.'.$request->file('post_image')->getClientOriginalExtension();
                $request->file('post_image')->move($this->uploadPath, $imageName);
                
            }
            else{     
              // sending back with error message.
              Session::flash('warning', 'Uploaded file is not valid');
              return back()->withErrors($validator)
                            ->withInput();
            }

        }

        //save the data
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->image = $imageName;
        $post->body = $request->body;

        $post->save();
        // set flash meessage to be shown

        Session::flash('success', 'The post was successfully updated');
        //redirect the users

        return redirect()->route('gtpadmin.post.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Check if post is present in applied field

        $post = Post::find($id);
        File::delete($this->uploadPath.'/'.$post->image);
        $post->delete();

        Session::flash('Success', 'Post Deleted Successfully');

        return redirect()->route('gtpadmin.post.index');
    }

    

}
