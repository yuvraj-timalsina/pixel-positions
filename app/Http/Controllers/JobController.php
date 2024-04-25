<?php

namespace App\Http\Controllers;

use App\Mail\JobPostedMail;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(5);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create(): View
    {
        return view('jobs.create');
    }

    public function store(): RedirectResponse
    {
        request()?->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        Mail::to($job->employer->user)
            ->queue(new JobPostedMail($job));

        return to_route('jobs.index');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);

    }

    public function edit(Job $job)
    {

        return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job $job): RedirectResponse
    {

        request()?->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return to_route('jobs.show', ['job' => $job]);
    }

    public function destroy(Job $job): RedirectResponse
    {

        $job->delete();

        return to_route('jobs');
    }
}
