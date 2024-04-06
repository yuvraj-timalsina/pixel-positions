<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="{{ route('jobs.show', $job['id']) }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-indigo-500 text-sm">{{$job->employer->name}}</div>
                <div>
                    <strong> {{ $job['title'] }}</strong> : {{ $job['salary'] }}
                </div>
            </a>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
