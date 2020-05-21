@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                <form action="{{route('view_farmers.update', $farmer->id)}}" class="user" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="username" value="{{$farmer->username}}" class="form-control form-control-user" id="exampleUserName" placeholder="Username" required>
                        </div>
                        <div class="col-sm-6">
                        <input type="text" name="phone" value="{{$farmer->phone}}" class="form-control form-control-user" id="examplePhoneNumber" placeholder="Phone Number" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="location" value="{{$farmer->location}}" class="form-control form-control-user" id="exampleLocation" placeholder="Location" required>
                        </div>
                        <div class="col-sm-6">
                        <input type="text" name="ID_No" value="{{$farmer->ID_No}}" class="form-control form-control-user" id="exampleIDnumber" placeholder="ID Number" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6">
                        <input type="file" name="picture" value="{{$farmer->picture}}" class="form-control form-control-user" id="examplePicture" onchange="return imageval()" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <select type="gender" name="gender" value="{{$farmer->gender}}" class="form-control-user" id="exampleInputGender" required>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                      <input type="email" name="email" value="{{$farmer->email}}" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                      </div>
                      <button type="submit" class="btn btn-warning btn-user btn-block">
                        Update Farmer
                      </button>
                    </form>
              </div>
          </div>  
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
</div>
@endsection