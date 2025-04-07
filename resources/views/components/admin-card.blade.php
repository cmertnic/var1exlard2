<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mb-2">
        <h2 class="font-bold text-xl mb-2">Заявка от {{ \Carbon\Carbon::parse($request->created_at)->format('d.m.Y') }}</h2>
        <p><strong>ФИО пользователя:</strong> {{ $request->user ? $request->user->surname . ' ' . $request->user->name . ' ' . $request->user->midlename : 'Неизвестный пользователь' }}</p>
        <p><strong>Количество участников:</strong> {{ $request->number }}</p>
        <p><strong>Дата тура:</strong> {{ $request->tour ? \Carbon\Carbon::parse($request->tour->date)->format('d.m.Y') : 'N/A' }}</p>
        <p><strong>Название тура:</strong> {{ $request->tour ? $request->tour->title : 'N/A' }}</p>
        <p><strong>Цена тура:</strong> {{ $request->tour ? $request->tour->price . ' руб.' : 'N/A' }}</p>
        <p><strong>Общая стоимость:</strong> {{ $request->tour ? ($request->tour->price * $request->number) . ' руб.' : 'N/A' }}</p>
    </div>
</div>