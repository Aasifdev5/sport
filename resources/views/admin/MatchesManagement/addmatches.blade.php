@extends('layouts.app')
@section('content')
    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">AddMatches</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">AddMatches</li>
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
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date  </label>
                        <input type="Date" class="form-control" name="date" id="date" value="{{old('date')}}"placeholder="Enter Team">
                    </div>
                    @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  
                </div>
                        </div>
                   

                            
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Time  </label>
                                    <input type="time" class="form-control" name="time" value="{{old('time')}}" id="pos" placeholder="Enter POS">
                                </div>
                                @error('time')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                     
                    </div>
                            <div class="row" style="">
                                <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Add Team 1  </label><br>
                            <select class="form-select form-group" style="padding: 16px;margin:12px" id="type" name="team1" aria-label="Default select example">
                                <option >Select Team 1</option>
                                @foreach ($match as $teams)
                                <option value="{{ $teams->team }}" @if(old('team1') == $teams->id) selected @endif>{{ $teams->team }}</option>
                                @endforeach
                              </select>
                        </div>
                        
                        @error('team1')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-6">
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Add Team 2  </label><br>
                            {{-- <select class="form-select form-group" style="padding: 16px;margin:12px" id="type" name="team2" aria-label="Default select example"> --}}
                                <select class="form-select form-group" style="padding: 16px;margin:12px" id="type" name="team2" aria-label="Default select example">
                                    <option >Select Team 2</option>
                                    @foreach ($match as $teams)
                                    <option value="{{ $teams->team }}" @if(old('team2') == $teams->id) selected @endif>{{ $teams->team }}</option>
                                    @endforeach
                                  </select>
                        </div>
                        @error('team2')
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
