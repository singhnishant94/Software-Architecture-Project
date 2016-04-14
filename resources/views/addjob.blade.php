@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br>
            <div class="center">        
                <h2>Add New Job</h2>
            </div> 
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('job.add') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('problem') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Problem</label>

                            <div class="col-md-6">
                                <textarea name="problem" class="form-control">{{ old('problem') }}</textarea>

                                @if ($errors->has('problem'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('problem') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="position">

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location">

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Salary</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="salary">

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Skills</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="skills">

                                @if ($errors->has('skills'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('skills') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        
                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Submit
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
           
        </div>
    </div>
</div>
@endsection
