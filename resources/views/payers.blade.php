@extends('layout.layout')
@section('style')
<style type="text/css">
.desabled {
    pointer-events: none;
}
</style>
@endsection
@section('content')
<div class="" style="padding:0px 10px;">
    <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Consult Payers</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="color: #566787;">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Zip Code</th>
                        <th>Paid Date</th>
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
<script type="text/javascript">
// Initialize Firebase
var config = {
    apiKey: "AIzaSyDoAjhMLWRtJT62MhtNPxcGugVdLFKjMFU",
    authDomain: "tina-project-a9ad6.firebaseapp.com",
    databaseURL: "https://tina-project-a9ad6.firebaseio.com",
    projectId: "tina-project-a9ad6",
    storageBucket: "tina-project-a9ad6.appspot.com",
    messagingSenderId: "431985002265",
    appId: "1:431985002265:web:256faf035b4d6ae8b16788",
    measurementId: "G-Q0E2KQMXPK"
};
firebase.initializeApp(config);

var database = firebase.database();


var lastIndex = 0;

// Get Data
firebase.database().ref('users/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if((value) && (value.paid == true)){
                htmls.push('<tr>\
                    <td>'+ value.firstname +'</td>\
                    <td>'+ value.lastname +'</td>\
                    <td>'+ value.email +'</td>\
                    <td>'+ value.zipcode +'</td>\
                    <td>'+ value.paid_date +'</td>\
                </tr>');
            }       
            lastIndex = index;
        });
    }
    $('#tbody').html(htmls);
});
</script>
@endsection