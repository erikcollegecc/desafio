<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpadareProduto;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->all();

        if ($request->image->isValid()) {

            $nameFile = Str::of($request->nome_produto)->slug('-').'.'.$request->image->getClientOriginalExtension();
            
            $image = $request->image->storeAs('produtos', $nameFile);
            $data['image'] = $image;
        }

        Produtos::create($data);

        return redirect()->route('produtos.index');

    }

    public function show($id){
        if (!$produto = Produtos::find($id)){
            return redirect()->route('produtos.index');
        }
        
        return view('admin.produtos.show', compact('produto'))->with('message', 'Produto cadastrado com sucesso!');
    }

    public function destroy($id){
        if (!$produto = Produtos::find($id))
            return redirect()->route('produtos.index');

        if (Storage::exists($produto->image))
            Storage::delete($produto->image);

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

        $data = $request->all();

        if ($request->image && $request->image->isValid()) {
            if (Storage::exists($produto->image))
                Storage::delete($produto->image);

            $nameFile = Str::of($request->nome_produto)->slug('-').'.'.$request->image->getClientOriginalExtension();
            
            $image = $request->image->storeAs('produtos', $nameFile);
            $data['image'] = $image;
        }

        $produto->update($data);

        return redirect()->route('produtos.index')->with('message', 'Produto atualizado com sucesso!');
    }

    public function search(Request $request){
        $filters = $request->except('_token');

        $produtos = Produtos::where('nome_produto', 'LIKE', "%{$request->search}%")
            ->orWhere('descricao', 'LIKE', "%{$request->search}%")
            ->paginate(2);


        return view('admin.produtos.index', compact('produtos', 'filters')); 
    }
}
