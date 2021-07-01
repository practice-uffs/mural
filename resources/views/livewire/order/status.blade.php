<div class="text-gray-600 body-font overflow-hidden">
    <div class="p-4 w-full">
        <div class="h-full p-6 rounded-lg border-2 border-{{ $order->situation()->color }} flex flex-col relative overflow-hidden">
            <span class="bg-{{ $order->situation()->color }} text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">
                SITUAÇÃO
            </span>
            <div class="text-2xl font-semibold text-gray-900 leading-none flex items-center text-center justify-center mt-4 pb-4 mb-4 border-b border-gray-200">
                <p>{{ $order->situation()->text }}</p>
            </div>
            <p class="flex items-center text-gray-600 mb-3 text-center">
                {{ $order->situation()->explanation }}
            </p>
            <hr class="mt-2 mb-3" />
            <p class="text-xs text-gray-500">Nossa equipe está trabalhando ativamente para dar andamento a todos os pedidos.</p>
        </div>
    </div>
</div>