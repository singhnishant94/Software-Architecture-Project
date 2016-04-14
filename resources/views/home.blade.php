@extends('layouts.app')

@section('content')
 <section id="feature" class="transparent-bg">
        <div class="container">
            
            
            <div class="get-started center wow fadeInDown">
                <div class="center wow fadeInDown">
                    <h2>Jobs You have Posted</h2>
                </div>
            @foreach($jobs_posted as $key => $job)
                <a href="{{ route('job', ['id'=>$job->id]) }}"><h2>{{$job->description}}</h2></a>
                <p class="lead">{{$job->problem}}</p>
                <a class="btn btn-primary" href="{{ route('job.delete',['id'=>$job->id]) }}">Delete This Job</a>
                <a class="btn btn-primary" href="{{ route('job.viewApplicants',['id'=>$job->id]) }}"> View All Applicants</a>
            @endforeach
            </div>

            <div class="center wow fadeInDown">
                <a class="btn btn-success" href="{{ route('job.add') }}"><i class="fa fa-plus"></i> Post New Job</a>
            </div>

            
        
            
            @if (sizeof($current_jobs) == 0)
                <div class="get-started center wow fadeInDown">
                    <div class="center wow fadeInDown">
                        <h2>Jobs You Currently Have</h2>
                    </div> 
                    Sorry, you don't have a job currently!!!
                </div>
            @else
                <div class="get-started center wow fadeInDown">
                    <div class="center wow fadeInDown">
                        <h2>Jobs You Currently Have</h2>
                    </div>
                @foreach($current_jobs as $key => $job)
                    <a href="{{ route('job', ['id'=>$job->id]) }}"><h2>{{$job->description}}</h2></a>
                    <p class="lead">{{$job->problem}}</p>
                @endforeach
                </div>
            @endif 

            
            
            
            @if (sizeof($applied_jobs) == 0)
                <div class="get-started center wow fadeInDown"> 
                    <div class="center wow fadeInDown">
                            <h2>Jobs You Have Applied For</h2>
                    </div>
                    Sorry, you haven't applied yet!!!
                </div>
            @else
                
                <div class="get-started center wow fadeInDown">
                    <div class="center wow fadeInDown">
                            <h2>Jobs You Have Applied For</h2>
                    </div>
                @foreach($applied_jobs as $key => $job)
                    <h2>{{$job->description}}</h2>
                    <p class="lead">{{$job->problem}}</p>
                @endforeach
                </div>
            @endif

        

            

            
        </div><!--/.container-->
    </section><!--/#feature-->
@endsection
