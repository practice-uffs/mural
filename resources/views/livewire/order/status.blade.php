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

    @if ($order->service->notice)
        <div class="p-4 w-full">
            <div class="alert alert-warning flex flex-col text-center">
                <p class="animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-14 h-14 stroke-current"> 
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>                         
                    </svg> 
                    <p class="font-semibold text-md">Atenção</p>
                </p>
                <div class="mt-2">
                    <label class="text-xs">{{ $order->service->notice }}</label>
                </div>
              </div>
        </div>
    @endif
</div>