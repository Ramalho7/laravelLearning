<?php // site controller - fica responsável por páginas padrões do site

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        return view('site.home');
    }

    
}
