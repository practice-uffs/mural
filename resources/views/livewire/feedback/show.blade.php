<div>
    <div class="flex items-center flex-wrap pb-3 mb-3 border-b-2 border-gray-100 mt-auto w-full">
        <span class="text-gray-400 inline-flex items-center leading-none text-sm pr-3 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Criado em {{ ($feedback[0]['created_at']->diffForHumans()) }}
        </span>
    </div>
    <div>
        <div class="text-gray-600 body-font overflow-hidden">
            <div class="flex flex-center">
                <div class="w-full flex flex-col items-center">
                    <h3 class="sm:text-3xl text-2xl font-medium text-gray-900 mt-2 mb-4">{{$feedback[0]['comment']}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row">
            <small class="small text-gray-900 m-2">Por:</small>
        </div>
        <div class="row">
            <span class="inline-flex items-center">
                <img alt="blog" src="https://cc.uffs.edu.br/avatar/iduffs/{{ $feedback[0]['user']['username'] }}"
                    class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-4">
                    <span class="title-font font-medium text-gray-900">{{ $feedback[0]['user']['name'] }}</span>
                    <span
                        class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $feedback[0]['user']['username'] }}</span>
                </span>
            </span>
        </div>
    </div>
</div>