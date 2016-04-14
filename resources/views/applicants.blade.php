@extends("layouts.app")
@section('content')
<div class="get-started center wow fadeInDown">
    @foreach($applicants as $key => $applicant)
        <a href=""><h2>{{$applicant->email}}</h2></a>
        <p class="lead">{{$applicant->name}}</p>
    @endforeach
    </div>
@endsection