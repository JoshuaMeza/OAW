<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve news from db and show
        $news = [];

        // TEST
        $new = ['title' => 'Título', 'date' => 'dd/mm/yyyy', 'url' => '#', 'description' => '...', 'categories' => 'arts'];

        for ($i = 0; $i < 3; $i++) {
            $new['title'] = 'Título ' . $i + 1;
            $news[] = $new;
        }

        // Output
        return view('home', ['news' => $news]);
    }

    public function create()
    {
        // Add RSS to db

        // Update database content
        return redirect()->route('home');
    }

    public function delete()
    {
        // Delete RSS from db

        // Update database content
        return redirect()->route('home');
    }

    public function update()
    {
        // Update database news
        return redirect()->route('home');
    }
}
