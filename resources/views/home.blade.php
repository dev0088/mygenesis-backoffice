@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:10vh">
        <div class="col-md-4" style="text-align: -webkit-center;">
            <div class="home-circle">
            <span class="circle-val" id="t_appliedjobs">0</span>
            </div>
            <br>
            <h3 style="width:200px; height:65px; text-align:center">Offres postulees non traitees</h3>
            <h5 style="text-align:center">Afficher le nombre de reponses de candidats aux offres.</h5>
        </div>
        <div class="col-md-4" style="text-align: -webkit-center;">
            <div class="home-circle">
            <span class="circle-val" id="t_users">0</span>
            </div>
            <br>
            <h3 style="width:200px; height:65px; text-align:center">Nouveaux inscrits</h3>
            <h5 style="text-align:center">Affiche nombre de nouvels inscriptions.</h5>
        </div>
        <div class="col-md-4" style="text-align: -webkit-center;">
            <div class="home-circle">
            <span class="circle-val" id="t_jobs">0</span>
            </div>
            <br>
            <h3 style="width:200px; height:65px; text-align:center">Nombre Offres publiees en cours</h3>
            <h5 style="text-align:center">Afficher le nombre d'offres publiees en cours.</h5>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
<script type="text/javascript">
// Initialize Firebase
var config = {
    apiKey: "AIzaSyD4wDis1nZv-K1vlnHc34hcmLAYX2xQRa4",
    authDomain: "mygenesis-2adb3.firebaseapp.com",
    databaseURL: "https://mygenesis-2adb3.firebaseio.com",
    projectId: "mygenesis-2adb3",
    storageBucket: "mygenesis-2adb3.appspot.com",
    messagingSenderId: "760817321870",
    appId: "1:760817321870:web:ac7e7192b3e5a57c3ec6df",
    measurementId: "G-SZ2TVRNXCN"
};
firebase.initializeApp(config);

var total_users = 0;
firebase.database().ref('users/').on('value', function(snapshot) {
    var value = snapshot.val();
    if (value != null){
        $.each(value, function(index, value){
            total_users += 1;
            $('#t_users').html(total_users);
        });
    }
});


var total_jobs = 0;
firebase.database().ref('jobs/').on('value', function(snapshot) {
    var value = snapshot.val();
    if (value != null){
        $.each(value, function(index, value){
            total_jobs += 1;
            $('#t_jobs').html(total_jobs);
        });
    }
});

var total_appliedjobs = 0;
firebase.database().ref('appliedJobs/').on('value', function(snapshot) {
    var value = snapshot.val();
    if (value != null){
        $.each(value, function(index, value){
            total_appliedjobs += value.appliedJobs.length;
            $('#t_appliedjobs').html(total_appliedjobs);
        });
    }
});
</script>
@endsection