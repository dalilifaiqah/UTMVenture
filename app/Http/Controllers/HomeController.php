<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ventures;
use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $user_id = $user->id;

    $activities = Activity::where('status', 'approved')->latest()->paginate(10);
    $pendingRequests = Activity::where('status', 'pending')->get();
    $approvedRequests = Activity::where('status', 'approved')->get();


    $role = $user->role;

    if ($role == '1') {
        return view('activities.index', compact('pendingRequests', 'approvedRequests', 'activities'));
    } elseif ($role == '0') {
        return view('activities.userdashboard', compact('pendingRequests', 'approvedRequests', 'activities'));
    } else {
        return view('activities.userindex', compact('activities'));
    }
}


    public function create_venture()
    {
        return view('ventureregisterform');
    }

    public function edit_venture(Request $request, $id)
    {
        
        // Validate the request, ensure it's a POST request, and validate the file
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed
        ]);


        $ventures = ventures::find($id);

        // Check if the data exists before attempting to update
        if ($ventures) {
            // Update other attributes if needed
            $ventures->post_status = 'active';

            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);

                // Update the image attribute in the model
                $ventures->image = $imageName;
            }

            $ventures->save(); 
        }

        return redirect()->back();
    }

    public function venture_post(Request $request)
    {
        $user = auth()->user();

        $userid = $user->id;
        
        $username = $user->name;

        $user_type = $user->user_type;



        $venture = new Ventures;

        $venture->title = $request->title;
        
        $venture->description = $request->description;

        $venture->user_id = $userid;
        
        $venture->username = $username;

        $venture->user_type = $user_type;

        $venture->post_status = 'pending';

        

        $image = $request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('ventureimage',$imagename);

            $venture->image = $imagename;
        }

        $venture->save();

        return redirect()->back();
    }

    public function venture_approval()
    {

        $venture = Ventures::where('post_status', '=', 'pending')->get();

        return view('admindashboard', compact('venture'));
    }

    public function accept_post($id)
    {
        $data = ventures::find($id);

        $data->post_status='active';

        $data->save();

        return redirect()->back();
    }


    public function delete_post($id)
    {
        $data = ventures::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function venture_details($id)
    {
        $data = ventures::find($id);

        return view('venture_details', compact('data'));
    }

    

}
