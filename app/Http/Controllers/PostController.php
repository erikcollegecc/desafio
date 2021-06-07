<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePost;

class PostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('id', 'DESC')->paginate(2);

        //dd($posts);

        return view('admin.post.index', compact('posts'));
    }

    public function create(){
        return view('admin.post.create');
    }

    public function store(StoreUpdatePost $request){
        $post = Post::create($request->all());
        
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post criado com sucesso');

        //dd('$request->title');
        //dd('$request->all');
        //dd('Cadastrando um novo post...');
    }

    public function show($id){
        //dd($id);
        //$post =Post::where('id', $id)->firest();
        //dd($post);
        $post = Post::find($id);
        if (!$post){
            return redirect()->route('posts.index');
        }
        
        return view('admin.post.show', compact('post'));
    }

    public function destroy($id){
        //dd("Deletar o post $id");
        if (!$post = Post::find($id))
            return redirect()->route('posts.index');

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post deletado com sucesso');
    }

    public function edit($id){    
        if (!$post = Post::find($id)){
            return redirect()->back();
        }
        return view('admin.post.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id){    
        if (!$post = Post::find($id)){
            return redirect()->back();
        }
        //dd("Editando o post {$post->id}");
        $post->update($request->all());
        
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post atualizado com sucesso');
    }

    public function search(Request $request){
        //dd("search {$request->search}");
        $filters = $request->except('_token');

        $posts = Post::where('title', '=', "%{$request->search}%")
            ->orWhere('content', 'LIKE', "%{$request->search}%")
            ->paginate(2);

        return view('admin.post.index', compact('posts', 'filters'));    }
    
}