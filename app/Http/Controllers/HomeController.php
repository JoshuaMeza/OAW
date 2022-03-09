<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class HomeController extends Controller
{
    public function index()
<<<<<<< Updated upstream
    {   
        $rss[]=Posts::paginate();
        return view('home', ['rss'=>$rss]);
=======
    {
        $rss['rss'] = Rss::orderBy('id', 'asc')->paginate();
        $news['news'] = Noticia::orderBy('date', 'asc')->paginate();

        // Output
        return view('home', $rss, $news);
>>>>>>> Stashed changes
    }

    public function create(Request $request)
    {
        $rss = request()->except('_token');
        Posts::insert($rss);
        return response()->setStatusCode(200);
    }

    public function read(Request $request)
    {
<<<<<<< Updated upstream
        $rss = Posts::except(['_token','_method']);
        return view('home',['rss'=>$rss]);
=======
        $news['news'] = Noticia::orderBy('date', 'asc')->paginate();

        // Output
        return view('home', $news);
>>>>>>> Stashed changes
    }

    public function update(Request $request, $id)
    {
<<<<<<< Updated upstream
        $rss = request()->except(['_token','_method']);
        Posts::where('id','=',$id)->update(rss);
        $register=Posts::findOrFail($id);
        return view('home',['rss'=>$rss]);
=======
        // Update database news based on RSS's
        $feed = new SimplePie();
        $responses = DB::table('rsses')->select('url')->get();
        $urls = array();

        foreach ($responses as $response) {
            array_push($urls, $response->url);
        }

        if ($urls) {
            $deleted = DB::table('noticias')->delete();
            $feed->set_feed_url($urls);
            $feed->enable_cache(false);
            $feed->init();

            foreach ($feed->get_items() as $item) {
                $categoryString = '';

                foreach ($item->get_categories() as $category) {
                    $categoryString .= $category . ',';
                }

                DB::table('noticias')->insert([
                    'date' => $item->get_date(),
                    'title' => $item->get_title(),
                    'url' => $item->get_link(),
                    'description' => $item->get_description(),
                    'categories' => $categoryString
                ]);
            }
            
            return response('', 200)
                ->header('Content-Type', 'text/plain');
        }

        return response('', 500)
            ->header('Content-Type', 'text/plain');
>>>>>>> Stashed changes
    }

    public function delete($id)
    {
        Posts::destroy($id);
        response()->setStatusCode(200);
        return redirect('');
    }

}
