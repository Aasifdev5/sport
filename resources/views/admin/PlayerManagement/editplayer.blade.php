@extends('layouts.app')
@section('content')
    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">AddPlayer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">AddPlayer</li>
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
              <div class="col-md-6">
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
                <form action="{{route('player.update',[$edit->id])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Player Name </label>
                        <input type="text" class="form-control" name="name" id="team" value="{{$edit->name}}"placeholder="Enter Team">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  
                </div>
               

                <div class="col-md-6">
                    
                        <label for="exampleInputEmail1">Team Category </label>
                        <select class="form-select form-group" id="type" name="category" aria-label="Default select example">
                          <option >Select Team Category</option>
                          @foreach ($team1 as $teams)
                       
                          <option value="{{ $teams->team }}" @if(old('category') == $teams->team) selected @endif>{{ $teams->team }}</option>
                          @endforeach
                        </select>
                          @error('category')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    
                </div>
              
                        </div>
                   

                        <div class="row">
                          <div class="col-md-6">
                  <div class="form-group">
                      <label for="exampleInputEmail1">POS  </label>
                      <br>
                      <select class="form-select form-group" id="type" name="pos" aria-label="Default select example">
                        <option >Select Postion</option>
                       
                        <option value="PG" @if(old('pos', $edit->pos) == 'PG') selected @endif>PG</option>
                        <option value="SG" @if(old('pos', $edit->pos) == 'SG') selected @endif>SG</option>
                        <option value="SF" @if(old('pos', $edit->pos) == 'SF') selected @endif>SF</option>
                        <option value="PF" @if(old('pos', $edit->pos) == 'PF') selected @endif>PF</option>
                        <option value="C" @if(old('pos', $edit->pos) == 'C') selected @endif>C</option>
                        <option value="F" @if(old('pos', $edit->pos) == 'F') selected @endif>F</option>
                        <option value="VC"  @if(old('pos', $edit->pos) == 'VC') selected @endif>VC</option>
                        <option value="WC" @if(old('pos', $edit->pos) == 'WC') selected @endif>WC</option>
                      </select>
                  </div>
                  @error('pos')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
               
              </div>
          
                
    
                 
            <!--  <div class="col-md-6">-->
                       
            <!--    <label for="exampleInputEmail1">OPP  </label>-->
            <!--    <br>-->
            <!--    <select class="form-select form-group" id="type" name="opp" aria-label="Default select example">-->
            <!--      <option >Select Opponent Team</option>-->
            <!--      @foreach ($team1 as $teams)-->
            <!--      <option value="{{ $teams->team }}" @if(old('opp') == $teams->id) selected @endif>{{ $teams->team }}</option>-->
            <!--      @endforeach-->
            <!--    </select>-->
            <!--    @error('opp')-->
            <!--    <div class="alert alert-danger">{{ $message }}</div>-->
            <!--@enderror-->
            <!--</div>-->
         
       
    
              
                          


                            <div class="row">
                                <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">FPTS  </label>
                            <input type="number" class="form-control" name="fpts" value="{{$edit->fpts}}" id="fpts" placeholder="Enter FPTS">
                        </div>
                        @error('fpts')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  

    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">SAL  </label>
                            <input type="number" class="form-control" name="sal" value="{{$edit->sal}}" id="sal" placeholder="Enter SAL">
                        </div>
                        @error('sal')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                  
                            </div>
                         





                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    
                </form>
                </div>
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
