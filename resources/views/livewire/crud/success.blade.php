<div>
    <div class="alert alert-success w-1/2 m-auto mt-5 @if (!$show_success || !$finished) hidden @endif">
        <div class="flex-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <label class="ml-3 mt-1"><strong>Pronto!</strong> Sua ação foi registrada com sucesso.</label>
        </div>

        <div class="flex-none">
            <button class="btn btn-sm btn-success pt-0" wire:click="finished(false)">Ok</button>
        </div>
    </div>
</div>