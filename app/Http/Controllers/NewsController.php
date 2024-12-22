<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Problem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $problem = Problem::all();
        $news = News::all();
        $allProblems = Problem::all();

        return view('home', [
            'news' => $news,
            'problem' => $problem,
            'allProblems' => $allProblems
        ]);
    }

    public function category($id)
    {
        $problem = Problem::all();
        $news = News::where('problemID', 'like', $id)->get();

        return view('home', [
            'news' => $news,
            'problem' => $problem,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $problem = Problem::all();
        $news = News::where('newsTitle', 'like', '%' . $query . '%')->get();
        return view('home', [
            'news' => $news,
            'problem' => $problem,
        ]);
    }

    public function detail($id)
    {
        $news = News::where('newsID', 'like', $id)->first();

        return view('newsDetail', [
            'news' => $news,
        ]);
    }

    public function problemPage($id)
    {
        $problem = Problem::where("problemID", 'LIKE', $id)->first();
        $allProblems = Problem::all();

        return view('problems', [
            'problem' => $problem,
            'allProblems' => $allProblems,
        ]);
    }
}
