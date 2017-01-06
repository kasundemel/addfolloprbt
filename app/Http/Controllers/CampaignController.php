<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use File;
use CreateClickLogsController;
use DateTime;

use App\Http\Requests;
use DB;
use App\Campaign;
use App\Template;
use Response;
use Carbon\Carbon;
use Session;

//browser detect
use BrowserDetect;
use server;
use Msisdn;

class CampaignController extends Controller
{

    //autodetect functions.................................................

    public function auto_detect_data(){

       // $value = Request::server('PATH_INFO');
        //var_dump($_SERVER);

        $model_name=BrowserDetect::deviceFamily();//samsung,blackbery.apple
        $browser=BrowserDetect::browserName();//firefox,chrome
        // echo $model_name;
        // echo $browser;
        //  exit();

        //call the detectOp function and get msisdn value
        $msisdn=$this->detectOp();
        //$msisdn="1111111111";


        $user_agent =$_SERVER['HTTP_USER_AGENT'];
        //echo $user_agent;
        $user_ip =$_SERVER['REMOTE_ADDR'];
       // echo $user_ip;
        $server =$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];
       // echo $server;

        if (isset($_SERVER['HTTP_REFERER'])) {
            $http_referer =$_SERVER['HTTP_REFERER'];
        }
        else{
            $http_referer="";
        }

        $server_array = explode("/", $server);
        //print_r($server_array);
        
        //for localhost
        $landing_page = $server_array[1];
        // echo $landing_page;
        // exit();
        
        //$landing_page = $server_array[3];



        $landing_page = explode(".", $landing_page);
        $landing_page = $landing_page[0];

        
        if (isset($_GET['adAgent'])) {
            $agent_name = $_GET['adAgent'];
        }
        else{
            $agent_name="";
        }
        if (isset($_GET['clickid'])) {
            $clickid = $_GET['clickid'];
        }
        else{
            $clickid="";
        }

        if (isset($_GET['exl'])) {
            $exl = $_GET['exl'];
        }
        else{
            $exl="";
        }

        if (isset($_GET['affID'])) {
            $affID = $_GET['affID'];
        }
        else{
            $affID="";
        }

        //only for prbt and follo
        if (isset($_GET['pvd'])) {
             $provider = $_GET['pvd'];
        }
        else{
            $provider="";
        }

        $source = "View";
        $subscribe = "";
        $date=date("Y-m-d H:i:s");
        $status =DB::table('click_logs')->insert([
            'user_ip' => $user_ip,
            'HTTP_referer'=>$http_referer,
            'landing_page'=>$landing_page,
            'agent_name'=>$agent_name,
            'phone_number'=>$msisdn,
            'server'=>$server,
            'user_agent'=>$user_agent,
            'browser'=>$browser,
            'model_name'=>$model_name,
            'source'=>$source,
            'subscribe'=>$subscribe,
            'created_date'=>$date,
            'affID'=>$affID
        ]);



        //import to template
        $totemplate = array(
        'msisdn' => $msisdn,
        'user_agent' => $user_agent,
        'server'=>$server,
        'browser'=>$browser,
        'clickid'=>$clickid,
        'model_name'=>$model_name,
        'user_ip'=>$user_ip,
        'http_referer'=>$http_referer,
        'landing_page'=>$landing_page,
        'agent_name'=>$agent_name,
        'exl'=>$exl,
        'provider'=>$provider,
        'affID'=>$affID
         );
        echo json_encode($totemplate);

    }
    public function detectOp(){

        if (isset($_SERVER['HTTP_MSISDN'])) {
            $msisdn = $_SERVER['HTTP_MSISDN'];
            return substr($msisdn, 2, 9);
        } else if (isset($_SERVER['HTTP_X_MSISDN'])) {
            $msisdn = $_SERVER['HTTP_X_MSISDN'];
            return substr($msisdn, 2, 9);

        } else if (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID'])) {
            $msisdn = $_SERVER['HTTP_X_UP_CALLING_LINE_ID'];
            return substr($msisdn, 2, 9);
        } else if (isset($_SERVER['HTTP_x-Sub-msisdn'])) {
            $msisdn = $_SERVER['HTTP_x-Sub-msisdn'];
            return substr($msisdn, 2, 9);
        } else if (isset($_SERVER['x-Sub-msisdn'])) {
            $msisdn = $_SERVER['x-Sub-msisdn'];
            return substr($msisdn, 2, 9);
        } else if (isset($_SERVER['x_Sub-msisdn'])) {
            $msisdn = $_SERVER['x_Sub-msisdn'];
            return substr($msisdn, 2, 9);
        } else if (isset($_SERVER['HTTP_X_SUB_MSISDN'])) {
            $msisdn = $_SERVER['HTTP_X_SUB_MSISDN'];
            return substr($msisdn, 2, 9);
        } else {
            return 0;
        }
    }
    //.......................................................................




    public function addcampaign(Request $request){

        // $dt = new DateTime("now", new \DateTimeZone("Asia/Jayapura"));

        $server =$_SERVER['HTTP_HOST'];
        $server_array = explode(":", $server);
        $hostname = $server_array[0];


    	$campaign=new Campaign();

    	$campaign->campaign_name=$request['campaign_name'];
    	$campaign->campaign_template=$request['campaign_template'];
    	$campaign->fail_url=$request['fail_url'];
    	$campaign->success_url=$request['success_url'];
    	$campaign->parameter=$request['parameter'];
    	$campaign->mobile_or_url=$request['group1'];
    	$campaign->urls=$request['urls'];
        $campaign->campaign_category=$request['camp_category'];
    	$campaign->created_at=date("Y-m-d H:i:s");
    	$campaign->updated_at=gmdate("Y-m-d H:i:s");
        $campaign->campaign_url=$hostname."/".$request['campaign_name']."/".$request['campaign_template'].".php";


        //create campaign directory
        $dirname=$request['campaign_name'];
        $path = public_path().'/campaigns/'.$dirname;
        File::makeDirectory($path, $mode = 0777, true, true);


        //copy template to campaign directory 
        $file=public_path().'/uploads/'.$request['campaign_template'];
        $path=public_path().'/campaigns/'.$request['campaign_name'].'/'.$request['campaign_template'].'.php';
        if ( ! File::copy($file, $path)){
            echo "error";
        }

        $content='<head>
  <script type="text/javascript">
    function autoDetect() {
        var data=$(window).load("http://97.74.195.115:8001/autodetect").serialize();
        $.ajax({
          type: "POST",
          url: "http://97.74.195.115:8001/autodetect",
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
</head>';

        $path=public_path().'/campaigns/'.$request['campaign_name'].'/'.$request['campaign_template'].'.php';
        if(! File::prepend($path, $content)){
            echo "Couldn't write to the file.";
        }

        //create scricpt directory in campaign directory
        $dirname="scripts";
        $path = public_path().'/campaigns/'.$request['campaign_name'].'/'.$dirname;
        File::makeDirectory($path, $mode = 0777, true, true);

        //copy  scripts to campaign directory
        $file4=public_path().'/uploads/js';
        $path4=public_path().'/campaigns/'.$request['campaign_name'].'/scripts';
        if ( ! File::copyDirectory($file4, $path4)){
            echo "error";
        }


        //create css directory in campaign directory
        $dirname="css";
        $path = public_path().'/campaigns/'.$request['campaign_name'].'/'.$dirname;
        File::makeDirectory($path, $mode = 0777, true, true);


        //copy  css to campaign directory
        $file4=public_path().'/uploads/css';
        $path4=public_path().'/campaigns/'.$request['campaign_name'].'/css';
        if ( ! File::copyDirectory($file4, $path4)){
            echo "error";
        }

         //create image directory in campaign directory
         $dirname="image";
         $path = public_path().'/campaigns/'.$request['campaign_name'].'/'.$dirname;
         File::makeDirectory($path, $mode = 0777, true, true);

         //copy image file in campaign directory
         $file4=public_path().'/uploads/image';
         $path4=public_path().'/campaigns/'.$request['campaign_name'].'/image';
         if ( ! File::copyDirectory($file4, $path4)){
            echo "error";
         }


        //create a js file in campaign directory
        $jsfile_name=$request['campaign_template'];
        $path = public_path().'/campaigns/'.$request['campaign_name'].'/scripts/ajax_request_'.$jsfile_name.'.js';


        //copy image file in campaign directory
        $file4=public_path().'/uploads/image';
        $path4=public_path().'/campaigns/'.$request['campaign_name'].'/image';
        if ( ! File::copyDirectory($file4, $path4)){
            echo "error";
        }

        //copy mobile_selector directory to campaign directory
        $file4=public_path().'/uploads/mobile_selector';
        $path4=public_path().'/campaigns/'.$request['campaign_name'].'/mobile_selector';
        if ( ! File::copyDirectory($file4, $path4)){
            echo "error";
        }

        //js file for campaign
        if($request['camp_category']=="AddPlatForm"){

            //copy sms_send.php file to campaign directory 
            $file1=public_path().'/uploads/sms_send.php';
            $path1=public_path().'/campaigns/'.$request['campaign_name'].'/sms_send.php';
            if ( ! File::copy($file1, $path1)){
                echo "error";
            }

            $content1='function clickEvent(subscribe) {
    var data = $("form").serialize();
    data = data + "&subscribe=" + subscribe;
    $.ajax({
        type: "POST",
        url: "http://97.74.195.115:8001/createclicklogs",
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
            window.location = "'.$request['success_url'].'"+ val.clickId;
        }else if(val.number == "false"){
            //If user click on not subscribe then redirect to this URL
            window.location = "'.$request['fail_url'].'";
        }else{
            //User clicks on subscribe and doesnt show his phone number but found provider by checking IP
            //then user will redirect to this URL
            window.location = "sms_send.php?provider="+val.provider+"&number="+val.number+"&data="+val.data+"&link="+val.link;
        }
 
        }); 
      }';

        }
        else if($request['camp_category']=="Follo"){

            $content1='function clickEvent(subscribe) {
    var data = $("form").serialize();
    data = data + "&subscribe=" + subscribe;
    $.ajax({
        type: "POST",
        url: "http://97.74.195.115:8001/createclicklogs",
        data: data
    }).done(function(data) {
      
        var val = JSON.parse(data);
            window.location = "http://follo.lk/d2c.aspx?key=DP&clickID="+val.click_id;
    });

}';

        }
        else if($request['camp_category']=="Prbt"){

                $content1='function clickEvent(subscribe) {
                    var data = $("form").serialize();
                    data = data + "&subscribe=" + subscribe;
                    $.ajax({
                        type: "POST",
                        url: "http://97.74.195.115:8001/createclicklogs",
                        data: data
                    }).done(function(data) {

                         var val = JSON.parse(data);
                    });

                }';
        }
        File::put($path, $content1);




         //create scricpt directory in campaign directory
        //
        //should change path  
        $dirname3=$request['campaign_name'];
        $path3 ='/var/www/vhosts/simatosolutions.com/agora/piyasa/addpltfrm_new/'.$dirname3;
        File::makeDirectory($path3, $mode = 0777, true, true);
        //
        $file4=public_path().'/campaigns/'.$request['campaign_name'];
        $path4='/var/www/vhosts/simatosolutions.com/agora/piyasa/addpltfrm_new/'.$request['campaign_name'];
        if ( ! File::copyDirectory($file4, $path4)){
            echo "error";
        }



        //save the campaign
    	$campaign->save();
        
        //redirect to the add campaign
    	return redirect('/')->with('success', 'You are successfully logged in');
    }

    public function view_campaign(){

    	$campaign=Campaign::all();
    	return view('addedcampaign',compact('campaign'));
    }



    public function showcampaign(Request $request,$camp_name,$tmp_name){

        //find campaign name
        $campaign = DB::table('campaigns')->where('campaign_name', '$camp_name')->first();

        //find template name
        $template = DB::table('templates')->where('tmp_name', '$tmp_name')->first();

        if($campaign=$camp_name){

            if ($template=$tmp_name) {

                $filename = '$tmp_name';
                $paths =public_path().'/campaigns/'.$camp_name.'/'.$tmp_name;
                $path='/campaigns/'.$camp_name.'/'.$tmp_name;

                return view('welcome',compact('path'));
            }
            else{
                return 'no templates';
            }
        }
        else{
            return 'nothing to show';
        }
          
    }
}
