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
                        <h2>Manage Users</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a data-target="#add-modal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New User</span></a>
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
                        <th style="width: 85px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                            
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div id="add-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addUser" class="" method="POST" action="">
                <div class="modal-header">                      
                    <h4 class="modal-title">Add Users</h4>
                    <button type="button" class="close add-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name" class="col-md-12 col-form-label">First Name</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-md-12 col-form-label">Last Name</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email_addr" class="col-md-12 col-form-label">Email</label>
                        <input id="email_addr" type="text" class="form-control" name="email_addr" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="pass_word" class="col-md-12 col-form-label">Password (at least 6 chars)</label>
                        <input id="pass_word" type="text" class="form-control" name="pass_word" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="zipe_code" class="col-md-12 col-form-label">Zip Code</label>
                        <input id="zipe_code" type="text" class="form-control" name="zipe_code" value="" required autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default add-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success desabled" id="submitUser">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default remove-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger deleteMatchRecord">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>                    
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <!-- <input type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal" value="Cancel"> -->
                    <button type="button" class="btn btn-info updateUserRecord">Update</button>
                    <!-- <input type="submit" class="btn btn-info updateUserRecord" value="Update"> -->
                </div>
            </div>
        </div>
    </div>
</form>
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
            if(value) {
                htmls.push('<tr>\
                    <td>'+ value.firstname +'</td>\
                    <td>'+ value.lastname +'</td>\
                    <td>'+ value.email +'</td>\
                    <td>'+ value.zipcode +'</td>\
                    <td><a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>\
                    <a data-toggle="modal" data-target="#remove-modal" class="delete removeData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>\
                </tr>');
            }       
            lastIndex = index;
        });
    }
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});


// Add Data
$('#submitUser').on('click', function(){
    var values = $("#addUser").serializeArray();
    var first_name = values[0].value;
    var last_name = values[1].value;
    var email = values[2].value;
    var password = values[3].value;
    var zip_code = values[4].value;
    if (password.length >= 6) {
        firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user){
          var userID = user.uid;
            firebase.database().ref('users/' + userID).set({
                firstname: first_name,
                lastname: last_name,
                email: email,
                zipcode: zip_code,
            });
          //Here if you want you can sign in the user
        }).catch(function(error) {
            //Handle error
            alert(error);
        });
    }
    // Reassign lastID value
    // lastIndex = userID;
    $("#addUser input").val("");
    $("#add-modal").modal('hide');
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('users/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="first_name">First Name</label>\
                <input id="first_name" type="text" class="form-control" name="first_name" value="'+values.firstname+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="last_name">Last Name</label>\
                <input id="last_name" type="text" class="form-control" name="last_name" value="'+values.lastname+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="email_addr">Email</label>\
                <input id="email_addr" type="text" class="form-control" name="email_addr" value="'+values.email+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="zip_code">Zip Code</label>\
                <input id="zip_code" type="text" class="form-control" name="zip_code" value="'+values.zipcode+'" required autofocus>\
            </div>';

            $('#updateBody').html(updateData);
    });
});

$('.updateUserRecord').on('click', function() {
    var values = $(".users-update-record-model").serializeArray();
    firebase.database().ref('users/'+updateID+'/firstname').set(values[0].value);
    firebase.database().ref('users/'+updateID+'/lastname').set(values[1].value);
    firebase.database().ref('users/'+updateID+'/email').set(values[2].value);
    firebase.database().ref('users/'+updateID+'/zipcode').set(values[3].value);

    $("#update-modal").modal('hide');
});


// Remove Data
$("body").on('click', '.removeData', function() {
    var id = $(this).attr('data-id');
    $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});

$('.deleteMatchRecord').on('click', function(){
    var values = $(".users-remove-record-model").serializeArray();
    var id = values[0].value;
    firebase.database().ref('users/' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
});
// $('.remove-data-from-delete-form').click(function() {
//     $('body').find('.users-remove-record-model').find( "input" ).remove();
// });
</script>
@endsection