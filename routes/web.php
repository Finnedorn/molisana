<?php

use Illuminate\Support\Facades\Route;
//essendo arr first una classe di laravel bisogna prima importarla per usarla
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return redirect('/products');
    //return redirect()->route('products.index');
    return view('home');
})->name('home');

//rotta per vedere tutti i prodotti nelle cards, passiamo nella index produtcs
Route::get('/products', function () {
    // la funzione config('nomedelfilephpdentroallacartella.nomearrayspecifico') mi permette
    // di esportare direttamente il file dentro alla pagina
    //così da poterne sfruttare gli array associativi all'interno
    $products = config('db.pasta');
    //voglio vedere l'array?
    //dd($products);
    //tramite config ho linkato i contenuti del file contenente gli array alla pagina
    //purtroppo però questo non basta, infatti per comunicare al sistema che ciò che sto esportando
    // non è solo una var collegata ad un elemento di un file ma un array associativo dovrò
    //usare la funzione compact che trasforma la variabile in un array associativo
    return view('products.index', compact('products'));
})->name('products.index');

//rotta per mostrare la singola pagina di dettaglio di ciascuna card
//a questa url aggiungerò un parametro che in questo caso è l'id del prodotto singolo
//mettendo le graffe io gli sto dicendo ti passo qualcosa che è dinamico
//mi prendo tutti i prodotti
//if = se l'id è maggiore di 0 e minore del valore massimo dell'array associativo in products
//(funzione count che mi restituisce il valore numerico di quanti elementi ho in un array o oggetto contabile)
//allora avrò una variabile product con valore tale id e inoltre portami alla pagina del relativo id
//altrimenti ritorna una pagina di error 404 oggetto non trovato
Route::get('/products/{id}', function ($id) {
    $products = config('db.pasta');
    if($id >= 0 && $id < count($products)) {
        $product = $products[$id];
        return view('products.show', compact('product'));
    } else {
        abort(404);
    }
})->name('products.show');

Route::get('/recipes', function () {
    $recipes = config('db.recipes');
    return view('recipes.index', compact('recipes'));
})->name('recipes.index');

//rotta per mostrare la singola pagina di dettaglio di ciascuna card
//a questa url aggiungerò un parametro che in questo caso è l'id del prodotto singolo
//mettendo le graffe io gli sto dicendo ti passo qualcosa che è dinamico
//mi prendo tutti i prodotti

Route::get('/recipes/{id}', function ($id) {
    $recipes = config('db.recipes');

    //il metodo arr::first mi permette di restituire true o false se il valore supera un test assegnato all'interno
    //gli serve un parametro array ovvero $recipes ed in questo caso necessita dell'id che ho inserito come use ($id)
    //in questo caso gli sto dicendo return recipe come true se il valore inserito con key idmeal corrisponde all'id
    //se è true allora parte il meccanismo dell'if

    $recipe = Arr::first($recipes, function ($value,$key) use ($id) {
        return $value['idMeal'] == $id;
    });
    if($recipe) {
        return view('recipes.show', compact('recipe'));
    } else {
        abort(404);
    }



    //if = se l'id è maggiore di 0 e minore del valore massimo dell'array associativo in products
    //(funzione count che mi restituisce il valore numerico di quanti elementi ho in un array o oggetto contabile)
    //allora avrò una variabile product con valore tale id e inoltre portami alla pagina del relativo id
    //altrimenti ritorna una pagina di error 404 oggetto non trovato



    // $recipe = null;

    // // foreach ($recipes as $item) {
    // //     if($item["idMeal"] == $id ) {
    // //         $recipe = $item;
    // //     }
    // // }
    // // if ($recipe) {
    // //     return view('recipes.show', compact('item'));
    // // } else {
    // //     abort(404);
    // // }
})->name('recipes.show');


//ecco come impostare una fall back route ovvero
Route::fallback(function () {
    return redirect()->route('home');
});
