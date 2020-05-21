@extends('layouts.main')
@section('main')
    <div class="container-fluid">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            Add farmer
            </button>
            <button type="button" class="btn btn-success">
                <i class="fa fa-file-excel" aria-hidden="true"></i>
              Export Excel
              </button>
              <button type="button" class="btn btn-success">
                  <i class="fa fa-file-pdf" aria-hidden="true"></i>
               Download PDF
                </button>
                <button type="button" class="btn btn-success">
                    <i class="fa fa-print" aria-hidden="true"></i>
                  print
                  </button>
    </div>

      <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title bg-lg text-black" id="exampleModalLabel">Manage Farmers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <form action="{{route('view_farmers.store')}}" class="user" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="username" class="form-control form-control-user" id="exampleUserName" placeholder="Username" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="phone" class="form-control form-control-user" id="examplePhoneNumber" placeholder="Phone Number" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="location" class="form-control form-control-user" id="exampleLocation" placeholder="Location" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="ID_No" class="form-control form-control-user" id="exampleIDnumber" placeholder="ID Number" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="file" name="picture" class="form-control form-control-user" id="examplePicture" onchange="return imageval()" required>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select type="gender" name="gender" value="--chose gender--" class="form-control-user" id="exampleInputGender" required>
                      <option value="" selected>---select gender---</option>
                      <option value="Male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block">
                  Register Farmer
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-success">
              <h6 class="m-0 font-weight-bold text-white">View Farmers Here</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Phone Number</th>
                      <th>Location</th>
                      <th>ID Number</th>
                      <th>Image</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Phone Number</th>
                      <th>Location</th>
                      <th>ID Number</th>
                      <th>Image</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($farmers as $farmer)
                    <tr>
                    <td>{{$farmer->id}}</td>
                      <td>{{$farmer->username}}</td>
                      <td>{{$farmer->phone}}</td>
                      <td>{{$farmer->location}}</td>
                      <td>{{$farmer->ID_No}}</td>
                      <td>
                      <img src="{{asset('photos/'.$farmer->picture)}}" alt="img-responsive" style="width:60px">
                      </td>
                      <td>{{$farmer->gender}}</td>
                      <td>{{$farmer->email}}</td>
                      <td>
                      <a href="{{action('FarmersController@edit', $farmer->id)}}" 
                        class="fa fa-edit btn btn-success btn-sm"></a>
                      <form action="{{action('FarmersController@destroy', $farmer->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger btn-sm fa fa-trash-alt"></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<!-- /.datatables -->
@endsection