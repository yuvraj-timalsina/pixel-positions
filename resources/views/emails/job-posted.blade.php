<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats your job is now posted in our website.
</p>

<p>
    <a href="{{ route('jobs.show', $job) }}">View Job</a>
</p>
