<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="{{ route('job', $job['id']) }}" class="hover:underline">
                    <strong> {{ $job['title'] }}</strong> : {{ $job['salary'] }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
