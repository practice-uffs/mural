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