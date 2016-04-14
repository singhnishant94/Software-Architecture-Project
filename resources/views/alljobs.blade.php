@extends('layouts.app')

@section('content')
 <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>Jobs</h2>
               <p class="lead">List of all Jobs</p>
            </div>
        

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
                @foreach($skills as $skill)
                <li><a class="btn btn-default" href="#" data-filter=".{{str_replace('+','_',str_replace('=','',base64_encode($skill->name)))}}">{{$skill->name}}</a></li>
                @endforeach
            </ul><!--/#portfolio-filter-->

            <div class="row">
                <div class="portfolio-items">
                	@foreach($jobs as $job)
                    <div class="portfolio-item center 
                    @foreach(explode(',',$job->skills) as $skill)
                    {{str_replace('+','_',str_replace('=','',base64_encode($skill)))}}
                    @endforeach
                     apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                                <div class="">
                                    <h3><a href="{{route('job',['id'=>$job->id])}}">{{$job->description}}</a></h3>
                                    <p>{{$job->problem}}</p>
                                    <a  href="{{route('job',['id'=>$job->id])}}"><i class="fa fa-eye"></i> View</a>
                                </div> 
                        </div>
                    </div><!--/.portfolio-item-->

                   @endforeach
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
@endsection