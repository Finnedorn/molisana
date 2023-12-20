{{-- conterrà la liste di tutte le ricette --}}

@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
<main>
    <section class="container">
        <h1>Ricette</h1>
        <div class="row gy-4">
            {{-- cicla per ogni elemento di recipes--}}
          @foreach ($recipes as $recipe)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{$recipe['image']}}" alt="{{$recipe['title']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$recipe['title']}}</h5>
                        {{-- in questo caso l'array associativo recipes ha una key "idMeal" che posso sfruttare per id--}}
                        <a href="{{route('recipes.show', $recipe["idMeal"])}}" class="btn btn-primary">Vedi dettaglio</a>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </section>
</main>
@endsection
