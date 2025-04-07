<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mb-2">
        <h2 class="font-bold text-xl mb-2">Заявка от {{ $request->created_at ? $request->created_at->format('d.m.Y') : 'Неизвестное время' }}</h2>
        <p><strong></p>
        <p>
            <strong>Статус:</strong> 
            <span class="{{ $request->statues_id == 1 ? 'text-black' : ($request->statues_id == 2 ? 'text-blue-600' : 'text-red-600') }}">
                {{ $request->statue ? $request->statue->name : 'Неизвестно' }}
            </span>
        </p>
    </div>
</div>