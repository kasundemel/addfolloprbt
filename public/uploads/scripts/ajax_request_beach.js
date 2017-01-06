function clickEvent(subscribe) {
    var data = $("form").serialize();
    data = data + "&subscribe=" + subscribe;
    $.ajax({
        type: "POST",
        url: "http://localhost:8000/createclicklogs",
        data: data
    }).done(function(data) {
 
        var val = JSON.parse(data);
        //alert(val.number);
        if(val.number == "no"){
            //User clicks on Subscribe button and doesnt show his phone number, coudnt find provider by checking IP
            //then user will redirect to this URL
            window.location = "mobile_selector/";
        }else if(val.number == "ok"){
            //User clicks on subscribe then redirect to this URL - If user has phone number
            window.location = ""+ val.clickId;
        }else if(val.number == "false"){
            //If user click on not subscribe then redirect to this URL
            window.location = "";
        }else{
            //User clicks on subscribe and doesnt show his phone number but found provider by checking IP
            //then user will redirect to this URL
            window.location = "sms_send.php?provider="+val.provider+"&number="+val.number+"&data="+val.data+"&link="+val.link;
        }
 
        }); 
      }