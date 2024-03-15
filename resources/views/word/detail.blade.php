@extends('layouts.app')

@section('title', 'Indonesia')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-2">
                <div class="list-group" style="max-width: 100%; height: 100vh; overflow-y: auto;">
                    <a href="{{ route('list-indonesia') }}" class="list-group-item list-group-item-action">All</a>
                    @foreach ($alphabets as $alphabet)
                        <a href="{{ route('list-indonesia-alphabet', ['alphabet' => strtolower($alphabet)]) }}"
                            class="list-group-item list-group-item-action">{{ $alphabet }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-md-6 my-2">
                        <div class="card">
                            <div class="card-header">
                                {{ $word->indonesian }}
                            </div>
                            <div class="card-body">
                                {!! $word->indonesian_definition !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="card">
                            <div class="card-header">
                                {{ $word->english }}
                            </div>
                            <div class="card-body">
                                {!! $word->english_definition !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
