<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Liste;
use App\Card;
use App\Com;

class TableController extends Controller
{

    public function table($tableid)
    {

        return view(
            'table',
            [
                'list' => Liste::where('table_id', $tableid)->get(), //MERCI THIBAULT pour le ->get()
                'card' => Card::all(),
                'com' => Com::all(),

                'table_id' => $tableid,
            ]
        );
    }

    //LISTES
    public function storeli(Request $request, $tableid)
    {
        $list = new Liste();
        $list->table_id = $tableid;
        $list->title = $request->title;
        $list->save();
        return back();
        // return view(
        //     [
        //         'list' => Liste::where('table_id', $tableid)->get(), //MERCI THIBAULT pour le ->get()
        //         'card' => Card::where('list_id', $listid)->get(),
        //         'com' => Com::all(),
        //     ]
        // );
    }

    public function delli(Request $request, $list)
    {
        Liste::where('id', $list)->delete();
        return back();
    }

    public function renameli(Request $request, $id)
    {
        $id = auth()->id();
        $list = Liste::find($id);
        $list->title = $request->title;
        $list->save();
        return back();
    }


    //CARDS
    public function storecard(Request $request, $listid)
    {
        $card = new Card();
        $card->liste_id = $listid;
        $card->title = $request->title;
        $card->content = $request->content;
        $card->save();
        return back();
        // return view(
        //     [
        //         'card' => Card::where('list_id', $listid)->get(),
        //         'com' => Com::where('card_id', $cardid)->get(),
        //     ]
        // );
    }

    public function delcard(Request $request, $card)
    {
        Card::where('id', $card)->delete();
        return back();
    }

    public function renamecard(Request $request, $id)
    {
        $id = auth()->id();
        $card = Card::find($id);
        $card->title = $request->title;
        $card->content = $request->content;
        $card->save();
        return back();
    }


    //COMS
    public function storecom(Request $request, $cardid)
    {
        $com = new Com();
        $com->card_id = $cardid;
        $com->message = $request->message;
        $com->save();
        return back();
    }
    public function delcom(Request $request, $com)
    {
        Com::where('id', $com)->delete();
        return back();
    }

    public function renamecom(Request $request, $id)
    {
        $id = auth()->id();
        $com = Com::find($id);
        $com->title = $request->title;
        $com->message = $request->message;
        $com->save();
        return back();
    }
}

// \App\Liste::find(4)->card->each(function ($card) {
//     echo $card->name, '<br>';
// });
