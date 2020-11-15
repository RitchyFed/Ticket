@extends('layouts.app')

@section('content')
    <div class='container-fluid profile-content'>
        <div class="row">
            <div class="col">
                <h3>
                Vos informations :
                </h3>
                <h4>
                    Votre nom : {{ Auth::user()->name }}

                <br>

                    Votre email : {{ Auth::user()->email }}
                </h4>
            </div>

            <div class="col">

                <h3>
                    Entrez de nouvelles valeurs pour modifier :
                </h3>
                <h4>
                    <form method="post" action="@route('rename.user')">
                        @csrf

                        <label for="name"> Nom : </label>
                        <input type="text" name="name" id="name">

                        <br>

                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email">

                        <br>
                    <input type="submit" value="modifier">
                    </form>
                </h4>
            </div>
        </div>
    </div>
</div>
    <style>


.col {
    text-align: center;
}
        </style>
@endsection



