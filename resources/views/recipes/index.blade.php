{{-- conterrà la liste di tutte le ricette --}}

@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
    <main>
        <section class="container">
            <h1>Recipes</h1>
            <div class="row">
                @foreach ($recipes as $item)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                        </div>
                        <div class="card-body ">
                            <h5 class="card-title">
                                {{$item['title']}}
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
