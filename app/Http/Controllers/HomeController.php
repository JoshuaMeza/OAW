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
        $rss['rss'] = Rss::orderBy('id', 'asc')->paginate(15);
        $news['news'] = Noticia::orderBy('date', 'desc')->paginate(50);

        // Output
        return view('home', $rss, $news);
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
        $news['news'] = Noticia::orderBy('date', 'asc')->paginate();

        // Output
        return view('home', $news);
    }

    public function update(Request $request)
    {
        // Update database news based on RSS's
        $feed = new SimplePie();
        $responses = DB::table('rsses')->select('url')->get();
        $urls = array();
        $deleted = DB::table('noticias')->delete();

        foreach ($responses as $response) {
            array_push($urls, $response->url);
        }

        if ($urls) {
            $feed->set_feed_url($urls);
            $feed->enable_cache(false);
            $feed->init();

            foreach ($feed->get_items() as $item) {
                $date = $this->limit($item->get_date(), 100);
                $title = $this->limit($item->get_title(), 255);
                $url = $this->limit($item->get_link(), 300);
                $description = $this->limit($item->get_description(), 500);
                $categoryString = '';

                foreach ($item->get_categories() as $category) {
                    $categoryString .= $category . ',';
                }

                $categoryString = $this->limit($categoryString, 100);

                DB::table('noticias')->insert([
                    'date' => $date,
                    'title' => $title,
                    'url' => $url,
                    'description' => $description,
                    'categories' => $categoryString
                ]);
            }
        }

        return response('', 200)
            ->header('Content-Type', 'text/plain');
    }

    private function limit(String $text, int $max)
    {
        return strlen($text) > $max ? substr($text, 0, $max - 1) : $text;
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
