@props(['name'])
@error($name)
<p class="text-sm font-semibold text-red-500 italic mt-1">{{ $message }} </p>
@enderror
