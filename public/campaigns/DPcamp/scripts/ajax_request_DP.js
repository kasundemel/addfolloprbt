function clickEvent(subscribe) {
    var data = $("form").serialize();
    data = data + "&subscribe=" + subscribe;
    $.ajax({
        type: "POST",
        url: "http://localhost:8000/createclicklogs",
        data: data
    }).done(function(data) {
      
        var val = JSON.parse(data);
            window.location = "http://follo.lk/d2c.aspx?key=DP&clickID="+val.click_id;
    });

}