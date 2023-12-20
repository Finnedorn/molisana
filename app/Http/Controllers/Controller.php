<?php

//il namespace è una classe che funge da pacchetto/libreria di classi
//puo essere condiviso tra piu classi e va richiamato per essere usato
//ciò è fatto affinche il codice sia organizzato bene e di conseguienza
//per prevenire conflitti coi vari nomi delle molte altre librerie

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
