@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center bg-gray-100 flex-col">
        @foreach ($tours as $tour)
            <x-tour-card :tour="$tour" />
        @endforeach
    </div>
@endsection