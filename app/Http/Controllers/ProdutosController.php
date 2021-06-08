<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        $produtos = Produtos::orderBy('id_p', 'DESC')->paginate(2);

        //$produtos = Produtos::get();
 
        return view('admin.produtos.index', compact('produtos'));    
    }

    public function create(){
        return view('admin.produtos.create');
    }

    public function store(Request $request){
        $produto = Produtos::create($request->all());
        return redirect()->route('produtos.index');

    }

    public function show($id_p){
        $produto = Produtos::find($id_p);
        dd($produto);
    }

    public function edit(){
        return view('admin.produtos.create');
    }
}
