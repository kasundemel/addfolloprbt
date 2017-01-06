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
<html class="nojs html css_verticalspacer" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2015.2.1.352"/>
  <meta name="viewport" content="width=380"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "index.css"], "outOfDate":[]};
</script>
  
  <title>1</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=3771790150"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?crc=413825420" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/iefonts_index.css?crc=75920418"/>
  <![endif]-->
  <!-- Other scripts -->
  <script type="text/javascript">
   var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script type="text/javascript">
   document.write('\x3Cscript src="' + (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//webfonts.creativecloud.com/open-sans:n4,n3:default.js" type="text/javascript">\x3C/script>');
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="clearfix colelem" id="pu746"><!-- group -->
    <div class="clip_frame grpelem" id="u746"><!-- image -->
     <img class="block" id="u746_img" src="image/kabali.png?crc=256007460" alt="" width="348" height="480"/>
    </div>
    <div style=" margin-top: 133px;">
    <div class="grpelem" id="u804"><!-- simple frame --></div>
    <div class="clearfix grpelem" id="u795"><!-- column -->
     <div class="clearfix colelem" id="u753-4"><!-- content -->
      <p>Kabali Da</p>
     </div>
     <div class="clearfix colelem" id="u704-4"><!-- content -->
      <p>Kabali</p>
     </div>
     <div class="clearfix colelem" id="u744-4"><!-- content -->
      <p>LKR30 per month</p>
     </div>
    </div>
    <form id="click_form" name="click_form" >
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
       <input type="hidden" value="" name="exl" id="exl">
       <input type="hidden" value="" name="provider" id="provider">
       <input type="hidden" value="" name="affID" id="affID">
    <div class="clearfix grpelem" id="u826"><!-- column -->
     <div class="position_content" id="u826_position_content">
      <div class="clearfix colelem" id="u818"><!-- group -->
       <a class="nonblock nontext clearfix grpelem" id="u819-4" onclick="clickEvent('true');" href="http://www.agora.lk/rbtprovisioning/?toneID=5621341&amp;title=Kabali Da&click_id=<?php echo $clickid; ?>" ><!-- content --><p id="u819-2">download</p></a>
      </div>
      <a class="nonblock nontext clip_frame colelem" id="u820" onclick="clickEvent('true');" href="http://www.agora.lk/rbtprovisioning/?toneID=5621341&amp;title=Kabali Da&click_id=<?php echo $clickid; ?>"><!-- image --><img class="block" id="u820_img" src="image/download.png?crc=73124302" alt="" width="36" height="36"/></a>
     </div>
    </div>
    <div class="clearfix grpelem" id="u827"><!-- column -->
     <div class="clearfix colelem" id="u805"><!-- group -->
      <a class="nonblock nontext clearfix grpelem" id="u803-4" href="http://ringintones.dialog.lk:8080/colorring/al/601/562/0/0000/0001/341.wav"><!-- content --><p id="u803-2">preview</p></a>
     </div>
     <a class="nonblock nontext clip_frame colelem" id="u806" href="http://ringintones.dialog.lk:8080/colorring/al/601/562/0/0000/0001/341.wav"><!-- image --><img class="block" id="u806_img" src="image/preview.png?crc=3762581190" alt="" width="36" height="36"/></a>
    </div>
   </div>
   <div class="clearfix colelem" id="u2701-6"><!-- content -->
    <p>Click download button to download your favorite song as your RingIN tone.</p>
    <p>Click preview to listen to the RingIN tone</p>
   </div>
   <div class="clearfix colelem" id="u2744"><!-- group -->
    <div class="clearfix grpelem" id="u1113"><!-- group -->
     <div class="clearfix grpelem" id="u884"><!-- group -->
   </form>
   <div class="verticalspacer" data-offset-top="855" data-content-above-spacer="855" data-content-below-spacer="71"></div>
   <div class="clearfix colelem" id="u883-6"><!-- content -->
    <p>Copyright © 2016 www.agora.lk</p>
    <p>All Rights Reserved.</p>
   </div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),i=0;i<f.length;i++)if("text/css"==f[i].type){var h=(f[i].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!h||!h[1]||!h[2])break;b[h[1]]=h[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(i=0;i<Muse.assets.required.length;){var h=Muse.assets.required[i],l=h.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(i,1),"undefined"!=typeof b[h]&&(k!=b[h]>>>24||l!=(b[h]&16777215))&&Muse.assets.outOfDate.push(h)):i++;f.className="version";break;case "js":k.match(/^jquery-[\d\.]+/gi)&&d&&d().jquery=="1.8.3"?Muse.assets.required.splice(i,1):i++;break;default:throw Error("Unsupported file type: "+
l);}}f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
  </script>
  <script src="scripts/ajax_request_prbt6.js" type="text/javascript"></script>`
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=4108833657" type="text/javascript" async data-main="scripts/museconfig.js?crc=169177150" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
