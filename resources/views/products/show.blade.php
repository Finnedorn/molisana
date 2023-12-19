{{-- conterrà la singolo prodotto (dettaglio) --}}
@extends('layouts.app')

@section('title', 'Product details')

@section('content')
    <main>
        <section class="container">
            <div class="row gy-4">
                <div class="col-12 ">
                    <div class="card">
                        <img src="{{$product['src']}}" alt="{{$product['titolo']}}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$product['titolo']}}
                            </h5>
                            <p class="card-text">
                                {!! $product['descrizione']!!}
                            </p>
                            <p>
                               peso: {{$product['peso']}}
                            </p>
                            <p>
                                tempi di cottura: {{$product['cottura']}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
