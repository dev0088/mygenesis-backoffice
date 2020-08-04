@extends('layout.layout')
@section('style')
<style type="text/css">
.desabled {
	pointer-events: none;    
}
a i {
    font-size: 20px;
    cursor: pointer;
}
a.edit i{
  color: #FFC107;
}
a.addData i{
    color: #398439;
}
a.addinfoData i{
    color: #398439;
}
a.delete i{
    color: #F44336;
}
ul li a {
    max-width: 250px;
    display: inline-block;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    color: #333;
}
ul li a.elements{
    font-style: italic;
}
</style>
@endsection
@section('content')
<div class="" style="padding:0px 10px;">
    <div class="table-wrapper" style="margin-bottom: 0px; padding-bottom: 5px;">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage Computer Resolution</b></h2>
                </div>
                <div class="col-sm-6">
                    <a data-target="#import-modal" class="btn btn-success" data-toggle="modal"><i class="material-icons">cloud_upload</i> <span>Import</span></a>
                    <a data-target="#export-modal" class="btn btn-success" data-toggle="modal"><i class="material-icons">cloud_download</i> <span>Export</span></a>
                </div>
            </div>            
        </div>
    </div>
</div>
<div class="row" style="margin-left: 8px; color: #566787;">
    <div class="col-md-8">
        <label for="category">Choose a category:</label>
        <select name="category" id="category" onchange="change_category()">
          <option value="ordinateur">Ordinateur</option>
          <option value="periferique">Périphérique</option>
          <option value="logiciel">Logiciel</option>
          <option value="astuce">Astuce</option>
          <option value="internet">Internet / Réseaux</option>
          
        </select>
    </div>
</div>

<div id="root">

</div>
<!-- Export Modal -->
<div id="export-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" method="POST" action="">
                <div class="modal-header">                      
                    <h4 class="modal-title">Export Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>For updating questions and answers, you are going to get all data of computer resolution from real database and save the data as draft.</p>
                    <p>Are you sure you want to do this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success" id="exportQA">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Import Modal -->
<div id="import-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" method="POST" action="">
                <div class="modal-header">                      
                    <h4 class="modal-title">Import Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>For showing the following questions and answers on tina app, you are going to replace the q/a data with current data of computer resolution in real database.</p>
                    <p>Are you sure you want to do this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success" id="importQA">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div id="add-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addresolutions" class="" method="POST" action="">
                <div class="modal-header">                      
                    <h4 class="modal-title">Add</h4>
                    <button type="button" class="close add-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="col-md-12">
                        <label for="qa_type">Choose a type of Q/A:</label>
                        <select name="qa_type" id="qa_type" onchange="change_qatype()">
                          <option value="question">Question</option>
                          <option value="solution">Solution</option>
                        </select>
                    </div>
                </div>
                <div class="modal-body" id="addBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default add-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success desabled" id="addQA">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Info Modal -->
<div id="addinfo-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addinfo_form" class="" method="POST" action="">
                <div class="modal-header">                      
                    <h4 class="modal-title">Add Info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="addinfo_Body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success desabled" id="addINFO">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Update Model -->
<form action="" method="POST" class="update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>                    
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info updateRecord">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Update Info Model -->
<form action="" method="POST" class="update-info-form form-horizontal">
    <div id="updateinfo-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="updateinfoBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <!-- <input type="button" class="btn btn-default update-data-from-delete-form" data-dismiss="modal" value="Cancel"> -->
                    <button type="button" class="btn btn-info updateinfoRecord">Update</button>
                    <!-- <input type="submit" class="btn btn-info updateUserRecord" value="Update"> -->
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default remove-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <!-- <input type="button" class="btn btn-default remove-data-from-delete-form" data-dismiss="modal" value="Cancel"> -->
                    <button type="button" class="btn btn-danger deleteMatchRecord">Delete</button>
                    <!-- <input type="submit" class="btn btn-danger deleteMatchRecord" value="Delete"> -->
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script>
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
var sel_cate = document.getElementById("category").value;
var qa_type = document.getElementById('qa_type').value;

function change_category() {
    sel_cate = document.getElementById("category").value;
    get_data();
}
function change_qatype() {
    qa_type = document.getElementById('qa_type').value;
    if(qa_type == "question"){
        $("#addData_solution").css('display','none');
        $("#addData_title").css('display','block');
    } else if (qa_type == "solution") {
        $("#addData_solution").css('display','block');
        $("#addData_title").css('display','none');
    }
}
// Get Data
get_data();
function get_data(){
    $('.loading_screen').css('display','block');
    firebase.database().ref('maps_draft/'+sel_cate+'/root/').on('value', function(snapshot) {
        var value = snapshot.val();
        if(value != null) {
            draw_node('root',value.title,null,value.yid,value.nid,value.did,null);
        } else {
            if((sel_cate=="ordinateur")||(sel_cate=="logiciel")||(sel_cate=="internet")||(sel_cate=="periferique")||(sel_cate=="astuce")){
                firebase.database().ref('maps_draft/'+sel_cate+'/root/').set({
                    title: "Start Here",
                    qid: "root",
                });
            }
            // get_data();
        }
    });
}
function draw_node(index, title, solution, yid, nid, did, info){
    var sub_htmls = [];
    if(solution == null){
        if(info == null){
            if((index !== "undefined") && (index != null)){
                sub_htmls.push('<ul><li><a><button type="button" id="pre_icon">+</button>'+title+'</a><a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><div id="ynd_'+lastIndex+'"></div></li>');
                $('#'+index).html(sub_htmls.join(""));
                get_child_node(index, yid, nid, did);
            }
        }else {
            sub_htmls.push('<ul><li><a>'+info[0]+'</a><a data-toggle="modal" data-target="#updateinfo-modal" class="edit updateinfoData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></li></ul>');
            $('#info_'+index).html(sub_htmls.join(""));
        }
    } else {
        sub_htmls.push('<ul><li><a><b>A:</b>'+solution+'</a>\
            <a data-toggle="modal" data-target="#update-modal" class="edit updateData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>\
            <a data-toggle="modal" data-target="#remove-modal" class="delete removeData" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>\
            </li></ul>');
        $('#'+index).html(sub_htmls.join(""));
    }
    $('.loading_screen').css('display','none');
}
function get_child_node(index, yid, nid, did){
    var ynd_htmls = [];
    ynd_htmls.push('<ul><li><a class="elements"><button type="button" id="pre_icon">+</button>Info</a><span id="ai_'+index+'"></span><div id="info_'+index+'"></div></li>\
        <li><a class="elements"><button type="button" id="pre_icon">+</button>Yes</a><span id="ay_'+index+'"></span><div id="'+yid+'"></div></li>\
        <li><a class="elements"><button type="button" id="pre_icon">+</button>No</a><span id="an_'+index+'"></span><div id="'+nid+'"></div></li>\
        <li><a class="elements"><button type="button" id="pre_icon">+</button>I do not know</a><span id="ad_'+index+'"></span><div id="'+did+'"></div></li></ul></ul>');
    $('#ynd_'+lastIndex).html(ynd_htmls.join(""));
    lastIndex ++;
    firebase.database().ref('maps_draft/'+sel_cate+'/'+index+'/info').on('value', function(snapshot) {
        var i_value = snapshot.val();
        if((i_value != null)&&(i_value !== "undefined")){
            var info = [i_value.title, i_value.content, i_value.image];
            draw_node(index,null,null,null,null,null,info);
        } else {
            var add_htmls =[];
            add_htmls.push('<a data-target="#addinfo-modal" class="addinfoData" data-toggle="modal" data-btn="i_btn" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Add">&#xE147;</i></a>');
            $('#ai_'+index).html(add_htmls.join(""));
        }
    });
    firebase.database().ref('maps_draft/'+sel_cate+'/'+yid+'/').on('value', function(snapshot) {
        var y_value = snapshot.val();
        if(y_value != null){
            if(y_value.solution != null){
                draw_node(yid,null,y_value.solution,null,null,null,null);
            } else {
                draw_node(yid,y_value.title,null,y_value.yid,y_value.nid,y_value.did,null);
            }
        } else {
            var add_htmls =[];
            add_htmls.push('<a data-target="#add-modal" class="addData" data-toggle="modal" data-btn="y_btn" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Add">&#xE147;</i></a>');
            $('#ay_'+index).html(add_htmls.join(""));
        }
    });
    firebase.database().ref('maps_draft/'+sel_cate+'/'+nid+'/').on('value', function(snapshot) {
        var n_value = snapshot.val();
        if(n_value != null){
            if(n_value.solution != null){
                draw_node(nid,null,n_value.solution,null,null,null,null);
            } else {
                draw_node(nid,n_value.title,null,n_value.yid,n_value.nid,n_value.did,null);
            }
        } else {
            var add_htmls =[];
            add_htmls.push('<a data-target="#add-modal" class="addData" data-toggle="modal" data-btn="n_btn" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Add">&#xE147;</i></a>');
            $('#an_'+index).html(add_htmls.join(""));
        }
    });
    firebase.database().ref('maps_draft/'+sel_cate+'/'+did+'/').on('value', function(snapshot) {
        var d_value = snapshot.val();
        if(d_value != null){
            if(d_value.solution != null){
                draw_node(did,null,d_value.solution,null,null,null,null);
            } else {
                draw_node(did,d_value.title,null,d_value.yid,d_value.nid,d_value.did,null);
            }
        } else {
            var add_htmls =[];
            add_htmls.push('<a data-target="#add-modal" class="addData" data-toggle="modal" data-btn="d_btn" data-id="'+index+'"><i class="material-icons" data-toggle="tooltip" title="Add">&#xE147;</i></a>');
            $('#ad_'+index).html(add_htmls.join(""));
        }
    });
}
// Update Info Data
var updateinfoID = 0;
$('body').on('click', '.updateinfoData', function() {
    updateinfoID = $(this).attr('data-id');
    firebase.database().ref('maps_draft/'+sel_cate+'/'+updateinfoID+'/info').on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="info_title">Title</label>\
                <input id="info_title" type="text" class="form-control" name="info_title" value="'+values.title+'" required autofocus></div>\
                <div class="form-group">\
                <label for="info_content">Content</label>\
                <input id="info_content" type="text" class="form-control" name="info_content" value="'+values.content+'" required autofocus></div>\
                <div class="form-group">\
                <label for="info_img">Image (e.g: http://anr.gwl.mybluehost.me/depanneur_fibrotech.png)</label>\
                <input id="info_img" type="text" class="form-control" name="info_img" value="'+values.image+'" required autofocus></div>';
        $('#updateinfoBody').html(updateData);
    });
});
$('.updateinfoRecord').on('click', function() {
    var values = $(".update-info-form").serializeArray();
    var postData = {
            title : values[0].value,
            content : values[1].value,
            image : values[2].value,
        };
    var updates = {};
    updates['maps_draft/'+sel_cate+'/'+updateinfoID+'/info'] = postData;
    firebase.database().ref().update(updates, function(error) {
        if (error) {
          // The write failed...
          alert(error);
        } else {
          // Data saved successfully!
        }
      });
    $("#updateinfo-modal").modal('hide');
    get_data();
    $('#info_'+updateinfoID).children('ul').toggleClass('show-effect');
    $('#info_'+updateinfoID).parents().andSelf().toggleClass('show-effect');
});
// Update Data
var updateID = 0;
var update_solution = null;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('maps_draft/'+sel_cate+'/'+updateID+'/').on('value', function(snapshot) {
        var values = snapshot.val();
        update_solution = values.solution;
        if(update_solution == null){
            var updateData = '<div class="form-group">\
                    <label for="title">Title</label>\
                    <input id="title" type="text" class="form-control" name="title" value="'+values.title+'" required autofocus>\
                    <input style="display:none" id="qid" type="text" class="form-control" name="qid" value="'+values.qid+'" readonly>\
                    <input style="display:none" id="yid" type="text" class="form-control" name="yid" value="'+values.yid+'" readonly>\
                    <input style="display:none" id="nid" type="text" class="form-control" name="nid" value="'+values.nid+'" readonly>\
                    <input style="display:none" id="did" type="text" class="form-control" name="did" value="'+values.did+'" readonly>\
                </div>';
            $('#updateBody').html(updateData);
        } else {
            var updateData = '<div class="form-group">\
                    <label for="solution">Solution</label>\
                    <input id="solution" type="text" class="form-control" name="solution" value="'+values.solution+'" required autofocus>\
                </div>';
            $('#updateBody').html(updateData);
        }
    });
});
$('.updateRecord').on('click', function() {
    $('.loading_screen').css('display','block');
    var values = $(".update-record-model").serializeArray();
    if(values.length < 2){
        var postData = {
            solution : values[0].value
        };
    } else {
        var postData = {
            title : values[0].value,
            qid : values[1].value,
            yid : values[2].value,
            nid : values[3].value,
            did : values[4].value
        };
    }
    var updates = {};
    updates['maps_draft/'+sel_cate+'/'+updateID] = postData;
    firebase.database().ref().update(updates, function(error) {
        if (error) {
          // The write failed...
          $('.loading_screen').css('display','none');
          alert(error);
        } else {
          // Data saved successfully!
          $('.loading_screen').css('display','none');
        }
      });
    $("#update-modal").modal('hide');
    get_data();
    $('#'+updateID).children('ul').toggleClass('show-effect');
    $('#'+updateID).parents().andSelf().toggleClass('show-effect');
});
//Add Info
var qid = 0;
$('body').on('click', '.addinfoData', function() {
    qid = $(this).attr('data-id');
    firebase.database().ref('maps_draft/'+sel_cate+'/'+qid+'/info').on('value', function(snapshot) {
        var values_info = snapshot.val();
        var addData = '<div class="form-group">\
                        <label for="info_title" class="col-md-12 col-form-label">Title</label>\
                        <input id="info_title" type="text" class="form-control" name="info_title" value="" required autofocus>\
                    </div>\
                    <div class="form-group">\
                        <label for="info_content" class="col-md-12 col-form-label">Content</label>\
                        <input id="info_content" type="text" class="form-control" name="info_content" value="" required autofocus>\
                    </div>\
                    <div class="form-group">\
                        <label for="info_img" class="col-md-12 col-form-label">Image (e.g: http://anr.gwl.mybluehost.me/depanneur_fibrotech.png)</label>\
                        <input id="info_img" type="text" class="form-control" name="info_img" value="" required autofocus>\
                    </div>';
        $('#addinfo_Body').html(addData);
        $("#addINFO").removeClass('desabled');
    });
});
$('#addINFO').on('click', function(){
    var values = $("#addinfo_form").serializeArray();
    firebase.database().ref('maps_draft/'+sel_cate+'/'+qid+'/info').set({
        title: values[0].value,
        content: values[1].value,
        image: values[2].value
    });
    $("#addinfo_form input").val("");
    $("#addinfo-modal").modal('hide');
    get_data();
    $('#info_'+qid).children('ul').toggleClass('show-effect');
    $('#info_'+qid).parents().andSelf().toggleClass('show-effect');
});
//Add Data
var add_parentID = 0;
var btn_type;
$('body').on('click', '.addData', function() {
    document.getElementById('qa_type').value = "question";
    change_qatype();
    add_parentID = $(this).attr('data-id');
    btn_type = $(this).attr('data-btn');
    firebase.database().ref('maps_draft/'+sel_cate+'/'+add_parentID+'/').on('value', function(snapshot) {
        var values_parent = snapshot.val();
        var addData = '<div class="form-group" id="addData_title">\
                        <label for="title" class="col-md-12 col-form-label">Title</label>\
                        <input id="title" type="text" class="form-control" name="title" value="" required autofocus>\
                    </div>\
                    <input style="display:none" id="p_yid" type="text" class="form-control" name="p_yid" value="'+values_parent.yid+'" >\
                    <input style="display:none" id="p_nid" type="text" class="form-control" name="p_nid" value="'+values_parent.nid+'" >\
                    <input style="display:none" id="p_did" type="text" class="form-control" name="p_did" value="'+values_parent.did+'" >\
                    <input style="display:none" id="p_title" type="text" class="form-control" name="p_title" value="'+values_parent.title+'" >\
                    <div class="form-group" id="addData_solution">\
                        <label for="solution" class="col-md-12 col-form-label">Solution</label>\
                        <input id="solution" type="text" class="form-control" name="solution" value="" required autofocus>\
                    </div>';
        $('#addBody').html(addData);
        if (qa_type == "question") {
            $("#addData_title").css('display', 'block');
            $("#addData_solution").css('display', 'none');
        } else if (qa_type == "solution") {
            $("#addData_title").css('display', 'block');
            $("#addData_solution").css('display', 'none');
        }
        $("#addQA").removeClass('desabled');
    });
});
$('#addQA').on('click', function(){
    $('.loading_screen').css('display','block');
    var values = $("#addresolutions").serializeArray();
    //update parent
    var y_id = 0;
    var n_id = 0;
    var d_id = 0;
    if ((values[2].value === "undefined") || (values[2].value == null)){
        y_id = firebase.database().ref('maps_draft/'+sel_cate+'/').push().key;
    } else {
        y_id = values[2].value;
    }
    if ((values[3].value === "undefined") || (values[3].value == null)){
        n_id = firebase.database().ref('maps_draft/'+sel_cate+'/').push().key;
    } else {
        n_id = values[3].value;
    }
    if ((values[4].value === "undefined") || (values[4].value == null)){
        d_id = firebase.database().ref('maps_draft/'+sel_cate+'/').push().key;
    } else {
        d_id = values[4].value;
    }
    var post_parentData = {
        title : values[5].value,
        qid : add_parentID,
        yid : y_id,
        nid : n_id,
        did : d_id
    };
    
    var updates = {};
    updates['maps_draft/'+sel_cate+'/'+add_parentID] = post_parentData;
    firebase.database().ref().update(updates, function(error) {
        if (error) {
          // The write failed...
          alert(error);
        } else {
          // Data saved successfully!
        }
      });

    var addID = 0;    
    if(btn_type == "y_btn"){
        addID = y_id;
    }
    if(btn_type == "n_btn"){
        addID = n_id;
    }
    if(btn_type == "d_btn"){
        addID = d_id;
    }
    if(qa_type == "question"){
        firebase.database().ref('maps_draft/'+sel_cate+'/'+addID+'/').set({
            title: values[1].value,
            qid: addID,
        }, function(error) {
            if (error) {
              // The write failed...
              $('.loading_screen').css('display','none');
              alert(error);
            } else {
              // Data saved successfully!
              $('.loading_screen').css('display','none');
            }
          });
    } else if (qa_type == "solution") {
        firebase.database().ref('maps_draft/'+sel_cate+'/'+addID+'/').set({
            solution: values[6].value
        }, function(error) {
            if (error) {
              // The write failed...
              $('.loading_screen').css('display','none');
              alert(error);
            } else {
              // Data saved successfully!
              $('.loading_screen').css('display','none');
            }
          });
    }
    $("#addresolutions input").val("");
    $("#add-modal").modal('hide');
    get_data();
    $('#'+addID).children('ul').toggleClass('show-effect');
    $('#'+addID).parents().andSelf().toggleClass('show-effect');
});
//Export Data
$('#exportQA').on('click', function(){
    var cate = sel_cate;
    $('.loading_screen').css('display','block');
    firebase.database().ref('maps').once('value', function(snapshot) {
        var value = snapshot.val();
        firebase.database().ref('maps_draft').remove();
        firebase.database().ref('maps_draft').set(value, function(error) {
            if (error) {
              // The write failed...
              $('.loading_screen').css('display','none');
              alert(error);
            } else {
              alert("Exported successfully.");
              sel_cate = cate;
              get_data();
            }
          });
    });
    $('.loading_screen').css('display','none');
    $("#export-modal").modal('hide');
});
//Import Data
$('#importQA').on('click', function(){
    $('.loading_screen').css('display','block');
    firebase.database().ref('maps_draft').once('value', function(snapshot) {
        var value = snapshot.val();
        firebase.database().ref('maps').remove();
        firebase.database().ref('maps').set(value, function(error) {
            if (error) {
              // The write failed...
              $('.loading_screen').css('display','none');
              alert(error);
            } else {
              alert("Imported successfully.");
            }
          });
    });
    $('.loading_screen').css('display','none');
    $("#import-modal").modal('hide');
});

// Remove Data
$("body").on('click', '.removeData', function() {
    var id = $(this).attr('data-id');
    $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});

$('.deleteMatchRecord').on('click', function(){
    var values = $(".remove-record-model").serializeArray();
    var id = values[0].value;
    firebase.database().ref('maps_draft/'+sel_cate+'/' + id).remove();
    $('body').find('.remove-record-model').find( "input" ).remove();
    $("#remove-modal").modal('hide');
    get_data();
    $('#'+id).children('ul').toggleClass('show-effect');
    $('#'+id).parents().andSelf().toggleClass('show-effect');
});
$("body").on('click', '#pre_icon', function() {
    var obj = $(this);
    $(this).parent().closest('li').find('ul:first').toggleClass('show-effect');
    var class_name = $(this).parent().closest('li').find('ul:first').attr('class');
    if (class_name == 'show-effect'){
        $(this).html('-');
    } else {
        $(this).html('+');
    }
});
</script>
@endsection