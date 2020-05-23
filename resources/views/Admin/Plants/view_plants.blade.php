@extends('layouts.main')
@section('main')
    <div class="container-fluid">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            Add plant
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
          <h5 class="modal-title bg-lg text-black" id="exampleModalLabel">Manage Plants</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <form action="{{route('view_plants.store')}}" class="user" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control form-control-user" id="exampleName" placeholder="Plants Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="scientific_name" class="form-control form-control-user" id="exampleScientificName" placeholder="Scientific Name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select type="classification" name="classification" value="--chose classification--" class="form-control-user" id="exampleInputClassification" required>
                      <option value="" selected>---select Classification---</option>
                      <option value="crop">crop</option>
                      <option value="cereal">cereal</option>
                      <option value="legume">legume</option>
                      <option value="fruit">fruit</option>
                      <option value="vegetable">vegetable</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="source" class="form-control form-control-user" id="exampleSource" placeholder="Plant Source" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="family" class="form-control form-control-user" id="exampleFamily" placeholder="Plant Family" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="price" name="price" class="form-control form-control-user" id="examplePrice" placeholder="Charged Prices" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="form-group">
                    <input type="textarea" name="benefits" class="form-control form-control-user" id="exampleInputBenefits" placeholder="Benefits" required>
                  </div>
                  <div class="form-group">
                    <input type="file" name="image" class="form-control form-control-user" id="exampleInputBenefits" placeholder="plants image" onchange="return imageval()" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block">
                  Register Plant
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
              <h6 class="m-0 font-weight-bold text-white">View Plants Here</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Scientific Name</th>
                      <th>Classification</th>
                      <th>Source</th>
                      <th>Family</th>
                      <th>Price</th>
                      <th>Benefits</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Scientific Name</th>
                      <th>Classification</th>
                      <th>Source</th>
                      <th>Family</th>
                      <th>Price</th>
                      <th>Benefits</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($plants as $plant)
                    <tr>
                      <td>{{$plant->id}}</td>
                      <td>{{$plant->name}}</td>
                      <td><em>{{$plant->scientific_name}}</em></td>
                      <td>{{$plant->classification}}</td>
                      <td>{{$plant->source}}</td>
                      <td>{{$plant->family}}</td>
                      <td>{{$plant->price}}</td>
                      <td>{{$plant->benefits}}</td>
                      <td><img src="{{asset('photos/'.$plant->image)}}" alt="img-responsive" style="width:60px"></td>
                      <td>
                      <a href="{{action('PlantsController@edit', $plant->id)}}" class="fa fa-edit btn btn-info btn-sm"></a>
                      <form action="{{action('PlantsController@destroy',$plant->id)}}" method="POST">
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