<?php

namespace App\Http\Controllers;

use App\Models\MatchesManagement;
use App\Models\TeamManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PlayerManagement;
use App\Models\Teams;
class MatchesManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $match = TeamManagement::all();
        return view('admin.MatchesManagement.addmatches',compact('match'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'team1' =>  ['required', 'not_in:Select Team 1'],
            'team2' =>  ['required', 'not_in:Select Team 2'],
            
            
        ]);
         $team_players1 = DB::select("select count(id) as record from player_management where category='".$request->team1."'");
        $team_players1= array_column($team_players1,'record','0');
        // print_r($team_players1['0']);
        if(($team_players1['0']) < 16)
        {
           return back()->with('error', 'Match can not created because this team have not 8 players.');
        }
        $team_players2 = DB::select("select count(id) as record from player_management where category='".$request->team2."'");
        $team_players2= array_column($team_players2,'record','0');
        // print_r($team_players1['0']);
        if(($team_players2['0']) < 16)
        {
           return back()->with('error', 'Match can not created because this team have not 8 players.');
        }
        $matches = new MatchesManagement;
        $matches->date = $request->date;
        $matches->time = $request->time;
        $matches->team1 = $request->team1;
        $matches->team2 = $request->team2;
       
        $matches->save();
    
        return redirect()->route('matches.show')->with('success', 'Matches created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatchesManagement  $matchesManagement
     * @return \Illuminate\Http\Response
     */
    public function show(MatchesManagement $matchesManagement)
    {
        $match = MatchesManagement::all();
        return view('admin.MatchesManagement.showmatches',compact('match'));
    }
     public function prediction(MatchesManagement $matchesManagement)
    {
        $match = MatchesManagement::all();
        return view('admin.PredictionManagement.predictionmatches',compact('match'));
    }
    
     public function add_prediction(Request $request, $id)
    {
      
        $match = MatchesManagement::find($id);
       
        $team1=$match->team1;
        $team2=$match->team2;
          
        $team_players1 = DB::select("select * from player_management where category='" . $match->team1 . "' ");
        $team_players2 = "select * from player_management where category='" . $match->team2 . "' ";
        $team_players2 = DB::select($team_players2);
        
        
        return view('admin.PredictionManagement.add_prediction',['team_players1' => $team_players1, 'team_players2' => $team_players2,'team1'=>$team1,'team2'=>$team2]);
    }
    public function add_teams(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'team' => ['required']
          ]);
        $player = new Teams;
      
        if($request->team=="team1"){
        $team_players1 = DB::select("select count(id) as record from teams where team='team1'");
        $team_players1= array_column($team_players1,'record','0');
        // print_r($team_players1['0']);
        if(($team_players1['0']) > 7)
        {
           return back()->with('error', 'Player can not created in  team 1 because it already have 8 players.');
        }
        
        $player_name1 = DB::select("select count(id) as record from teams where player_name='".$request->name."' and team='team1'");
        $player_name1= array_column($player_name1,'record','0');
    
        if(($player_name1['0']) == 1)
        {
           return back()->with('error', 'Player can not created in  team 1 because it already exits.');
        }
        
        }
        if($request->team=="team2"){
            $team_players2 = DB::select("select count(id) as record from teams where team='team2' ");
        $team_players2= array_column($team_players2,'record','0');
        // print_r($team_players2['0']);
        if(($team_players2['0']) > 7)
        {
           return back()->with('error', 'Player can not created in  team 2 because it already have 8 players.');
        }
        $player_name2 = DB::select("select count(id) as record from teams where player_name='".$request->name."' and team='team2'");
        $player_name2= array_column($player_name2,'record','0');
    
        if(($player_name2['0']) == 1)
        {
           return back()->with('error', 'Player can not created in  team 2 because it already exits.');
        }
        
        }
         if($request->team=="team3"){
        $team_players3 = DB::select("select count(id) as record from teams where team='team3' ");
        $team_players3= array_column($team_players3,'record','0');
        // print_r($team_players3['0']);
        if(($team_players3['0']) > 7)
        {
           return back()->with('error', 'Player can not created in  team 3 because it already have 8 players.');
        }
        $player_name3 = DB::select("select count(id) as record from teams where player_name='".$request->name."' and team='team3'");
        $player_name3= array_column($player_name3,'record','0');
    
        if(($player_name3['0']) == 1)
        {
           return back()->with('error', 'Player can not created in  team 3 because it already exits.');
        }
        
        }
         if($request->team=="team4"){
            $team_players4 = DB::select("select count(id) as record from teams where team='team4' ");
        $team_players4= array_column($team_players4,'record','0');
        // print_r($team_players4['0']);
        
        if(($team_players4['0']) > 7)
        {
           return back()->with('error', 'Player can not created in  team 4 because it already have 8 players.');
        }
        $player_name = DB::select("select count(id) as record from teams where player_name='".$request->name."' and team='team4'");
        $player_name= array_column($player_name,'record','0');
    
        if(($player_name['0']) == 1)
        {
           return back()->with('error', 'Player can not created in  team 4 because it already exits.');
        }
        }
        
       $check_players = DB::select("select count(id) as record from player_management where name='".$request->name."' and (category='".$request->team1."' or category='".$request->team2."')");
       $check_players= array_column($check_players,'record','0');
       
      
       if($check_players[0]> 0){
            $player->player_name = $request->name;
       }else{
           return back()->with('error', 'Player does not exits in both team.');
       }
         $player->actual_team1 = $request->team1;
         $player->actual_team2 = $request->team2;
         $player_sal = DB::select("select * from player_management where name='".$request->name."' and (category='".$request->team1."' or category='".$request->team2."')");
         $player_id= array_column($player_sal,'id','0');
        $player_salary= array_column($player_sal,'sal','0');
        $player_fpts= array_column($player_sal,'fpts','0');
        $player->player_id = $player_id['0'];
        $player->sal = $player_salary['0'];
        $player->fpts = $player_fpts['0'];
        $player->team = $request->team;
       
        $player->save();
    
        return redirect('prediction')->with('success', 'Player created successfully.');

    }

    public function team_prediction(Request $request, $id)
    {
      
        $match = MatchesManagement::find($id);
       
        $team1=$match->team1;
        $team2=$match->team2;
          
        $team_players1 = DB::select("select * from teams where team='team1'");
       
        $team_players2 = DB::select("select * from teams where team='team2'");
        
        $team_players3 = DB::select("select * from teams where team='team3'");
       
        $team_players4 = DB::select("select * from teams where team='team4'");
        
        
        return view('admin.PredictionManagement.team_prediction',['team_players1' => $team_players1, 'team_players2' => $team_players2,'team_players3' => $team_players3, 'team_players4' => $team_players4,'team1'=>$team1,'team2'=>$team2]);
    }
    
    public function edit($id)
    {
        $match = TeamManagement::all();
        $edit = MatchesManagement::find($id);
        // info($edit);die;
        return view('admin.MatchesManagement.editmatches',compact('edit','match'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatchesManagement  $matchesManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $validatedData = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'team1' =>  ['required', 'not_in:Select Team 1'],
            'team2' =>  ['required', 'not_in:Select Team 2'],
            
        ]);

        MatchesManagement::where('id', $id)->update($validatedData );
        return redirect()->route('matches.show')->with('success', 'Matches updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatchesManagement  $matchesManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MatchesManagement::destroy($id);
        return redirect()->route('matches.show')->with('error', 'Matches Deleted successfully.');
    }
}
