<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p>This job pays : {{ $job->salary }} per year.</p>
    <p class='mt-6'>
        <x-button href="{{ route('jobs.edit', $job->id) }}">Edit Job</x-button>
    </p>
</x-layout>