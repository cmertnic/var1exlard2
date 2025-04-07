@extends('layouts.main')

@section('content') 
<div class="container mx-auto mt-5">
    <form method="GET" action="{{ route('admin.index') }}" class="mb-4">
        <label for="tour_id" class="mr-2">Выберите тур:</label>
        <select name="tour_id" id="tour_id" onchange="this.form.submit()">
            <option value="">Все туры</option>
            @foreach($tours as $tour)
                <option value="{{ $tour->id }}" {{ request('tour_id') == $tour->id ? 'selected' : '' }}>
                    {{ $tour->title }}
                </option>
            @endforeach
        </select>
    </form>

    @foreach ($request2s as $request)
        <x-admin-card :request="$request" />
    @endforeach

    {{ $request2s->links() }} 
</div>
@endsection
