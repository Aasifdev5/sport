@extends('layouts.app')
@section('content')
    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Teams Prediction </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teams Prediction </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.card -->

          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
              <!-- form start -->
              <table id="example" class="display " style="">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Team1</th>
                        <th>Team2</th>
                        <th>Team3</th>
                        <th>Team4</th>
                       </tr>
                </thead>
                <tbody>
                    <?php 
                
                      $team_players1= array_column($team_players1,'player_name','0');
                      $team_players2= array_column($team_players2,'player_name','0');
                      $team_players3= array_column($team_players3,'player_name','0');
                      $team_players4= array_column($team_players4,'player_name','0');
                      
                      $count= count($team_players1)-1;
                
                     
                    for($i=0; $i<=$count;$i++)
                    
                    
                    {
                       
                    ?>
                    <tr>
                       <td class="text-center">{{$i}}</td>
                        <td>{{$team_players1[$i]}}</td>
                        <td>{{$team_players2[$i]}}</td>
                       <td>{{$team_players3[$i]}}</td>
                        <td>{{$team_players4[$i]}}</td>
                    </tr>
                    <?php
                    }
                  
                    ?>
                </tbody>
                </table>
              </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  @endsection
