@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:10vh">
        <div class="col-md-4" style="text-align: -webkit-center;">
            <div class="home-circle">
            <span class="circle-val">15</span>
            </div>
            <br>
            <h3 style="width:200px; height:65px; text-align:center">Offres postulees non traitees</h3>
            <h5 style="text-align:center">Afficher le nombre de reponses de candidats aux offres.</h5>
        </div>
        <div class="col-md-4" style="text-align: -webkit-center;">
            <div class="home-circle">
            <span class="circle-val">4</span>
            </div>
            <br>
            <h3 style="width:200px; height:65px; text-align:center">Nouveaux inscrits</h3>
            <h5 style="text-align:center">Affiche nombre de nouvels inscriptions.</h5>
        </div>
        <div class="col-md-4" style="text-align: -webkit-center;">
            <div class="home-circle">
            <span class="circle-val">28</span>
            </div>
            <br>
            <h3 style="width:200px; height:65px; text-align:center">Nombre Offres publiees en cours</h3>
            <h5 style="text-align:center">Afficher le nombre d'offres publiees en cours.</h5>
        </div>
    </div>
</div>
@endsection
