{{-- conterrà la singola ricetta (dettaglio) --}}
@extends('layouts.app')

@section('title', 'Recipes details')

@section('content')
<main>
    <section class="container">
        <div class="row gy-4">
            <div class="col-12">
                <div class="card">
                    <img src="{{$recipe['image']}}" alt="{{$recipe['title']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$recipe['title']}}</h5>
                        <p>
                            {{$recipe['instructions']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
