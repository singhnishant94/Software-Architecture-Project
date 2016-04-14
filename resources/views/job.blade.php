@extends('layouts.app')

@section('content')
  <section id="blog" class="container">
        <div class="center">
            <p class="lead">{{$job->description}}</p>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-item">
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date">{{date('d F', time($job->created_at))}}</span>
                                        <span><i class="fa fa-user"></i> <a href="#"> {{Auth::user()->name}}</a></span>
                                        <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">{{sizeof($applicants)}} Applicants</a></span>
                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <h2>Problem</h2>
                                    <p><strong>{{$job->problem}}</strong></p>

                                    <div class="post-tags">
                                        <strong>Tag:</strong> 
                                        @foreach($skills as $key => $skill)
                                        {{$key>0?'/':''}} <a href="#">{{$skill}}</a>
                                        @endforeach
                                         
                                    </div>
                                    <div>
                                    	<strong>Location :</strong> {{$job->location}}<br>
                                    	<strong>Position :</strong> {{$job->position}}<br>
                                    	<strong>Salary :</strong> Rs. {{$job->salary}}
                                    </div>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                    
                    
      						

                        @if($ishaving)
                        	<b class="text-success">You have applied for this job</b>
                        @else
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/job/'.$job->id.'/apply') }}">
                        {!! csrf_field() !!}

                       <div class="form-group{{ $errors->has('solution') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Your Solution</label>

                            <div class="col-md-6">
                                <textarea name="solution" class="form-control">{{ old('solution') }}</textarea>

                                @if ($errors->has('solution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('solution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Apply
                                </button>

                            </div>
                        </div>
                    </form>
                    @endif
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->

              
            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->
@endsection