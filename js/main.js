// foundation
$(document).foundation();
// /foundation
//List all the service requests (Srx) when the document is ready
$(document).on("ready",listsrxs);
    function listsrxs(){
        var srxsList=$("#srxsList");
        srxsList.load("sside/listAll.php");
        $("#s_srx").keypress(function(event) {
            if ( event.which == 13 ) {
                event.preventDefault();
                searchSrx();
            }

        });
    }


    //Store a new Srx using the "Add Service Request" button
    function addSrx(){
        var name=$("#name").val(),
            lastName=$("#lastName").val(),
            email=$("#email").val(),
            srx=$("#srx").val(),
            status=$("#status").val(),
            descr=$("#descr").val(),
            srxsList=$("#srxsList");
        $.ajax({
            data:  {a:name,b:lastName,c:email,d:srx,e:status,f:descr},
            url:   'sside/add.php',
            type:  'get',
            success:  function (response) {
                srxsList.html(response);
                clearAddform(); //We call the function that clears the Add SRX form if there is a successful response
            }
        });
    }
    //The Add SRX form is cleared
    function clearAddform(){
        $('#form_addSrx')[0].reset();
    }
    //The search form actions
    // - It only loos for Srx by Srx number by now
    function searchSrx() {
        var srxsList=$("#srxsList"),
            s_srx=$("#s_srx").val(),
            searchMsg=$("#searchMsg");
            if ( $.trim( $('#s_srx').val() ) == '' ){
                alert('Please enter a valid value');
                return false
            }
        $.ajax({
            data: {s_srx:s_srx},
            url: 'sside/search.php',
            type: 'get',
            success: function(response){
                srxsList.html(response);
                if(response){
                    searchMsg.fadeOut();
                }else{
                    searchMsg.fadeIn();
                    searchMsg.html('<div data-alert class="alert-box">Couldnt find any matching records, try again<a href="#" class="close" id="closeAlert" onClick="focusSearch();">&times;</a></div><br>');
                    $("#s_srx").focus();
                }
            }
        });
    }
    function focusSearch(){
        $("#s_srx").select();
    };
    //Delete Srx
    function deleteSrx(srxId){ //srxId is set by the <a> element of the php files as $row['id']
        var srxsList=$("#srxsList"),
            d_id=srxId;
            var sure = confirm("Are you sure?");
            if (sure===false){  //If you click 'cancel' on the confirm...
                return false;   //Nothing will happen
            }                   //Else, the record is deleted:
        $.ajax({
            data: {d_id:d_id},
            url: 'sside/delete.php',
            type: 'get',
            success: function(response){
                srxsList.html(response);
            }
        });
    }
    //Edit Srx
    function editSrx(srxId){ //srxId is set by the <a> element of the php files as $row['id']
        var div_editSrx=$("#div_editSrx"),
            editSrx=srxId;
        $.ajax({
            data: {editSrx:editSrx},
            url: 'sside/edit.php',
            type: 'get',
            success: function(response){
                div_editSrx.html(response);
            }
        });
    }
    function updateSrx(){ //srxId is set by the <a> element of the php files as $row['id']
        var srxsList=$("#srxsList"),
            recordId=$("#recordId").val(),
            name=$("#u_name").val(),
            lastName=$("#u_lastName").val(),
            email=$("#u_email").val(),
            srx=$("#u_srx").val(),
            status=$("#u_status").val(),
            descr=$("#u_descr").val(),
            recordId=$("#recordId").val();
            if (recordId===""){
                return false;
            }
        $.ajax({
            data: {a:name,b:lastName,c:email,d:srx,e:status,f:descr,recordId:recordId},
            url: 'sside/update.php',
            type: 'get',
            success: function(response){
                srxsList.html(response);
            }
        });
        $('#modalEdit').foundation('reveal', 'close');
    }