<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form action="{{ route('jobs.store') }}" method="POST">
        <x-forms.input name="title" label="Title" placeholder="CEO"/>
        <x-forms.input name="salary" label="Salary" placeholder="$90,000 USD"/>
        <x-forms.input name="location" label="Location" placeholder="Winter Park, Florida"/>

        <x-forms.select name="schedule" label="schedule">
            <option class="bg-gray-700">Part-Time</option>
            <option class="bg-gray-700">Full-Time</option>
            <option class="bg-gray-700">Remote</option>
            <option class="bg-gray-700">Contract</option>
        </x-forms.select>

        <x-forms.input name="url" label="URL" type="url" placeholder="https://example.com/ceo-wanted"/>
        <x-forms.checkbox name="featured" label="Feature (Costs Extra)"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="ceo, full-time, remote"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
