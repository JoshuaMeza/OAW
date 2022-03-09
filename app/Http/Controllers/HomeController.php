<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rss;
use App\Models\Noticia;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index()
    {
        $rss['rss'] = Rss::orderBy('id','desc')->paginate(5);

        // Output
        return view('home', $rss);
    }

    public function create(Request $request)
    {
        $input = $request->collect();
        if ($input['url']) {
            $id = DB::table('rsses')->insertGetId(
                ['url' => $input['url']]
            );
            return response("",200)
                ->header('Content-Type', 'text/plain');
        }
        return response("",500)
                ->header('Content-Type', 'text/plain');
    }
    
    public function read(Request $request)
    {
        // Get news from database
    }

    public function update(Request $request)
    {
        // Update database news based on RSS's
    }

    public function delete(Request $request)
    {
        // Delete RSS from db
    }
}
