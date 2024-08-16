@extends('activities.dashboard') {{-- Adjust this based on your actual layout file --}}

@section('content')
    <h1>Search Results</h1>
    
  <div class="reservation-form d-flex align-items-center h-100">
    <div class="container">
      

        <div class="col-lg-12">
            <div class="shadow-2-strong br-23" id="admindashboard">
                <div class="card-body text-center">
                    <h4 class="pd-5">Approved Activities & Events</h4>
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Form Link</th>
                                <th>Due Form</th>
                                <th style="width:50%">Poster</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($approvedRequests as $activity)
                            <tr>
                                <td>{{$activity->title}}</td>
                                <td>{{$activity->actdate}}</td>
                                <td>{{$activity->location}}</td>
                                <td>{{$activity->type}}</td>
                                <td>{{$activity->link}}</td>
                                <!--<td><img src="/photo/{{ $activity->photo }}" width="100px"></td>-->
                                <td>{{$activity->duedate}}</td>
                                <td><img src="{{ asset('photo/' . $activity->photo) }}" alt="" style="height:auto;"></td>
                                <td class="text-center">
                                    <form method="post" action="{{ route('destroy',$activity->id) }}" onsubmit="return confirm('Are you sure you want to delete this activity?');">
                                    @csrf
                                        @method('DELETE')
                                        <!--<button type="button" class="btn btn-secondary btn-sm px-3  mg-3" onclick="redirectTo({{ $activity->id }})">
                                          <i class="fa-solid fa-eye"></i>
                                        </button>-->

                                        

                                        <button type="submit" class="btn btn-danger btn-sm px-3  mg-3">
                                          <i class="fa-solid fa-delete-left"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
        
      </div>
    </div>
  </div>
  
@endsection