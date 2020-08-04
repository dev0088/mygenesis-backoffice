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
                        <h2>Manage Advertisers</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a data-target="#add-modal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New Advertisers</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="color: #566787;">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>PostCode</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Tel Number</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Description</th>
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
                    <h4 class="modal-title">Add Advertisers</h4>
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
                        <label for="company" class="col-md-12 col-form-label">Company</label>
                        <input id="company" type="text" class="form-control" name="company" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="addr" class="col-md-12 col-form-label">Address</label>
                        <input id="addr" type="text" class="form-control" name="addr" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="postcode" class="col-md-12 col-form-label">PostCode</label>
                        <input id="postcode" type="text" class="form-control" name="postcode" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-md-12 col-form-label">City</label>
                        <input id="city" type="text" class="form-control" name="city" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-md-12 col-form-label">County</label>
                        <input id="country" type="text" class="form-control" name="country" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="tel_num" class="col-md-12 col-form-label">Tel Number</label>
                        <input id="tel_num" type="text" class="form-control" name="tel_num" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email_addr" class="col-md-12 col-form-label">Email</label>
                        <input id="email_addr" type="text" class="form-control" name="email_addr" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="website" class="col-md-12 col-form-label">Website</label>
                        <input id="website" type="text" class="form-control" name="website" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-12 col-form-label">Description</label>
                        <input id="description" type="text" class="form-control" name="description" value="" required autofocus>
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
                    <h4 class="modal-title">Delete Advertiser</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Advertiser?</p>
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
                    <h4 class="modal-title">Edit Advertiser</h4>                    
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info updateUserRecord">Update</button>
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

// Get Data
firebase.database().ref('advertisers/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                htmls.push('<tr>\
                    <td>'+ value.first_name +'</td>\
                    <td>'+ value.last_name +'</td>\
                    <td>'+ value.company +'</td>\
                    <td>'+ value.address +'</td>\
                    <td>'+ value.postcode +'</td>\
                    <td>'+ value.city +'</td>\
                    <td>'+ value.country +'</td>\
                    <td>'+ value.telnumber +'</td>\
                    <td>'+ value.email +'</td>\
                    <td>'+ value.website +'</td>\
                    <td>'+ value.description +'</td>\
                    <td><a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>\
                    <a data-toggle="modal" data-target="#remove-modal" class="delete removeData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>\
                </tr>');
            }
        });
    }
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});


// Add Data
$('#submitUser').on('click', function(){
    var values = $("#addUser").serializeArray();
    var advertiser_id = firebase.database().ref('advertisers').push().key;
    firebase.database().ref('advertisers/'+advertiser_id).set({
        first_name: values[0].value,
        last_name: values[1].value,
        company: values[2].value,
        address: values[3].value,
        postcode: values[4].value,
        city: values[5].value,
        country: values[6].value,
        telnumber: values[7].value,
        email: values[8].value,
        website: values[9].value,
        description: values[10].value,
    }, function(error) {
        if(error)
            alert(error);
    });
    $("#addUser input").val("");
    $("#add-modal").modal('hide');
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('advertisers/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="first_name">First Name</label>\
                <input id="first_name" type="text" class="form-control" name="first_name" value="'+values.first_name+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="last_name">Last Name</label>\
                <input id="last_name" type="text" class="form-control" name="last_name" value="'+values.last_name+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="company">Company</label>\
                <input id="company" type="text" class="form-control" name="company" value="'+values.company+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="addr">Address</label>\
                <input id="addr" type="text" class="form-control" name="addr" value="'+values.address+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="postcode">Postcode</label>\
                <input id="postcode" type="text" class="form-control" name="postcode" value="'+values.postcode+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="city">City</label>\
                <input id="city" type="text" class="form-control" name="city" value="'+values.city+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="country">County</label>\
                <input id="country" type="text" class="form-control" name="country" value="'+values.country+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="tel_num">Tel Number</label>\
                <input id="tel_num" type="text" class="form-control" name="tel_num" value="'+values.telnumber+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="email_addr">Email</label>\
                <input id="email_addr" type="text" class="form-control" name="email_addr" value="'+values.email+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="website">Website</label>\
                <input id="website" type="text" class="form-control" name="website" value="'+values.website+'"autofocus>\
            </div>\
            <div class="form-group">\
                <label for="description">Description</label>\
                <input id="description" type="text" class="form-control" name="description" value="'+values.description+'"autofocus>\
            </div>';
            $('#updateBody').html(updateData);
    });
});

$('.updateUserRecord').on('click', function() {
    var values = $(".users-update-record-model").serializeArray();
    firebase.database().ref('advertisers/'+updateID).set({
        first_name: values[0].value,
        last_name: values[1].value,
        company: values[2].value,
        address: values[3].value,
        postcode: values[4].value,
        city: values[5].value,
        country: values[6].value,
        telnumber: values[7].value,
        email: values[8].value,
        website: values[9].value,
        description: values[10].value,
    }, function(error) {
    if(error)
        alert(error);
    });
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
    firebase.database().ref('advertisers/' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
});
</script>
@endsection