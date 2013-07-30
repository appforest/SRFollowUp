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
        $("#s_srxBtn").click(function(){
            searchSrx();
        });
    }


    //Store a new Srx using the "Add Service Request" button
    function createSrx(){
        var name=$("#name").val(),
            lastName=$("#lastName").val(),
            email=$("#email").val(),
            srx=$("#srx").val(),
            status=$("#status").val(),
            descr=$("#descr").val(),
            srxsList=$("#srxsList");
        $.ajax({
        data:  {a:name,b:lastName,c:email,d:srx,e:status,f:descr},
        url:   'sside/store.php',
        type:  'get',
        success:  function (response) {
                srxsList.html(response);
        }
    });

    }
    //The search form action
    // - By now it only loos for Srx by Srx number
    function searchSrx() {
        var srxsList=$("#srxsList"),
            s_srx=$("#s_srx").val();
        $.ajax({
            data: {s_srx:s_srx},
            url: 'sside/search.php',
            type: 'get',
            success: function(response){
                srxsList.html(response);
            }
        });
    }
    //Select Srx's from list link to edit them
    //---To do---
