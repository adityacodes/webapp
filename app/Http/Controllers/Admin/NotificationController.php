<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::orderBy('id', 'desc')->paginate(5);
        return view('admin.notification.index')->withNotifications($notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:notifications,slug',
                'body' => 'required',
        ));

        $notification = new Notification;
        $notification->title = $request->title;
        $notification->slug = $request->slug;
        $notification->body = $request->body;

        $notification->save();
        Session::flash('success', 'The notification was successfully saved.');

        return redirect()->route('gtpadmin.notification.show', $notification->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notification::find($id);
        return view('admin.notification.show')->withNotification($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::find($id);
        //return the view and pass in the var we previously created
        return view('admin.notification.edit')->withNotification($notification);
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
        $notification = Notification::find($id);

        if ($request->input('slug') == $notification->slug ) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required',
            ));
        }

        else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:notifications,slug',
                'body' => 'required',
            ));
        }

        //save the data
        $notification->title = $request->title;
        $notification->slug = $request->slug;
        $notification->body = $request->body;
        $notification->save();

        Session::flash('success', 'The notification was successfully updated');
        return redirect()->route('gtpadmin.notification.show', $notification->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        Session::flash('Success', 'Notification Deleted Successfully');
        return redirect()->route('gtpadmin.notification.index');
    }
}
