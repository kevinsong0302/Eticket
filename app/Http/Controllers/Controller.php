<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome(){
        $data = DB::select('select * from program where prog_id=:prog_id',['prog_id'=>1]);
        $data2 = DB::select('select * from program where prog_id=:prog_id',['prog_id'=>2]);
        $data3 = DB::select('select * from program where prog_id=:prog_id',['prog_id'=>3]);
        $data4 = DB::select('select * from program where prog_id=:prog_id',['prog_id'=>4]);
        $data5 = DB::select('select * from program where prog_id=:prog_id',['prog_id'=>5]);
        $data6 = DB::select('select * from program where prog_id=:prog_id',['prog_id'=>6]);
        $data7 = DB::select('select * from program where prog_id=:prog_id',['prog_id'=>7]);
        $post = DB::select('select * from post');
        return view('welcome',compact('data','data2','data3','data4','data5','data6','data7','post'));
        
    }

    public function insert(Request $req){
        $prog_name = $req->input('prog_name');
        $prog_content = $req->input('prog_content');
        $prog_price = $req->input('prog_price');
        $prog_date = $req->input('prog_date');
        $prog_selldate = $req->input('prog_selldate');
        $prog_organizer = $req->input('prog_organizer');
        $site_name = $req->input('site_name');
        $img = $req->input('img');
        $imgprice = $req->input('imgprice');
        
        $data =array('prog_name'=>$prog_name,'prog_content'=>$prog_content,'prog_price'=>$prog_price,'prog_date'=>$prog_date,
        'prog_selldate'=>$prog_selldate,'prog_organizer'=>$prog_organizer,'site_name'=>$site_name,'img'=>$img,'imgprice'=>$imgprice);
  
        DB::table('program')->insert($data);
        return Redirect::to('home');
  
    }
  
}
