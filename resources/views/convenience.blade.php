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
                        <h2>Manage Convenience Store</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a data-target="#add-modal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New Store</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="color: #566787;">
                    <tr>
                        <th>Store Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Address</th>
                        <th>Logo</th>
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
            <form id="addStore" class="" method="POST" action="">
                <div class="modal-header">                      
                    <h4 class="modal-title">Add Stores</h4>
                    <button type="button" class="close add-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-md-12 col-form-label">Store Name</label>
                        <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-md-12 col-form-label">Phone Number</label>
                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email_addr" class="col-md-12 col-form-label">Email</label>
                        <input id="email_addr" type="text" class="form-control" name="email_addr" value="" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="addr" class="col-md-12 col-form-label">Address</label>
                        <input id="addr" type="text" class="form-control" name="addr" value="" required autofocus>
                        <i class="material-icons room-icon" onClick="add_address();">room</i> * Please click me to get geolocation.
                    </div>
                    <div class="form-group">
                        <label for="latitude" class="col-md-12 col-form-label">Latitude</label>
                        <input id="latitude" type="text" class="form-control" name="latitude" value="" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="longitude" class="col-md-12 col-form-label">Longitude</label>
                        <input id="longitude" type="text" class="form-control" name="longitude" value="" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="img" class="col-md-12 col-form-label">Image(e.g: http://anr.gwl.mybluehost.me/depanneur_fibrotech.png)</label>
                        <input id="img" type="text" class="form-control" name="img" value="" required autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default add-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success desabled" id="submitStore">Add</button>
                </div>
            </form>            
        </div>
    </div>
</div>
<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Store</h4>
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
<form action="" method="POST" class="stores-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Store</h4>                    
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBx0QJx7WaFNYgjG84uBAr9HAl9Js3vD0&libraries=places&sensor=true"></script>
<script type="text/javascript">
$(window).on('load',function(){
  $('.loading_screen').css('display','none');
});
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

$(document).ready(function () {
   google.maps.event.addDomListener(window, 'load', initialize);
});
function initialize() {
    var input = document.getElementById('addr');
    var autocomplete = new google.maps.places.Autocomplete(input);
}
function add_address() {
    var store_address = document.getElementById("addr").value;
    codeAddress('add', store_address);
}
function update_address() {
    var store_address = document.getElementById("update_addr").value;
    codeAddress('update', store_address);
}
function codeAddress(type, address) {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if(type == 'add') {
            $('#latitude').val(results[0].geometry.location.lat());
            $('#longitude').val(results[0].geometry.location.lng());
        } else if(type == 'update') {
            $('#update_latitude').val(results[0].geometry.location.lat());
            $('#update_longitude').val(results[0].geometry.location.lng());
        }
        alert("Geocode was successful.");
      } 
      else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
}
// Get Data
firebase.database().ref('stores/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    if (value != null){
        $.each(value, function(index, value){
            if(value) {
                htmls.push('<tr>\
                    <td>'+ value.title +'</td>\
                    <td>'+ value.phone +'</td>\
                    <td>'+ value.email +'</td>\
                    <td>'+ value.latitude +'</td>\
                    <td>'+ value.longitude +'</td>\
                    <td>'+ value.address +'</td>\
                    <td><img style="width:50px;" src="'+value.image+'"/></td>\
                    <td><a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>\
                    <a data-toggle="modal" data-target="#remove-modal" class="delete removeData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>\
                </tr>');
            }
        });
    }
    $('#tbody').html(htmls);
    $("#submitStore").removeClass('desabled');
});


// Add Data
$('#submitStore').on('click', function(){
    var values = $("#addStore").serializeArray();
    var store_name = values[0].value;
    var phone_number = values[1].value;
    var email_addr = values[2].value;
    var addr = values[3].value;
    var latitude = values[4].value;
    var longitude = values[5].value;    
    var img = values[6].value;
    var store_id = firebase.database().ref('stores/').push().key;
    firebase.database().ref('stores/' + store_id + '/').set({
        title: store_name,
        phone: phone_number,
        email: email_addr,
        latitude: latitude,
        longitude: longitude,
        address: addr,
        image: img,
    });
    // Reassign lastID value
    // lastIndex = userID;
    $("#addStore input").val("");
    $("#add-modal").modal('hide');
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('stores/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="store_name" class="col-md-12 col-form-label">Store Name</label>\
                <input id="store_name" type="text" class="form-control" name="store_name" value="'+values.title+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="phone_number" class="col-md-12 col-form-label">Phone Number</label>\
                <input id="phone_number" type="text" class="form-control" name="phone_number" value="'+values.phone+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="email_addr" class="col-md-12 col-form-label">Email</label>\
                <input id="email_addr" type="text" class="form-control" name="email_addr" value="'+values.email+'" required autofocus>\
            </div>\
            <div class="form-group">\
                <label for="update_addr" class="col-md-12 col-form-label">Address</label>\
                <input id="update_addr" type="text" class="form-control" name="update_addr" value="'+values.address+'" required autofocus>\
                <i class="material-icons room-icon" onClick="update_address();">room</i> * Please click me to get geolocation.\
            </div>\
            <div class="form-group">\
                <label for="update_latitude" class="col-md-12 col-form-label">Latitude</label>\
                <input id="update_latitude" type="text" class="form-control" name="update_latitude" value="'+values.latitude+'" required readonly>\
            </div>\
            <div class="form-group">\
                <label for="update_longitude" class="col-md-12 col-form-label">Longitude</label>\
                <input id="update_longitude" type="text" class="form-control" name="update_longitude" value="'+values.longitude+'" required readonly>\
            </div>\
            <div class="form-group">\
                <label for="img" class="col-md-12 col-form-label">Image(e.g: http://anr.gwl.mybluehost.me/depanneur_fibrotech.png)</label>\
                <input id="img" type="text" class="form-control" name="img" value="'+values.image+'" required autofocus>\
            </div>';

            $('#updateBody').html(updateData);
    });
});

$('.updateUserRecord').on('click', function() {
    var values = $(".stores-update-record-model").serializeArray();
    var postData = {
        title : values[0].value,
        phone : values[1].value,
        email : values[2].value,
        address : values[3].value,
        latitude : values[4].value,
        longitude : values[5].value,        
        image : values[6].value,
    };

    var updates = {};
    updates['/stores/' + updateID] = postData;

    firebase.database().ref().update(updates);

    $("#update-modal").modal('hide');
});


// Remove Data
$("body").on('click', '.removeData', function() {
    var id = $(this).attr('data-id');
    $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});

$('.deleteMatchRecord').on('click', function(){
    var values = $(".remove-record-model").serializeArray();
    var id = values[0].value;
    firebase.database().ref('stores/' + id).remove();
    $('body').find('.remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
});

</script>
@endsection