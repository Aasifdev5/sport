@extends('layouts.app')
@section('content')
    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Make Team Prediction </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Make Team Prediction </li>
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
              <div class="col-md-8">
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
                       </tr>
                </thead>
                <tbody>
                    <?php 
                      
                      $team_players1= array_column($team_players1,'name','0');
                      $team_players2= array_column($team_players2,'name','0');
                      $count= count($team_players1)-1;
                   
                //       print_r($team_players1) ;
                //   exit;
                    for($i=0; $i<=$count;$i++)
                    
                    
                    {
                       
                    ?>
                    <tr>
                       <td>{{$i}}</td>
                        <td>{{$team_players1[$i]}}</td>
                        <td>{{$team_players2[$i]}}</td>
                    </tr>
                    <?php
                    }
                  
                    ?>
                </tbody>
               
              
            </table>
              <form action="{{route('add_teams')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Player Name </label>
                        <input type="text" class="form-control" name="name" id="team" value="{{old('name')}}"placeholder="Enter Team">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  <input type="hidden" name="team1" value="{{$team1}}">
                  <input type="hidden" name="team2" value="{{$team2}}">
                </div>
                <div class="col-md-6">
                    
                        <label for="exampleInputEmail1">Team  </label>
                        <select class="form-control" id="type"  name="team" >
                            <option value="">Select Team </option>
                          
                            <option value="team1" >Team 1</option>
                            <option value="team2" >Team 2</option>
                            <option value="team3" >Team 3</option>
                            <option value="team4" >Team 4</option>
                          </select>
                           
                </div>
              
                        </div>
                   

                            
                    <!--            <div class="col-md-6">-->
                    <!--    <div class="form-group">-->
                    <!--        <label for="exampleInputEmail1">POS  </label>-->
                    <!--        <br>-->
                    <!--        <select class="form-control" id="type" name="pos">-->
                    <!--          <option >Select Postion</option>-->
                             
                    <!--          <option value="PG">PG</option>-->
                    <!--          <option value="SG">SG</option>-->
                    <!--          <option value="SF">SF</option>-->
                    <!--          <option value="PF">PF</option>-->
                    <!--          <option value="C">C</option>-->
                             
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--    @error('pos')-->
                    <!--    <div class="alert alert-danger">{{ $message }}</div>-->
                    <!--@enderror-->
                     
                    <!--</div>-->
                   <!-- <div class="row">-->
                   <!--             <div class="col-md-6">-->
                   <!--     <div class="form-group">-->
                   <!--         <label for="exampleInputEmail1">FPTS  </label>-->
                   <!--         <input type="text" class="form-control" name="fpts" value="{{old('fpts')}}" id="fpts" placeholder="Enter FPTS">-->
                   <!--     </div>-->
                   <!--     @error('fpts')-->
                   <!--     <div class="alert alert-danger">{{ $message }}</div>-->
                   <!-- @enderror-->
                   <!-- </div>-->
                   <!--<div class="col-md-6">-->
                   <!--     <div class="form-group">-->
                   <!--         <label for="exampleInputEmail1">SAL  </label>-->
                   <!--         <input type="text" class="form-control" name="sal" value="{{old('sal')}}" id="sal" placeholder="Enter SAL">-->
                   <!--     </div>-->
                   <!--     @error('sal')-->
                   <!--     <div class="alert alert-danger">{{ $message }}</div>-->
                   <!-- @enderror-->
                   <!-- </div>-->
                   <!-- </div>-->
                    <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                 </form>
                
               
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
