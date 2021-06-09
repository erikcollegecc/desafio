<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpadareProduto;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        $produtos = Produtos::orderBy('id', 'DESC')->paginate(2);

        //$produtos = Produtos::get();
 
        return view('admin.produtos.index', compact('produtos'));    
    }

    public function create(){
        return view('admin.produtos.create');
    }

    public function store(StoreUpadareProduto $request){
        $produto = Produtos::create($request->all());
        return redirect()->route('produtos.index');

    }

    public function show($id){
        if (!$produto = Produtos::find($id)){
            return redirect()->route('produtos.index')->with('message', 'Produto cadastrado com sucesso!');
        }
        
        return view('admin.produtos.show', compact('produto'));
    }

    public function destroy($id){
        if (!$produto = Produtos::find($id))
            return redirect()->route('produtos.index');

        $produto->delete();

        return redirect()->route('produtos.index')->with('message', 'Produto deletado com sucesso!');

    }

    public function edit($id){
        if (!$produto = Produtos::find($id)){
            return redirect()->back('');
        }
        
        return view('admin.produtos.edit', compact('produto'));
    }


    public function update(StoreUpadareProduto $request, $id){
        if (!$produto = Produtos::find($id)){
            return redirect()->back('');
        }

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('message', 'Produto atualizado com sucesso!');


        dd("Editar produto: {$produto->id}");
    }

    public function search(Request $request){
        $filters = $request->except('_token');

        $produtos = Produtos::where('nome_produto', 'LIKE', "%{$request->search}%")
            ->orWhere('descricao', 'LIKE', "%{$request->search}%")
            ->paginate(2);


        return view('admin.produtos.index', compact('produtos', 'filters')); 
    }
}
