@extends('layouts.app')

@section('title', 'English')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-2">
                <div class="list-group" style="max-width: 100%; height: 80vh; overflow-y: auto;">
                    <a href="{{ route('list-english') }}" class="list-group-item list-group-item-action">All</a>
                    @foreach ($alphabets as $alphabet)
                        <a href="{{ route('list-english-alphabet', ['alphabet' => strtolower($alphabet)]) }}"
                            class="list-group-item list-group-item-action">{{ $alphabet }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-10">
                @if ($words->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Tidak ada kata yang ditemukan.
                    </div>
                @else
                    <div class="list-group">
                        @foreach ($words as $word)
                            <a href="{{ route('word-detail', ['id' => $word->id]) }}"
                                class="list-group-item list-group-item-action">{{ $word->english }}</a>
                        @endforeach
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection
