<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;

use App\Http\Requests;
use App\Template;
use App\Profile;
use Storage;
use PDO;

class TemplateController extends Controller
{
    //template functions................................

     public function template(Request $request){

    	 $template=new Template();


    	$template->tmp_id=$request['tmp_id'];
    	$template->tmp_name=$request['tmp_name'];
    	$template->created_at=date("Y-m-d H:i:s");
    	
        $destinationPath = public_path()."/uploads/";
        $file = $request->file('tmp_url');

        if( $request->file('tmp_url')->isValid()){
            
            $fileName=$request['tmp_name'];
            $file->move($destinationPath, $fileName);
            $input = $request->all();
            $input['tmp_url'] = $destinationPath.$file->getClientOriginalName();
            $template->update($request->all());

        }
        $template->tmp_url=$fileName;
        $template->save();

        return redirect('template')->with('success', 'You are successfully logged in');
    }

    public function templateshow(){
        $temp=Template::all();
        return view('templateshow',compact('temp'));
    }

    public function templatedelete($tmp_id){

        $temp = DB::delete( DB::raw("DELETE FROM templates WHERE tmp_id = $tmp_id") );
        return redirect('templates');
    }

    public function dropdownview(){

        $dropdown=DB::table('templates')->lists('tmp_name'); 

        return view('templateshow',['dropdown'=>$dropdown]);
    }

    public function viewtemplate(){
        $template=Template::all();

        return view('addedtemplate',compact('template'));
    }

}
