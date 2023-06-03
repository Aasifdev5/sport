@extends('layouts.app')
@section('content')
    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ShowPlayer </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ShowPlayer </li>
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
              <table id="example" class="display table-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Team</th>
                        <th>POS</th>
                        
                        <th>FPTS</th>
                        <th>SAL</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($player as $posts)
                    <tr>
                        <td>{{$i }}</td>
                        <td>{{$posts['name']}}</td>
                        <td>{{$posts['category']}}</td>
                        <td>{{$posts['pos']}}</td>
                        
                        <td>{{$posts['fpts']}}</td>
                        <td>{{$posts['sal']}}</td>
                        <td>{{ \Carbon\Carbon::parse($posts->created_at)->format('d/m/Y H:i:s')}}</td>
                        <td>
                          <?php 
                          if($posts->status =='1'){?>

                          <a href="{{ url('/status-update',[$posts->id]) }}" class="btn btn-sm btn-warning">Lock</a>

                          <?php } else {?>
                            <a href="{{ url('/status-update',[$posts->id]) }}" class="btn btn-sm btn-danger">Unlock</a>

                         <?php } ?>
                            <a href="{{ route('player.edit',[$posts->id]) }}" class="btn btn-sm btn-primary" width="100px">Edit</a>
                            <a href="{{ route('player.delete',[$posts->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                   @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Team</th>
                        <th>POS</th>
                        <th>OPP</th>
                        <th>FPTS</th>
                        <th>SAL</th>
                        <th>Created</th>
                        <th>Action</th>
                     
                    </tr>
                </tfoot>
            </table>
              
                
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
