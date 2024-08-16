<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $pendingRequests = Activity::where('status', 'pending')->get();
        $approvedRequests = Activity::where('status', 'approved')->get();

        $activities = Activity::latest()->paginate(5);

        return view('activities.index', compact('pendingRequests', 'approvedRequests', 'activities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function userindex()
    {
        $activities = Activity::where('status', 'approved')->latest()->paginate(10);

        return view('activities.userindex', compact('activities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminindex()
    {
        $activities = Activity::where('status', 'approved')->latest()->paginate(10);

        return view('activities.adminindex', compact('activities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function userDashboard()
    {
        $approvedRequests = Activity::where('status', 'approved')->get();
        $pendingRequests = Activity::where('status', 'pending')->get();

        return view('activities.userdashboard', compact('approvedRequests', 'pendingRequests'));
    }

    public function adminDashboard()
    {
        $approvedRequests = Activity::where('status', 'approved')->get();
        $pendingRequests = Activity::where('status', 'pending')->get();

        return view('activities.index', compact('approvedRequests', 'pendingRequests'));
    }



    public function create()
    {
        return view('activities.create');
    }

    public function event(Request $request)
    {

            $request->validate([
                'title' => 'required',
                'description' => 'required|string|regex:/\b\w+\b.{24,}/',
                'actdate' => 'required|date',
                'location' => 'required',
                'type' => 'required|in:activity,event',
                'duedate' => 'required|date|after_or_equal:event_date',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'link' => 'nullable|url',
            ]);

            $input = $request->all();

            // Handle newline characters in the description
            $input['description'] = nl2br($input['description']);
            
            if ($photo = $request->file('photo')) {
                $destinationPath = 'photo/';
                $profilePhoto = date('YmdHis') . "." . $photo->getClientOriginalExtension();
                $photo->move($destinationPath, $profilePhoto);
                $input['photo'] = "$profilePhoto";
            }

            // Save the new activity instance
            //$newActivity = Activity::create($data);

            $newActivity = Activity::create($input);

            // Redirect user to a confirmation page or show a success message
            return redirect(route('activity.userindex'))->with('success', 'Activity submitted for approval');
        //} catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors, redirect back with errors and old input
            //return redirect()->back()->withErrors($e->validator->errors())->withInput();
        
    }

    public function show(Activity $activity)
    {
        return view('activities.show',compact('activity'));
    }

    // public function edit(Activity $activity)
    // {
    //     return view('edit',compact('activity'));
    // }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|string|regex:/\b\w+\b.{24,}/',
            'actdate' => 'required|date',
            'location' => 'required',
            'type' => 'required|in:activity,event',
            'duedate' => 'required|date|after_or_equal:event_date',
            'link' => 'nullable|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('photo')) {
            $destinationPath = 'photos/';
            $profilePhoto = date('YmdHis') . "." . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move($destinationPath, $profilePhoto);
            $input['photo'] = $destinationPath . $profilePhoto;
        } else {
            unset($input['photo']);
        }

        $activity->update($input);

        return redirect()->route('activity.index')
            ->with('success', 'Activity updated successfully');
    }
 

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect(route('activity.index'))->with('success', 'Activity deleted Successfully');
    }

    
    public function delete_activity($id)
    {
        $data = Activity::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $activity = Activity::find($id);
        
        // Check if the activity is found
        if (!$activity) {
            abort(404); // or handle the case when the activity is not found
        }
        
        return view('activities.edit', compact('activity'));
    }

    


    // Additional method to display the admin dashboard
    //public function adminDashboard()
    //{
        //$pendingRequests = Activity::where('status', 'pending')->get();
        //$approvedRequests = Activity::where('status', 'approved')->get();

        //return view('admin.dashboard', compact('pendingRequests', 'approvedRequests'));
    //}

    // Additional method to approve a request
    public function approveRequest(Activity $activity)
    {
        $activity->status = 'approved';
        $activity->save();
        return redirect(route('activity.index'))->with('success', 'Activity approved');
    }

    // Additional method to deny a request
    public function denyRequest(Activity $activity)
    {
        $activity->delete();
        return redirect(route('activity.index'))->with('error', 'Activity denied');
    }

    // Additional method to show more details about an activity
    //public function showDetails(Activity $activity)
    //{
        //return view('activities.details', compact('activity'));
    //}

    // Additional method to search activities
    public function searchActivities(Request $request)
    {
        //$keyword = $request->input('search');
        //$results = Activity::where('title', 'like', "%$keyword%")->get();
        //return view('activities.search', compact('results'));
        $search_text = $request->input('keyword');
        $activities = Activity::where('title', 'LIKE', '%'.$search_text. '%')->get();
        return view('activities.search', compact('activities'));
    }

    //public function searchUserDB(Request $request)
    //{
        //$keyword = $request->input('search');
        //$results = Activity::where('title', 'like', "%$keyword%")->get();
        //return view('activities.search', compact('results'));
        //$search_text = $request->input('keyword');
        //$approvedRequests = Activity::where([
            //['status','=', 'approved'], 
            //['title','LIKE', '%'.$search_text.'%']])->get();
        //return view('activities.searchUDB', compact('approvedRequests'));
    //}

    public function redirectToLink(Request $request, $link)
    {
        $record = Activity::where('link', $link)->first(); // Replace YourModel with the actual model and 'link' with the column name containing the link
        $id = $request->input('id'); 
        if ($record) {
            // Redirect to the link
            return redirect()->away($record->link);
        } else {
            // Handle the case where the record with the given link is not found
            return redirect()->route('activity.show', ['id' => $id]);  // Replace with an appropriate fallback route
        }
    }

    // public function update(Request $request, $id)
    // {
    //     $activity = Activity::find($id);
    //     $activity->title = $request->input('title');
    //     $activity->actdate = $request->input('actdate');
    //     $activity->location = $request->input('location');
    //     $activity->type = $request->input('type');
    //     $activity->description = $request->input('description');
    //     $activity->photo = $request->input('photo');
    //     $activity->link = $request->input('link');
    //     $activity->duedate = $request->input('duedate');

    // }
}
