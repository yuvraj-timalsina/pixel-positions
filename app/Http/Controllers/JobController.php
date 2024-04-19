<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

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

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        return to_route('jobs.index');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);

    }

    public function edit(Job $job)
    {
        Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);

    }

    public function update(Job $job): RedirectResponse
    {
        Gate::authorize('edit-job', $job);

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
        Gate::authorize('edit-job', $job);

        $job->delete();

        return to_route('jobs');
    }
}
