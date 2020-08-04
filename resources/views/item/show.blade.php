@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<main class="container">
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                {{ $item -> title }}
                @if ($item -> user_id == $user -> id)
                    <a href="{{ route('items.edit', $item) }}"
                        class="btn btn--primary btn--gradient right"
                    >
                        <i class="material-icons left">edit</i>
                        Editar
                    </a>
                @endif
            </div>

            <p>{{ $item -> description }}</p>

        </div>

        <div class="card__reaction">
            <reaction-list
                user-id="{{ $user -> id }}"
                item-id="{{ $item -> id }}"
            >
            </reaction-list>
        </div>
    </div>

    <comment-list
        user-id="{{ $user -> id }}"
        item-id="{{ $item -> id }}"
    ></comment-list>
</main>
@endsection
