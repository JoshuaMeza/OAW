<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve RSS sources
        $rss = [];

        // TEST: ADD SOME STATIC RSS SOURCES
        $rss[] = ['id' => 0, 'link' => 'http://rss.cnn.com/rss/cnn_latest.rss'];
        $rss[] = ['id' => 1, 'link' => 'http://www.bbc.co.uk/mundo/temas/internacional/index.xml'];

        // Output
        return view('home', ['rss' => $rss]);
    }

    public function create(Request $request)
    {
        // Add RSS to db
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
