<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Skill;
use App\Application;
use App\Job;
use App\SkillMapJob;
use App\SkillMapUser;
use App\User;

use Auth;
use Redirect;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jobAddView()
    {
        return view('addjob');
    }

    public function jobAdd(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
            'problem' => 'required',
            'position' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'skills' => 'required',
        ]);

        $job = new Job;
        $job->description = $request->input('description');
        $job->problem = $request->input('problem');
        $job->position = $request->input('position');
        $job->location = $request->input('location');
        $job->owner = Auth::user()->id;
        $job->salary = $request->input('salary');
        $job->skills = $request->input('skills');
        $job->save();

        $skills = explode(",", $request->input('skills'));

        foreach ($skills as $key => $name) {
            $sk = Skill::where('name','=',$name)->first();
            if(is_null($sk))
            {
                $sk = new Skill;
                $sk->name = $name;
                $sk->save();
            }
            $map = new SkillMapJob;
            $map->job_id = $job->id;
            $map->skill_id = $sk->id;
            $map->save();
        }
        return redirect('/home');
    }


    public function JobView($id)
    {
    	$job = Job::find($id);
    	if(is_null($job)){
    		return redirect('/home');
    	}
    	$ishaving = !is_null(Application::where('applicant',Auth::user()->id)->where('job_id',$id)->first());
    	return view('job', array('job'=>$job,'ishaving'=>$ishaving,'skills'=>explode(",", $job->skills)));
    }

    public function jobApply($id,Request $request)
    {
    	$job = Job::find($id);
        if(is_null($job)){
    		return Redirect::back()->withErrors(['error', 'Invalid Job Id']);
    	}
    	$application = Application::where('applicant',Auth::user()->id)->where('job_id',$id)->first();
    	if(!is_null($application))
    		return Redirect::back()->withErrors(['error', 'Already Applied']);

    	$this->validate($request, [
            'solution' => 'required|min:20',
        ]);
        

    	$application = new Application;
    	$application->applicant = Auth::user()->id;
    	$application->job_id = $id;
    	$application->answer = $request->input('solution');
    	$application->save();

    	return Redirect::back();
        
    }
}
