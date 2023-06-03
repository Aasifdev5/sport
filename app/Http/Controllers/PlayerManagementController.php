<?php

namespace App\Http\Controllers;

use App\Models\PlayerManagement;
use App\Models\TeamManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teams;

class PlayerManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = TeamManagement::all();
        return view('admin.PlayerManagement.addplayer',compact('team'));
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
            'name' => 'required',
            'category' => ['required', 'not_in:Select Team Category'],
            'pos' => ['required', 'not_in:Select Postion'],
           
            'fpts' => 'required|numeric',
            'sal' => 'required|numeric',
            
        ]);
       $player_name1 = DB::select("select count(id) as record from player_management where name='".$request->name."' and category='".$request->category."'");
        $player_name1= array_column($player_name1,'record','0');
    
        if(($player_name1['0']) == 1)
        {
           return back()->with('error', 'Player can not created in this team because it already exits.');
        }
        
         $team_players1 = DB::select("select count(id) as record from player_management where  category='".$request->category."'");
        $team_players1= array_column($team_players1,'record','0');
        // print_r($team_players1['0']);
        if(($team_players1['0']) > 15)
        {
           return back()->with('error', 'Player can not created in  team 1 because it already have 16 players.');
        }
        $player = new PlayerManagement;
        $player->name = $request->name;
        $player->category = $request->category;
        $player->pos = $request->pos;
        
        $player->fpts = $request->fpts;
        $player->sal = $request->sal;
        $player->save();
    
        return redirect()->route('player.show')->with('success', 'Player created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlayerManagement  $playerManagement
     * @return \Illuminate\Http\Response
     */
    public function show(PlayerManagement $playerManagement)
    {
        $player = PlayerManagement::all();
       
        // info($player);die;
        return view('admin.PlayerManagement.showplayer',compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayerManagement  $playerManagement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team1 = TeamManagement::all();
        $edit = PlayerManagement::find($id);
        return view('admin.PlayerManagement.editplayer',compact('edit','team1'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlayerManagement  $playerManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => ['required', 'not_in:Select Team Category'],
            'pos' => ['required', 'not_in:Select Postion'],
            
            'fpts' => 'required|numeric',
            'sal' => 'required|numeric',
            
        ]);
       $player_name1 = DB::select("select count(id) as record from player_management where name='".$request->name."' and category='".$request->category."'");
        $player_name1= array_column($player_name1,'record','0');
    
        if(($player_name1['0']) == 1)
        {
           return back()->with('error', 'Player can not created in this team because it already exits.');
        }
        PlayerManagement::where('id', $id)->update($validatedData );
        return redirect()->route('player.show')->with('success', 'Player updated successfully.');
    }

    public function status_update($id){
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
        return redirect()->route('player.show')->with('success', 'Status has been updated successfully.');
    }
    

    public function updatePlayer(Request $request)
    {
         $id = $request->input('id');
        $field = $request->input('field');
        $value = $request->input('value');
    
        $player = PlayerManagement::find($id);
        $player->$field = $value;
        $player->save();
    
        // return response()->json(['success' => true]);
       
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayerManagement  $playerManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlayerManagement::destroy($id);
        return redirect()->route('player.show')->with('error', 'Player Deleted successfully.');
    }

    
}
