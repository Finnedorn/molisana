<?php

use Illuminate\Support\Facades\Route;

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
    $products = config('db.pasta');
    //voglio vedere l'array?
    //dd($products);
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
    return view('recipes.index', compact('products'));
})->name('recipes.index');
