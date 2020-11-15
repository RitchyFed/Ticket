<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{

    public function profil()
    {
        return view('profil');
    }

    public function rename(Request $request)
    {
        $id = auth()->id();
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return back();
    }
}
