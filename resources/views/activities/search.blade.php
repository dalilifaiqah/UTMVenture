@extends('activities.userindex') {{-- Adjust this based on your actual layout file --}}

@section('content')
    <h1>Search Results</h1>
    @foreach($activities as $activity)
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="image width100">
                                <img src="assets/images/deals-01.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="content">
                                <!--<span class="info">*Limited Offer Today</span>-->
                                <h4>{{ $activity->title }}</h4><!--title-->
                                <div class="row">
                                    <div class="col-6">
                                        <i class="fa-regular fa-calendar-xmark"></i>
                                        <span class="list">{{ $activity->duedate }}</span>
                                    </div>
                                    <div class="col-6">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span class="list">{{ $activity->location }}</span>
                                    </div>
                                </div>
                                <p class="shorten">{{ $activity->description }}</p>
                                <div class="row">
                                    <div class="col-7 main-button">
                                        <a href="{{ route('activity.show', $activity) }}">More Details</a>
                                    </div>
                                    <div class="col-5 m-auto d-flex align-items-center justify-content-center">
                                        <div>
                                            <i class="fa-solid fa-tag"></i>
                                            <span class="list ">{{ $activity->type }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
