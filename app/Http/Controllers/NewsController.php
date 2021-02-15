<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        $news = News::paginate(10);
        // dd($news);
        return view('main.news', compact('news'));
    }
}
