@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:20px">
        <div class="col-md-5">
            <table class="table table-striped table-hover" id="users_table">
                <thead style="color: #566787;">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-7">
            <div class="card-header" style="background:gray; color:white;">
                <div class="col-md-5" style="display:inline-block;font-size: 1.125rem;font-weight:600;">
                    Fiche Candidat
                </div>
                <div class="col-md-6" id="user_email" style="text-align:right; display:inline-block;">
                    user@gmail.com
                </div>
            </div>
            <div class="card-body" style="background:white;">
                <div class="row justify-content-center">
                    <div class="col-md-5" style="text-align:center">
                        <p><h5 id="user_name">Honda Accord</h5></p>
                        <br>
                        <p id="user_area">Secteur activité</p>
                        <p id="user_job">Métier</p>
                        <a href="#" id="user_cv">Téléchargé CV</a>
                    </div>
                    <div class="col-md-7" style="background-color: rgba(0,0,0,.03);padding-bottom: 10px;">
                        <div class="card-header" style="background-color: rgba(0,0,0,.00);color:darkblue;text-align:center;font-weight:600;border-bottom:0px">
                        Mes créneaux horaires par jour
                        </div>
                        <div class="card-body" style="border-radius: 10px;background: white;padding-top: 0px;">
                            <div class="">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>                        
                                            <th>Matin</th>
                                            <th>Soir</th>
                                            <th>Nuit</th>
                                            <th>Journée</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="timeslot_mon">
                                        </tr>
                                        <tr id="timeslot_tue">
                                        </tr>
                                        <tr id="timeslot_wed">
                                        </tr>
                                        <tr id="timeslot_thu">
                                        </tr>
                                        <tr id="timeslot_fri">
                                        </tr>
                                        <tr id="timeslot_sat">
                                        </tr>
                                        <tr id="timeslot_sun">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
<script type="text/javascript">
// $.ajaxSetup({
//      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
//  });
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
var storageRef = firebase.storage();
//getting users from firebase
var lastIndex = 1;
firebase.database().ref('users/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                htmls.push('<tr id="'+index+'">\
                    <td>'+ lastIndex +'</td>\
                    <td>'+ value.lastName +'</td>\
                    <td>'+ value.firstName +'</td>\
                    <td>'+ value.telephone +'</td>\
                </tr>');
            }       
            lastIndex ++;
        });
    }
    $('#tbody').html(htmls);
});

$(document).ready(function(){
    //users table tr click event
    var user_id = 0;
    $('#tbody').on('click','td',function (e) {
        user_id = $(this).closest('tr').attr('id');

        firebase.database().ref('users/'+user_id).on('value', function(snapshot) {
            var value = snapshot.val();
            if (value != null){
                $('#user_email').html(value.email);
                $('#user_name').html(value.firstName + ' ' + value.lastName);
                $('#user_area').html(value.activityArea);
                $('#user_job').html(value.job);
            }
        });

        firebase.database().ref('availability/'+user_id).on('value', function(snapshot) {
            var value = snapshot.val();
            var mon_htmls =[];
            var tue_htmls =[];
            var wed_htmls =[];
            var thu_htmls =[];
            var fri_htmls =[];
            var sat_htmls =[];
            var sun_htmls =[];
            var mon_check = [];
            var tue_check = [];
            var wed_check = [];
            var thu_check = [];
            var fri_check = [];
            var sat_check = [];
            var sun_check = [];
            if (value != null){
                var i;
                //Monday
                for (i = 0; i < value.Lun.length; i++) {
                    if(value.Lun[i] == 'false'){
                        mon_check[i] = '';
                    } else {
                        mon_check[i] = '<i class="material-icons">check_circle</i>';
                    }
                }
                mon_htmls.push('<td style="font-weight:600">Lun</td>\
                <td>'+ mon_check[0] +'</td>\
                <td>'+ mon_check[1] +'</td>\
                <td>'+ mon_check[2] +'</td>\
                <td>'+ mon_check[3] +'</td>');
                //Tuesday
                for (i = 0; i < value.Mar.length; i++) {
                    if(value.Mar[i] == 'false'){
                        tue_check[i] = '';
                    } else {
                        tue_check[i] = '<i class="material-icons">check_circle</i>';
                    }
                }
                tue_htmls.push('<td style="font-weight:600">Mar</td>\
                <td>'+ tue_check[0] +'</td>\
                <td>'+ tue_check[1] +'</td>\
                <td>'+ tue_check[2] +'</td>\
                <td>'+ tue_check[3] +'</td>');
                //Wednesday
                for (i = 0; i < value.Mer.length; i++) {
                    if(value.Mer[i] == 'false'){
                        wed_check[i] = '';
                    } else {
                        wed_check[i] = '<i class="material-icons">check_circle</i>';
                    }
                }
                wed_htmls.push('<td style="font-weight:600">Mer</td>\
                <td>'+ wed_check[0] +'</td>\
                <td>'+ wed_check[1] +'</td>\
                <td>'+ wed_check[2] +'</td>\
                <td>'+ wed_check[3] +'</td>');
                //Thursday
                for (i = 0; i < value.Jeu.length; i++) {
                    if(value.Jeu[i] == 'false'){
                        thu_check[i] = '';
                    } else {
                        thu_check[i] = '<i class="material-icons">check_circle</i>';
                    }
                }
                thu_htmls.push('<td style="font-weight:600">Jeu</td>\
                <td>'+ thu_check[0] +'</td>\
                <td>'+ thu_check[1] +'</td>\
                <td>'+ thu_check[2] +'</td>\
                <td>'+ thu_check[3] +'</td>');
                //Friday
                for (i = 0; i < value.Ven.length; i++) {
                    if(value.Ven[i] == 'false'){
                        fri_check[i] = '';
                    } else {
                        fri_check[i] = '<i class="material-icons">check_circle</i>';
                    }
                }
                fri_htmls.push('<td style="font-weight:600">Ven</td>\
                <td>'+ fri_check[0] +'</td>\
                <td>'+ fri_check[1] +'</td>\
                <td>'+ fri_check[2] +'</td>\
                <td>'+ fri_check[3] +'</td>');
                //Saturday
                for (i = 0; i < value.Sam.length; i++) {
                    if(value.Sam[i] == 'false'){
                        sat_check[i] = '';
                    } else {
                        sat_check[i] = '<i class="material-icons">check_circle</i>';
                    }
                }
                sat_htmls.push('<td style="font-weight:600">Sam</td>\
                <td>'+ sat_check[0] +'</td>\
                <td>'+ sat_check[1] +'</td>\
                <td>'+ sat_check[2] +'</td>\
                <td>'+ sat_check[3] +'</td>');
                //Sunday
                for (i = 0; i < value.Dim.length; i++) {
                    if(value.Dim[i] == 'false'){
                        sun_check[i] = '';
                    } else {
                        sun_check[i] = '<i class="material-icons">check_circle</i>';
                    }
                }
                sun_htmls.push('<td style="font-weight:600">Dim</td>\
                <td>'+ sun_check[0] +'</td>\
                <td>'+ sun_check[1] +'</td>\
                <td>'+ sun_check[2] +'</td>\
                <td>'+ sun_check[3] +'</td>');
            } else {
                mon_htmls.push('<td style="font-weight:600">Lun</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>');
                tue_htmls.push('<td style="font-weight:600">Mar</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>');
                wed_htmls.push('<td style="font-weight:600">Mer</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>');
                thu_htmls.push('<td style="font-weight:600">Jeu</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>');
                fri_htmls.push('<td style="font-weight:600">Ven</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>');
                sat_htmls.push('<td style="font-weight:600">Sam</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>');
                sun_htmls.push('<td style="font-weight:600">Dim</td>\
                <td></td>\
                <td></td>\
                <td></td>\
                <td></td>');
            }
            $('#timeslot_mon').html(mon_htmls);
            $('#timeslot_tue').html(tue_htmls);
            $('#timeslot_wed').html(wed_htmls);
            $('#timeslot_thu').html(thu_htmls);
            $('#timeslot_fri').html(fri_htmls);
            $('#timeslot_sat').html(sat_htmls);
            $('#timeslot_sun').html(sun_htmls);
        });
    });
    $('#user_cv').on('click',function(e){
        if(user_id != 0){
            var cv_filename='';
            var url = '';
            firebase.database().ref('users/'+user_id).on('value', function(snapshot) {
                var value = snapshot.val();
                cv_filename = value.cvFileName;
                url = value.cvFirebasePath;
            });
            e.preventDefault();  //stop the browser from following
            window.open(url, '_blank');
            // window.location.href = url;
            // var cvRef = storageRef.child(cv_filename);             
            // cvRef.getDownloadURL().then(function(url) {
            //   // This can be downloaded directly:
            //   var xhr = new XMLHttpRequest();
            //   xhr.responseType = 'blob';
            //   xhr.onload = function(event) {
            //     var blob = xhr.response;
            //   };
            //   xhr.open('GET', url);
            //   xhr.send();

            //   // Or inserted into an <img> element:
            //   // var img = document.getElementById('myimg');
            //   // img.src = url;
            // }).catch(function(error) {
            //   switch (error.code) {
            //     case 'storage/object-not-found':
            //       alert("File doesn't exist");
            //       break;
            //     case 'storage/unauthorized':
            //       alert("User doesn't have permission to access the object");
            //       break;
            //     case 'storage/canceled':
            //       alert("User canceled the upload");
            //       break;
            //     case 'storage/unknown':
            //       alert("Unknown error occurred, inspect the server response");
            //       break;
            //   }
            // });
        }
    });
});
</script>
@endsection