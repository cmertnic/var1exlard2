@extends('layouts.main')

@section('content') 
<x-guest-layout>
    <form method="POST" action="{{ route('request.store') }}" id="bookingForm">
        @csrf
        <h1 class="text-center text-blue-500/100 mb-10 text-4xl">Создание заявки</h1>

        <div>
            <h2>Тур: {{ $selectedTour->title }}</h2>
            <p><strong>Дата:</strong> {{ $selectedTour->date ? \Carbon\Carbon::parse($selectedTour->date)->format('d.m.Y') : 'Неизвестная дата' }}</p>
            @if($selectedTour->path_img)
                <img src="{{ asset($selectedTour->path_img) }}" alt="{{ $selectedTour->title }}" class="mt-4 rounded-lg w-full h-auto">
            @else
                <p class="mt-4 mb-4 text-gray-500">Изображение недоступно</p>
            @endif
        </div>

        <input type="hidden" name="tour_id" value="{{ $selectedTour->id }}">
        <input type="hidden" name="cost" id="cost" value="{{ $selectedTour->cost }}"> 

        <div>
            <label for="participants">Количество участников:</label>
            <x-text-input id="participants" class="block mt-1 w-full" type="number" name="number" value="1" min="1" required />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <div class="mt-4">
            <p><strong>Итоговая стоимость: <span id="totalCost">{{ $selectedTour->cost }}</span> руб.</strong></p>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="x-primary-button ms-4 inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
                {{ __('Забронировать') }}
            </button>
        </div>
        
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const participantsInput = document.getElementById('participants');
            const totalCostDisplay = document.getElementById('totalCost');
            const costPerPerson = {{ $selectedTour->cost ?? 200 }}; 

            participantsInput.addEventListener('input', function() {
                const numberOfParticipants = parseInt(participantsInput.value) || 1; 
                const totalCost = numberOfParticipants * costPerPerson;
                totalCostDisplay.textContent = totalCost; 
                document.getElementById('cost').value = totalCost; 
            });
        });
    </script>
</x-guest-layout>
@endsection