<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rss;
use App\Models\Noticia;
use Illuminate\Support\Facades\DB;
use SimplePie;

class HomeController extends Controller
{
    public function index()
    {
        $rss['rss'] = Rss::orderBy('id', 'asc')->paginate();

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

            return response("", 200)
                ->header('Content-Type', 'text/plain');
        }

        return response("", 500)
            ->header('Content-Type', 'text/plain');
    }

    public function read(Request $request)
    {
        // Get news from database
    }

    public function update(Request $request)
    {
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
                    'description' => $item->get_description(),
                    'categories' => $categoryString
                ]);
            }

            return response('', 200)
                ->header('Content-Type', 'text/plain');
        }

        return response('', 500)
            ->header('Content-Type', 'text/plain');
    }

    public function delete(Request $request)
    {
        // Delete RSS from db
        $input = $request->collect();

        if ($input['id']) {
            $deleted = DB::table('rsses')->where('id', '=', $input['id'])->delete();

            return response("", 200)
                ->header('Content-Type', 'text/plain');
        }

        return response("", 500)
            ->header('Content-Type', 'text/plain');
    }
}
