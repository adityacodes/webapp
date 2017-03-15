<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course, Auth, Session, Validator, File;

class CourseController extends Controller
{
    private $uploadPath = 'uploads/course';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(5);
        return view('admin.course.index')->withCourses($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. validate the date
         $validator = Validator::make($request->all(), array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:courses,slug',
                'course_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required',
            ));

          if ($validator->fails()) {
            // send back to the page with the input data and errors
            return redirect('gtpadmin/course/create')
                        ->withErrors($validator)
                        ->withInput();
          }

            if ($request->file('course_image')->isValid()) {
                $imageName = time().'.'.$request->file('course_image')->getClientOriginalExtension();
                $request->file('course_image')->move($this->uploadPath, $imageName);
            }
            else {
              // sending back with error message.
              Session::flash('warning', 'Uploaded file is not valid');
              return redirect('gtpadmin/course/create')
                            ->withErrors($validator)
                            ->withInput();
            }

        //2. Store in the DB
        $course = new Course;
        $course->image = $imageName;
        $course->title = $request->title;
        $course->slug = $request->slug;
        $course->body = $request->body;

        $course->save();

        //3. Redirect to another page
        Session::flash('success', 'The course was successfully saved.');

        return redirect()->route('gtpadmin.course.show', $course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('admin.course.show')->withCourse($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //find the course in the db ans save as a var
        $course = Course::find($id);
        //return the view and pass in the var we previously created
        return view('admin.course.edit')->withCourse($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if ($request->input('slug') == $course->slug ) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required',
                'course_image'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ));
        }

        else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:courses,slug',
                'course_image'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required',
            ));
        }
        
        if($request->hasfile('course_image'))
        {
            if($request->file('course_image')->isValid())
            {
                File::delete($this->uploadPath.'/'.$course->image);
                $imageName = time().'.'.$request->file('course_image')->getClientOriginalExtension();
                $request->file('course_image')->move($this->uploadPath, $imageName);
                
            }
            else{     
              // sending back with error message.
              Session::flash('warning', 'Uploaded file is not valid');
              return back()->withErrors($validator)
                            ->withInput();
            }

        }

        //save the data
        $course->title = $request->title;
        $course->slug = $request->slug;
        $course->image = $imageName;
        $course->body = $request->body;

        $course->save();
        // set flash meessage to be shown

        Session::flash('success', 'The course was successfully updated');
        //redirect the users

        return redirect()->route('gtpadmin.course.show', $course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        File::delete($this->uploadPath.'/'.$course->image);
        $course->delete();

        Session::flash('Success', 'course Deleted Successfully');

        return redirect()->route('gtpadmin.course.index');
    }
}
