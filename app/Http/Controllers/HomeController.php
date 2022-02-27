<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('home', compact('users'));
    }

    public function addArticle(Request $request)
    {
        $user_id = auth()->user()->id;
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user_id,
        ]);
        return redirect()->back();
    }
}
