<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve RSS sources

        // TEST: ADD SOME STATIC RSS SOURCES
        $rss['register']=Posts::paginate(5);

        // Output
        return view('home', ['register'=>$rss]);
    }

    public function create(Request $request)
    {
        $datosRss = request()->except('_token');
        Posts::insert($datosRss);
        return response()->setStatusCode(200);
    }

    public function read(Request $request)
    {
        $datosRss = Posts::except(['_token','_method']);
        return view('home',['register'=>$rss]);
    }

    public function update(Request $request, $id)
    {
        $datosRss = request()->except(['_token','_method']);
        Posts::where('id','=',$id)->update(rss);
        $register=Posts::findOrFail($id);
        return view('home',['register'=>$rss]);
    }

    public function delete($id)
    {
        Posts::destroy($id);
        response()->setStatusCode(200);
        return redirect('');
    }

}
