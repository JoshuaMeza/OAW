<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class HomeController extends Controller
{
    public function index()
    {   
        $rss[]=Posts::paginate();
        return view('home', ['rss'=>$rss]);
    }

    public function create(Request $request)
    {
        $rss = request()->except('_token');
        Posts::insert($rss);
        return response()->setStatusCode(200);
    }

    public function read(Request $request)
    {
        $rss = Posts::except(['_token','_method']);
        return view('home',['rss'=>$rss]);
    }

    public function update(Request $request, $id)
    {
        $rss = request()->except(['_token','_method']);
        Posts::where('id','=',$id)->update(rss);
        $register=Posts::findOrFail($id);
        return view('home',['rss'=>$rss]);
    }

    public function delete($id)
    {
        Posts::destroy($id);
        response()->setStatusCode(200);
        return redirect('');
    }

}
