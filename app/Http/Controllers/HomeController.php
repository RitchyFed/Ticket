<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use Illuminate\Support\Facades\Auth;

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
        return view('home', [
            'tables' => Table::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $table = new Table();
        $table->user_id = $user->id;
        $table->title = $request->title;
        $table->description = $request->description;
        $table->save();
        return view('home', ['tables' => Table::where('user_id', Auth::user()->id)->get()]);
    }
    public function del(Request $request, $table)
    {
        Table::where('id', $table)->delete();
        return back();
    }

    public function rename(Request $request)
    {
        $id = auth()->id();
        $table = Table::find($id);
        $table->title = $request->title;
        $table->description = $request->description;
        $table->save();
        return back();
    }
}
