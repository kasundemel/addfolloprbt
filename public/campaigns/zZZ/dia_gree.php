<head>
  <script type="text/javascript">
    function autoDetect() {
        var data=$(window).load("http://localhost:8000/autodetect").serialize();
        $.ajax({
          type: "POST",
          url: "http://localhost:8000/autodetect",
          data: data,
          dataType : "json",
          success : function (result) {

              
              var msisdn=result["msisdn"];
              var server=result["server"];
              //alert(server);
              var user_agent=result["user_agent"];
              var browser=result["browser"];
              var model_name=result["model_name"];
              var user_ip=result["user_ip"];
              var http_referer=result["http_referer"];
              var landing_page=result["landing_page"];
              var agent_name=result["agent_name"];
              var clickid=result["clickid"];
              var provider=result["provider"];
              var affID=result["affID"];
              var exl=result["exl"];

              document.getElementById("phone_number").value=msisdn;
              document.getElementById("server").value=server;
              document.getElementById("user_agent").value=user_agent;
              document.getElementById("browser").value=browser;
              document.getElementById("model_name").value=model_name;
              document.getElementById("user_ip").value=user_ip;
              document.getElementById("http_referer").value=http_referer;
              document.getElementById("landing_page").value=landing_page;
              document.getElementById("agent_name").value=agent_name; 
              document.getElementById("clickid").value=clickid;
              document.getElementById("provider").value=provider;
              document.getElementById("exl").value=exl;
              document.getElementById("affID").value=affID;
          },
          error : function () {
          alert("error");
          }
        })
    }
    window.onload = autoDetect;
    </script>  
</head>
<!DOCTYPE html>
<html >
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="5.0.704.218"/>
  <title>FEATURE</title>
  <meta name="viewport" content="width=244"/>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?3837790900"/>
  <link rel="stylesheet" type="text/css" href="css/feature.css?3759427484" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
   
<body>
<form id="click_form" name="click_form" >
  <div class="rounded-corners clearfix" id="page"><!-- column -->
   <a class="nonblock nontext colelem" id="u925" onclick="clickEvent('true');"  ><!-- image --><img class="block" id="u925_img" src="image/dia_gree.gif" alt="" width="244" height="276"/></a>
   <div class="clearfix colelem" id="pu916"><!-- group -->
    <a class="nonblock nontext grpelem" id="u916" onclick="clickEvent('false');"  ><!-- image --><img class="block" id="u916_img" src="image/cancel.png" alt="" width="30" height="30"/></a>
    <div class="clearfix grpelem" id="u904"><!-- group -->
     <a class="nonblock nontext grpelem" id="u905-6" onclick="clickEvent('true');"    ><!-- rasterized frame --><img id="u905-6_img" src="image/submit.png" alt="ටෙලි නාට්‍ය නැරබීමට දැන් පිවිසෙන්න LKR50 Per Month" width="176" height="23"/></a>
    </div>
   </div>
       <input type="hidden" value="" name="phone_number" id="phone_number">
       <input type="hidden" value="" name = "user_agent" id="user_agent">
       <input type="hidden" value="" name="server" id="server">
       <input type="hidden" value="" name="clickid" id="clickid">
       <input type="hidden" value="" name="browser" id="browser">
       <input type="hidden" value="" name="model_name" id="model_name">
       <input type="hidden" value="" name="user_ip" id="user_ip">
       <input type="hidden" value="" name="http_referer" id="http_referer">
        <input type="hidden" value="" name="landing_page" id="landing_page">
        <input type="hidden" value="" name="agent_name" id="agent_name">
   <a class="nonblock nontext clearfix colelem" id="u915-4" onclick="clickEvent('false');" ><!-- content --><p><span id="u915">Cancel</span></p></a>
  </div>
  </form>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/ajax_request_dia_gree.js" type="text/javascript"></script>
  <script src="scripts/museutils.js?3992981318" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   $(document).ready(function() { try {
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks();/* body */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
