@extends('layouts.app')

@include('layouts.header')

@section('content')
<main class="container">
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                {{ $item -> title }}
                @if (Auth::check())
                    @if ($item -> user_id == $user -> id)
                        <a href="{{ route('items.edit', $item) }}"
                            class="btn btn--primary btn--gradient right"
                        >
                            <i class="material-icons left">edit</i>
                            Editar
                        </a>
                    @endif
                @endif
            </div>

            <p>{{ $item -> description }}</p>

        </div>

        <div class="card__reaction">
            <reaction-list
                @if (Auth::check())
                    user-id="{{ $user -> id }}"
                @endif
                item-id="{{ $item -> id }}"
            >
            </reaction-list>
        </div>
    </div>

    <comment-list
        @if (Auth::check())
            user-id="{{ $user -> id }}"
        @endif
        item-id="{{ $item -> id }}"
    ></comment-list>
</main>
@endsection
