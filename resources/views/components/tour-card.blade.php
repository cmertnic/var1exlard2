<div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mt-6">
    <h2 class="font-bold text-xl mb-2">
        Тур: {{ $tour->title ?? 'Неизвестный тур' }}
    </h2>
    <p><strong>Дата:</strong> {{ $tour->date ? (is_string($tour->date) ? \Carbon\Carbon::parse($tour->date)->format('d.m.Y') : $tour->date->format('d.m.Y')) : 'Неизвестная дата' }}</p>
    <p><strong>Цена:</strong> {{ $tour->price ? number_format($tour->price, 2, ',', ' ') . ' руб.' : 'Неизвестная цена' }}</p>
    
    @if($tour->path_img)
        <img src="{{ asset('images/tours/' . $tour->path_img) }}" alt="{{ $tour->title }}" class="mt-4 rounded-lg w-full h-auto">
    @else
        <p class="mt-4 mb-4 text-gray-500">Изображение недоступно</p>
    @endif

    @if (Auth::check())
        <form method="GET" action="{{ route('request.create', $tour->id) }}">
            @csrf
            <button type="submit" class="bg-blue-500 mt-4 ml-[120px] text-white font-bold py-2 px-4 rounded">
                Забронировать тур
            </button>
        </form>
    @else
        <a href="{{ route('register') }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded">
            Зарегистрироваться
        </a>
    @endif
</div>
