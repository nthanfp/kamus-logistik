@extends('layouts.app')

@section('title', 'Indonesia')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-2">
                <div class="list-group" style="max-height: 400px; overflow-y: auto;"><a
                        href="{{ route('list-indonesia') }}"
                        class="list-group-item list-group-item-action">All</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'a']) }}"
                        class="list-group-item list-group-item-action">A</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'b']) }}"
                        class="list-group-item list-group-item-action">B</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'c']) }}"
                        class="list-group-item list-group-item-action">C</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'd']) }}"
                        class="list-group-item list-group-item-action">D</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'e']) }}"
                        class="list-group-item list-group-item-action">E</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'f']) }}"
                        class="list-group-item list-group-item-action">F</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'g']) }}"
                        class="list-group-item list-group-item-action">G</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'h']) }}"
                        class="list-group-item list-group-item-action">H</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'i']) }}"
                        class="list-group-item list-group-item-action">I</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'j']) }}"
                        class="list-group-item list-group-item-action">J</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'k']) }}"
                        class="list-group-item list-group-item-action">K</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'l']) }}"
                        class="list-group-item list-group-item-action">L</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'm']) }}"
                        class="list-group-item list-group-item-action">M</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'n']) }}"
                        class="list-group-item list-group-item-action">N</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'o']) }}"
                        class="list-group-item list-group-item-action">O</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'p']) }}"
                        class="list-group-item list-group-item-action">P</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'q']) }}"
                        class="list-group-item list-group-item-action">Q</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'r']) }}"
                        class="list-group-item list-group-item-action">R</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 's']) }}"
                        class="list-group-item list-group-item-action">S</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 't']) }}"
                        class="list-group-item list-group-item-action">T</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'u']) }}"
                        class="list-group-item list-group-item-action">U</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'v']) }}"
                        class="list-group-item list-group-item-action">V</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'w']) }}"
                        class="list-group-item list-group-item-action">W</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'x']) }}"
                        class="list-group-item list-group-item-action">X</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'y']) }}"
                        class="list-group-item list-group-item-action">Y</a>
                    <a href="{{ route('list-indonesia-alphabet', ['alphabet' => 'z']) }}"
                        class="list-group-item list-group-item-action">Z</a>
                </div>
            </div>
            <div class="col-10">
                <ul class="list-group">
                    @foreach ($words as $word)
                        <li class="list-group-item">{{ $word->indonesian }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
