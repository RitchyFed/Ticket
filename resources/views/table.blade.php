@extends('layouts.app')


@section('content')

<div class="mld-bg">
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <form method="post" action="@route('store.li',[$table_id])">
                    @csrf
                    <label for="title"><h2> Ajouter une nouvelle liste  : </h2></label>
                    <input type="text" name="title" id="title" placeholder="Titre">
                    <input type="submit" value="+">
            </form>

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
@foreach ($list as $list_item)
        <div class="col ">
            <div class="row">
                <div class="col">
                    <b><h3> {{ $list_item->title }} </h3></b>
                    <form method="post" action="@route('del.li',[$list_item->id])">
                        @csrf
                        <input type="submit" value="X li">
                        </form>
                </div>
            </div>

    @foreach ($card as $card_item)
    @if($list_item->id == $card_item->liste_id)
            <div class="row">
                <div class="col">
                   <i> <h5>   {{ $card_item->title }} </h5></i>
                    <p>   {{ $card_item->content }} </p>

                    <div class="row">
                        <div class="col">
                            <form method="post" action="@route('store.com',[$card_item->id])">
                                @csrf
                                <input type="text" name="message" id="message" placeholder="Entrez votre commentaire">

                                <input type="submit" value="ajouter">

                            </form>
                        </div>
                    </div>
            @foreach($com as $com_item)
            @if($card_item->id == $com_item->card_id)
                    <div class="row">
                        <div class="col">
                            <h6> {{ $com_item->message }} </h6>
                            <form method="post" action="@route('del.com',[$com_item->id])">
                                @csrf
                                <input type="submit" value="x com">
                                </form>
                        </div>
                    </div>
            @endif
            @endforeach
                    <div class="row">
                        <div class="col-sm">
                        <form method="post" action="@route('del.card',[$card_item->id])">
                            @csrf
                            <input type="submit" value="x card">
                            </form>
                            <form method="post" action="@route('rename.card',[$card_item->id])">
                                @csrf
                                <input type="submit" value="ø">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                   <p> {{ $card_item->message }}<p>
                </div>
            </div>
    @endif
    @endforeach
        <div class="row">
            <div class="col">
                <form method="post" action="@route('store.card',[$list_item->id])">
                    @csrf

                    <input type="text" name="title" id="title" placeholder="Titre">

                    <input type="text" name="content" id="content" placeholder=" contenu de la card">

                    <input type="submit" value="+">

                </form>
            </div>
        </div>

        </div>
@endforeach
    </div>
</div>






{{-- <form method="post" action="@route('store.com')">
    @csrf
        <label for="title" > Titre  de votre Com</label>
        <input type="text" name="title" id="title">

        <input type="text" name="message" id="message" placeholder="Entrez votre commentaire">

        <input type="submit" value="ajouter">

    </form> --}}




<div class="mld-bg">
@endsection

<style>
   body {
            background-image: url(../storage/assets/1.jpg);
            background-size: cover;
            color:black;
        }
</style>
