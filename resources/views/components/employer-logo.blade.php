@php use Illuminate\Support\Facades\Storage; @endphp
@props(['employer', 'width' => 90])
<img src="{{ Storage::url($employer->logo) }}" alt="" class="rounded-xl" width="{{ $width }}">
