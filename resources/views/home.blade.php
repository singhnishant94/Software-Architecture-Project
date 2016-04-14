@extends('layouts.app')

@section('content')
 <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Jobs You have Posted</h2>
            </div>
            
            <div class="get-started center wow fadeInDown">
            @foreach($jobs_posted as $key => $job)
                <a href="{{ route('job', ['id'=>$job->id]) }}"><h2>{{$job->description}}</h2></a>
                <p class="lead">{{$job->problem}}</p>
                <a class="btn btn-danger" href="{{ route('job.delete',['id'=>$job->id]) }}"><i class="fa fa-plus"></i> Delete This Job</a>
            @endforeach
            </div>

            <div class="center wow fadeInDown">
                <a class="btn btn-success" href="{{ route('job.add') }}"><i class="fa fa-plus"></i> Post New Job</a>
            </div>

            <div class="center wow fadeInDown">
                <h2>Jobs You Currently Have</h2>
            </div>
        
            
            @if (sizeof($current_jobs) == 0)
                <div class="get-started center wow fadeInDown"> 
                Sorry, you don't have a job currently!!!
                </div>
            @else
                <div class="get-started center wow fadeInDown">
                @foreach($current_jobs as $key => $job)
                    <a href="{{ route('job', ['id'=>$job->id]) }}"><h2>{{$job->description}}</h2></a>
                    <p class="lead">{{$job->problem}}</p>
                @endforeach
                </div>
            @endif 

            <div class="center wow fadeInDown">
                <h2>Jobs You Have Applied For</h2>
            </div>
            
            
            @if (sizeof($applied_jobs) == 0)
                <div class="get-started center wow fadeInDown"> 
                Sorry, you haven't applied yet!!!
                </div>
            @else

                <div class="get-started center wow fadeInDown">
                @foreach($applied_jobs as $key => $job)
                    <h2>{{$job->description}}</h2>
                    <p class="lead">{{$job->problem}}</p>
                @endforeach
                </div>
            @endif

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-bullhorn"></i>
                            <h2>Fresh and Clean</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2>Retina ready</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud-download"></i>
                            <h2>Easy to customize</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-leaf"></i>
                            <h2>Adipisicing elit</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cogs"></i>
                            <h2>Sed do eiusmod</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-heart"></i>
                            <h2>Labore et dolore</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row--> 


            <div class="get-started center wow fadeInDown">
                <h2>Ready to get started</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore  magna aliqua. <br>  Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                <div class="request">
                    <h4><a href="#">Request a free Quote</a></h4>
                </div>
            </div><!--/.get-started-->

            <div class="clients-area center wow fadeInDown">
                <h2>What our client says</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client1.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client2.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client3.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
           </div>

        </div><!--/.container-->
    </section><!--/#feature-->
@endsection
