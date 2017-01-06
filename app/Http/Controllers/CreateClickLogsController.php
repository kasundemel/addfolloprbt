<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;


use App\Http\Requests;

//models
use App\Autodetect;
use App\Click_log;
use App\Provider_ip_table;
use App\Provider_sms_data;
use App\Secure_bill_data;
use App\Template;


use DB;
use PDO;
use Builder;

class CreateClickLogsController extends Controller
{
	public function create_click_log(Request $request){

        //create model objects
        $clicklog=new Click_log();

        // var_dump($_SERVER);
        // exit();

        //comment for checking
        $user_ip=$request['user_ip'];
        $HTTP_referer=$request['http_referer'];
        $landing_page=$request['landing_page'];
        $agent_name=$request['agent_name'];
        $phone_number=$request['phone_number'];
        $server=$request['server'];
        $user_agent=$request['user_agent'];
        $browser=$request['browser'];
        $model_name=$request['model_name'];
        $source=$request['source'];
        $subscribe=$request['subscribe'];
        $clickid=$request['clickid'];
        $created_date=date("Y-m-d H:i:s");
        $exl = $request['exl'];
        $affID=$request['affID'];
        $payout = '0';
       

        if(isset($phone_number)){

            $source = "Click";
            $date=date("Y-m-d H:i:s");

            //comment for testing
            $this->insert_log_data($server,$landing_page,$agent_name,$user_ip,$HTTP_referer,$phone_number,$user_agent,$browser,$model_name,$source,$subscribe,$clickid,$date,$affID);

            //check the subscribe
            $sub=DB::table('click_logs')->where('subscribe','$subscribe');

            if($sub=='true'){

                //check the phone number
                $phone=DB::table('click_logs')->where('phone_number','$phone_number');

                if($phone != '0'){

                    $res = array('id' =>$clickid,'sms_number'=>'ok');
                    $subscribed=$this->get_logs_data_by_click_id($clickid);

                    if(($exl=="true") && $subscribed < 3 ){
                    
                        // send_api_request_data_by_click_id function
                        $response=$this->send_api_request_data_securebill($clickid);
                        // insert_secure_bill_data function
                        $this->insert_secure_bill_data($clickid,$response);
                    
                    }
                    echo json_encode($res);
                }
                else if($phone=='0'){

                        $result=$this->get_provider_ip_data();

                        $statement =$result->getConnection()->getPdo()->prepare($result->toSql());
                        $state=$statement->execute($result->getBindings());
                        //print_r($state);
                        //exit();

                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                            $array=$this->ip_in_range($user_ip,$row[2],$row[1]);
                    
                            if ($array[0]=='true') {
                                
                                //get_provider_sms_data function
                                $result=$this->get_provider_sms_data($array[1]);

                                $statement =$result->getConnection()->getPdo()->prepare($result->toSql());;
                                $statement->execute($result->getBindings());
                                
                                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                    $res = array('provider'=>$row[1],'number'=>$row[2],'data'=>$row[3],'link'=>$row[4]);
                                    echo json_encode($res);
                                }
                                exit();
                            }
                        }
                        $res = array('number' =>'no' );
                        echo json_encode($res);
                }

            }
            else {
                $res = array('number' => 'false');
                echo json_encode($res);
            }
        } 
	}

    //insert_log_data function
    public function insert_log_data($server,$landing_page,$agent_name,$user_ip,$HTTP_referer,$phone_number,$user_agent,$browser,$model_name,$source,$subscribe,$clickid,$date,$affID){

            $date = date("Y-m-d H:i:s");
            $status=DB::table('click_logs')->insert([
            'server' => $server,
            'landing_page'=>$landing_page,
            'agent_name'=>$agent_name,
            'user_ip'=>$user_ip,
            'HTTP_referer'=>$HTTP_referer,
            'phone_number'=>$phone_number,
            'user_agent'=>$user_agent,
            'browser'=>$browser,
            'model_name'=>$model_name,
            'source'=>$source,
            'subscribe'=>$subscribe,
            'click_id'=>$clickid,
            'created_date'=>$date,
            'affID'=>$affID
            ]);
    }

    public function get_logs_data_by_click_id($clickid){
        $result=DB::select('SELECT * FROM click_logs WHERE click_id=?',['$clickid']);
        return $result;
    }

    public function insert_secure_bill_data($clickid,$response){
        $date = date("Y-m-d H:i:s");
        DB::table('secure_bill_data')->insert([
                            'click_id'=>$clickid,
                            'response'=>$response,
                            'created_time'=>$date
                        ]);
    }
    public function get_provider_ip_data(){
        $result=DB::table('provider_ip_table')->where('id','$phone_number');
        return $result;
    }

     public function send_api_request_data_securebill(Request$request,$clickid){
    
        $curl = curl_init();
        $url="http://www.securebill.mobi/bg.php?clickid=" . $clickid . "&idcallback=3a61e98c09ca08f45306e98eec78342b";
        curl_setopt_array($curl,array(CURLOPT_RETURNTRANSFER => 1,CURLOPT_URL=>$url,CURLOPT_USERAGENT=>'cURL Request'));
        $response=curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function ip_in_range($user_ip,$range,$provider){
       
        if(strpos($range,'/')!== false){
            list($range,$netmask)=explode('/', $range,2);
            if (strpos($netmask,'.')!== false) {
                $netmask=str_replace('*','0',$netmask);
                $netmask_dec=ip2long($netmask);
                if ((ip2long($ip) & $netmask_dec)==(ip2long($range) & $netmask_dec)) {
                    $valid='true';
                }
                else {
                    $valid='false';
                }
                $res = array($valid,$provider);
                return $res;
            }
            else{
                $x=explode('.',$range);
                while (count($x)<4) {
                    $x[]='0';
                }
                list($a,$b,$c,$d)=$x;
                $range=sprintf("%u.%u.%u.%u",empty($a) ? '0':$a,empty($b) ? '0':$b,empty($c)? '0':$c,empty($d) ? '0':$d);
                $range_dec=ip2long($range);
                $ip_dec=ip2long($ip);

                $wildcard_dec=pow(2, (32-$netmask))-1;
                $netmask_dec=~$wildcard_dec;

                if (($ip_dec & $netmask_dec)==($range_dec & $netmask_dec)) {
                    $valid='true';
                }
                else{
                    $valid='false';
                }
                $res = array($valid,$provider);
                    return $res;
            }
        }
        else{

            if (stripos($range,'*') !== false) {
                $lower=str_replace('*','0', $range);
                $upper=str_replace('*','255', $range);
                $range="$lower-$upper";
            }
            if (stripos($range,'-')!== false) {
                list($lower,$upper)=explode('-',$range,2);
                $lower_dec=(float)sprintf("%u",ip2long($lower));
                $upper_dec=(float)sprintf("%u",ip2long($upper));
                $ip_dec=(float)sprintf("%u",ip2long($ip));

                if (($ip_dec >= $lower_dec) && ($ip_dec <=$upper_dec)) {
                    $valid='true';
                }
                else{
                    $valid='false';
                }
                $res = array($valid,$provider);
                return $res;
            }
            $res = array('false',$provider);
            return $res;
        }        
    }
    public function get_provider_sms_data($provider){
        $result=DB::table('provider_sms_data')->where('provider','$provider');
        return $result;
    }

    

}
