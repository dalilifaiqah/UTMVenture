@extends('map.map')

@section('content')
    <h1>Search Results</h1>
    @foreach($Location as $location)
    <div class="col-lg-12">
    <div class="item">
        <div class="thumb">
          <a href="#fix"><img src="/images/msi.jpeg" alt=""></a>
          <h4 >{{$location->place}}</h4>
          <p>helo</p>
        </div>
    </div>
    </div>
    @endforeach
@endsection

