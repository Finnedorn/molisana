{{-- conterrà la liste di tutti i prodotti --}}

@extends('layouts.app')

@section('title', 'Products')

@section('content')
<main>
    <section class="container">
        <h1>Products</h1>
        <div class="row gy-4">
            {{-- cicla per ogni elemento di product ma assieme ad esso pure la propria key che mi farà da id --}}
          @foreach ($products as $key=>$product)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{$product['src']}}" alt="{{$product['titolo']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$product['titolo']}}</h5>
                        <p class="card-text">{!! substr($product['descrizione'], 0, 100) . '...' !!}</p>
                        {{-- ho ciclato assieme alla key così da avere un index da apassare al link --}}
                        <a href="{{route('products.show', $key)}}" class="btn btn-primary">Vedi dettaglio</a>
                    </div>
                </div>
            </div>

          @endforeach
        </div>

    </section>

</main>

@endsection
