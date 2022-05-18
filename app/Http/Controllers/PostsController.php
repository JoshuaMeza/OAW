<?php
namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        return view('index');
    }
    public function search(Request $request){
        $results = Noticia::where('title', 'LIKE', "%{$request->search}%")->paginate(50);
        return view('results', compact('results'))->with(['search' => $request->search])->render();
    }
    public function show(Request $request){
        $post = Noticia::findOrFail($request->id);
        return view('post', compact('post'))->render();
    }
}