<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\IsEmpty;

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
        
        $data = $request->all();

        if($request->image->isValid()){

            $nameFile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        $post = Post::create($data);

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

        if(Storage::exists($post->image)) 
            Storage::delete($post->image);
            
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

        if(!$post = Post::findOrFail($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if($request->image->isValid()){
            
            if(Storage::exists($post->image)) 
                Storage::delete($post->image);
            

            $nameFile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        $post->update($data);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
            
        return redirect()->route('posts.index')->with('message', "Alterado com sucessso!");
        
    }
}
