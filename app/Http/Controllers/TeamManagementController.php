<?php

namespace App\Http\Controllers;

use App\Models\TeamManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.TeamManagement.addteam');
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
            'team' => 'required',
            
        ]);
        $team_name = DB::select("select count(id) as record from team_management where team='".$request->team."'");
        $team_name= array_column($team_name,'record','0');
    
        if(($team_name['0']) == 1)
        {
           return back()->with('error', 'Team can not created, because it already exits.');
        }
        $user = new TeamManagement;
        $user->team = $request->team;
        $user->save();
    
        // return redirect()->back()->with('success', 'User created successfully!');
        return redirect()->route('show')->with('success', 'Team created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamManagement  $teamManagement
     * @return \Illuminate\Http\Response
     */
    public function show(TeamManagement $teamManagement)
    {
        $post = TeamManagement::all();
        return view('admin.TeamManagement.showteam',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamManagement  $teamManagement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = TeamManagement::find($id);
        // info($edit);die;
        return view('admin.TeamManagement.editteam',compact('edit'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamManagement  $teamManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'team' => 'required',
         
        ]);
$team_name = DB::select("select count(id) as record from team_management where team='".$request->team."'");
        $team_name= array_column($team_name,'record','0');
    
        if(($team_name['0']) == 1)
        {
           return back()->with('error', 'Team can not created, because it already exits.');
        }
        TeamManagement::where('id', $id)->update($data);
        return redirect()->route('show')->with('success', 'Team updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamManagement  $teamManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TeamManagement::destroy($id);
        return redirect()->route('show')->with('error', 'Team Deleted successfully.');

    }
}
