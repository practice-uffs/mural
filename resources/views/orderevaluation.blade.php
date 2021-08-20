@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Avalie nosso trabalho</h2>
            <p>Qual a sua opinião sobre o que criamos?</p>
        </header>

        <div class="row mb-3">
            <div class="col-12">
                <div class="w-full flex flex-row items-start mb-3">
                    <span class="inline py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">
                        {{ @$orderEvaluation->order->service->category->name }} &gt;
                        {{ $orderEvaluation->order->service->name }}
                    </span>
                    <span class="text-xs text-gray-400 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $orderEvaluation->order->created_at }}
                    </span>
                </div>
                <div class="text-sm mt-2 p-2 text-gray-400 bg-gray-50/50">
                    <p class="font-semibold mb-1">{{ $orderEvaluation->order->title }}</p>
                    <p class="">{{ Str::limit($orderEvaluation->order->description, 400, '...') }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @livewire('crud.main', [
                    'model' => 'App\Model\Feedback',
                    'edit' => $orderEvaluation->feedback,
                    'show_list' => false,
                    'override' => [
                        'type' => ['show' => ''],
                        'stars' => ['show' => 'create', 'validation' => 'required'],
                        'comment' => ['validation' => 'present'],
                    ],
                    'include_create' => [
                        'type' => 'comment',
                        'user_id' => auth()->id()
                    ]
                ])
            </div>
        </div>
    </div>
@endsection