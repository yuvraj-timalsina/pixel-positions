<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all()->groupBy('featured');

        return view('jobs.index', [
            'featuredJobs' => $jobs->get(true) ?? [],
            'jobs' => $jobs->get(false) ?? [],
            'tags' => Tag::all(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreJobRequest $request)
    {
        //
    }

    public function show(Job $job)
    {
        //
    }

    public function edit(Job $job)
    {
        //
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    public function destroy(Job $job)
    {
        //
    }
}
