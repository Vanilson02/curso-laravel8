<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {   
        $posts = Post::paginate(5);
       
        return view('admin.posts.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request){
        
        $post = Post::create($request->all());

        if(!$post)
            return redirect()->route('posts.index')->with('message', "Erro ao cadastrar!");


        return redirect()->route('posts.index')->with('message', "Cadastrado com sucesso!");
    }

    public function show($id)
    {
        if(!$post = Post::find($id))
            return redirect()->route('posts.index');
        

        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {
        if(!$post = Post::find($id))
            return redirect()->route('posts.index');

        $post->delete();
        return redirect()->route('posts.index')->with('message', "Post Deletado com Sucesso!");

    }

    public function search(Request $request)
    {   
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                    ->orWhere('content', 'LIKE', "%{$request->search}%")
                    ->paginate(5);

        return view('admin.posts.index' ,compact('posts','filters'));
        
    }

    public function edit($id)
    {
        if(!$post = Post::find($id))
            return redirect()->route('posts.index');
        

        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id){

        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
            
        return redirect()->route('posts.index')->with('message', "Alterado com sucessso!");
        
    }
}
