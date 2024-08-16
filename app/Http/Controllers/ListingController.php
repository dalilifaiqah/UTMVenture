<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //Show all listing
    public function index(){
        return view('home',[
            'listings'=>Listing::all()
        ]);
    }

    //Show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing'=> $listing
        ]);
    }

    public function search(Request $request){
        $search_text = $request->input('keyword');
        //dd($search_text);
        $Location = Place::where('place','LIKE','%'.$search_text.'%')->get();
        //dd($Location);
        //dd($Location->toArray());
        return view('map.search', compact('Location'));
    
    }
//     public function showMap()
// {
//     $Location = Place::all(); // Replace with your actual query
//     return view('map', compact('Location'));
// }

    public function store(Request $request){

        $request->validate([
            'Photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // in kilobytes
        ]);
        $Photo=file_get_contents($request->file('photo')->getRealPath());
    

    Listing::create([
        'photo'=>$Photo,
    ]);

    return redirect()->back()->with('success', 'Photo uploaded successfully.');

    
    }


}
