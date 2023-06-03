<?php

namespace App\Http\Controllers;
use App\Models\PlayerManagement;
use App\Models\MatchesManagement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
   
     $player = PlayerManagement::all()->toArray();
     $match = MatchesManagement::all();
     $latest_match = DB::select("select * from matches_management order by id desc limit 1");
     $team1= array_column($latest_match,'team1','0');
     $team2= array_column($latest_match,'team2','0');
     
     $latest_match_player = DB::select("select * from player_management where category='".$team1['0']."' or category='".$team2['0']."'");
     $latest_match_player=   json_decode(json_encode($latest_match_player), true);
    //  print_r($latest_match_player);
    //  exit;
    
        return view('index',compact('player','match','latest_match_player','team1','team2'));
    }
    public function status_update(Request $request,$id){
        $post= DB::table('player_management')
        ->select('status')
        ->where('id','=',$id)
        ->first();

        if($post->status =='1'){
           $status = '0';
        }else{
            $status = '1';
        }


        $values = array('status' => $status);
        DB::table('player_management')->where('id',$id)->update($values);
                
                return redirect('https://sportwebsite.joblly.in/');
        
    }
}
