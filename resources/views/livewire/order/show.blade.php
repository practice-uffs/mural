<div class="text-gray-600 body-font overflow-hidden mb-12">
    <div class="flex flex-wrap">
        <div class="w-full flex flex-col items-start">
            <span class="inline py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ $order->service->category->name }} > {{ $order->service->name }}</span>
            <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">
                {{ $order->title }}
            </h2>
            <p class="leading-relaxed mb-8">
                {{ $order->description }}
            </p>
            <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $order->created_at }}
                </span>
                <span class="text-gray-400 mr-3 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ $order->updated_at }}
                </span>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path
                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                        </path>
                    </svg>
                    {{ count($order->comments) }}
                </span>
            </div>
            <a class="inline-flex items-center">
                <img alt="blog" src="https://dummyimage.com/104x104"
                    class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-4">
                    <span class="title-font font-medium text-gray-900">{{ $order->user->name }}</span>
                    <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $order->user->username }}</span>
                </span>
            </a>
        </div>
    </div>
</div>

<div class="mb-4 w-full">
    <h3 class="pb-3 mb-4 text-lg font-semibold text-gray-700 border-b-2 border-gray-100 inline-flex items-center w-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block text-gray-300 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
        </svg>
        Arquivos
    </h3>

    <div class="space-y-4">
        <h4 class="text-md font-semibold text-gray-500 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block text-gray-300 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
            </svg>
            Criados pela equipe do programa (para você)
        </h4>
        <iframe src="https://drive.google.com/embeddedfolderview?id=1s5JcDHMzf_TJxFMU7k1H6oQVemesK7ec#list" class="w-full border-none"></iframe>
    </div>

    <div class="space-y-4">
        <h4 class="text-md font-semibold text-gray-500 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block text-gray-300 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>
            Enviados por você
        </h4>
        <iframe src="https://drive.google.com/embeddedfolderview?id=1s5JcDHMzf_TJxFMU7k1H6oQVemesK7ec#list" class="w-full border-none"></iframe>
    </div>
</div>