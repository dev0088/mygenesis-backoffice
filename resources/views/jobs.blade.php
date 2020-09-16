@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:20px">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead style="color: #566787;">
                    <tr>
                        <th>#</th>                        
                        <th>Profession</th>
                        <th>Contrat</th>
                        <th>Date de publication</th>
                        <th>Rémunération</th>
                        <th>Localisation</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
<script type="text/javascript">
$.ajaxSetup({
     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
 });
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
firebase.database().ref('jobs').remove();
//getting jobs from softy
$.ajax({
    type:'POST',
    url:"{{ route('getjobs') }}",
    contentType: false,
    processData: false,
    success: function (jobs) {
      const obj = JSON.parse(jobs);
      var job_id = 0;
      $.each(obj, function (i) {
        $.each(obj[i], function (key, val) {
          //each job starts with 'DATE' parameter. At this time generate uniuque job id to divide each jobs
          if(key == 'date'){
            job_id = firebase.database().ref('jobs').push().key;
            firebase.database().ref('jobs/'+job_id).set({
                date: '',
                title: '',
                id: '',
                contract_type: '',
                description: '',
                position: '',
                profile: '',
                url: '',
                location: '',
                postcode: '',
                country: '',
                salary: '',
                rome: '',
            }, function(error) {
                if(error)
                    alert(error);
            });
          }
          firebase.database().ref('jobs/'+job_id+'/'+key).set(val);
        });
      });
    },
    error: function () {
        alert("Getting jobs was failed.");
    }
});
//getting jobs from firebase
var lastIndex = 0;
firebase.database().ref('jobs/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                htmls.push('<tr>\
                    <td>'+ lastIndex +'</td>\
                    <td>'+ value.title +'</td>\
                    <td>'+ value.contract_type +'</td>\
                    <td>'+ value.date +'</td>\
                    <td>'+ value.salary +'</td>\
                    <td>'+ value.location +'</td>\
                </tr>');
            }       
            lastIndex ++;
        });
    }
    $('#tbody').html(htmls);
});
</script>
@endsection