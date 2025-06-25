<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\product;
class EventController extends Controller
{
    public function index()
    {
        // $nome = "Matheus";
        // $idade = 29;

        // $arr = [10, 20, 30, 40, 50];

        // $nomes = ["Matheus", "Maria", "João", "Saulo"];

        // return view(
        //     'welcome',
        //     [
        //         'nome' => $nome,
        //         'idade2' => $idade,
        //         'profissao' => "Programador",
        //         'arr' => $arr,
        //         'nomes' => $nomes
        //     ]
        // );
        // $product = product::all(); // usando o `all` para ler todos os dados da tabela
        // return dd($product); // `dd` usado para degubar 

        $name = "Teste";

        return view('home', compact('name'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function products()
    {
        $term = request('search');

        return view('products', ['term' => $term]);
    }

    public function product($id = 1)
    {
        return view('product', ['id' => $id]);
    }


}
