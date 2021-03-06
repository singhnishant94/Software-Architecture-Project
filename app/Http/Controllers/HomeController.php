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
use View;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs_posted = Job::where('owner','=',Auth::user()->id)->get();
        $current_jobs = Job::where('job_holder','=',Auth::user()->id)->get();
        $applied_jobs = Application::join('job','applications.job_id', '=', 'job.id')->where('applicant','=',Auth::user()->id)->get();

        return view('home',array("jobs_posted"=>$jobs_posted, "current_jobs"=>$current_jobs, "applied_jobs"=>$applied_jobs));
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

    public function jobDelete($id)
    {

        Job::find($id)->delete();
        return redirect('/home');
    }

    public function viewApplicants($id)
    {

        $applicants = Application::join('users','applications.applicant', '=', 'users.id')->where('job_id','=',$id)->get();
        return view('applicants', array("applicants"=>$applicants));
    }

    public function aboutus()
    {

        return view('aboutus');
    }
}
