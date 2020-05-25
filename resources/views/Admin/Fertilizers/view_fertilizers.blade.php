@extends('layouts.main')
@section('main')
    <div class="container-fluid">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            Add fertilizer
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
          <h5 class="modal-title bg-lg text-black" id="exampleModalLabel">Manage Fertilizers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <form action="{{route('view_fertilizers.store')}}" class="user" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control form-control-user" id="exampleName" placeholder="Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="type" class="form-control form-control-user" id="exampleType" placeholder="Type" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="composition" class="form-control form-control-user" id="exampleComposition" placeholder="Composition" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="uses" class="form-control form-control-user" id="exampleUses" placeholder="Uses of Fertilizers" required>
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" name="benefits" class="form-control form-control-user" id="exampleBenefits" placeholder="Benefits of fertilizers" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="effects" class="form-control form-control-user" id="exampleEffects" placeholder="Fertilizer Effects" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="form-group">
                      <input type="unit" name="cost" class="form-control form-control-user" id="exampleInputUnit" placeholder="Unit Price" required>
                    </div>
                    <div class="form-group">
                      <input type="file" name="image" class="form-control form-control-user" id="exampleInputImage" placeholder="Image" onchange="return imageval()" required>
                    </div>
                  </div>
                <button type="submit" class="btn btn-success btn-user btn-block">
                  Register Fertilizer
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
              <h6 class="m-0 font-weight-bold text-white">View Fertilizers Here</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Composition</th>
                      <th>Uses</th>
                      <th>Benefits</th>
                      <th>Effects</th>
                      <th>Cost</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Composition</th>
                      <th>Uses</th>
                      <th>Benefits</th>
                      <th>Effects</th>
                      <th>Cost</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($fertilizers as $fertilizer)
                    <tr>
                      <td>{{$fertilizer->id}}</td>
                      <td>{{$fertilizer->name}}</td>
                      <td>{{$fertilizer->type}}</td>
                      <td>{{$fertilizer->composition}}</td>
                      <td>{{$fertilizer->uses}}</td>
                      <td>{{$fertilizer->benefits}}</td>
                      <td>{{$fertilizer->effects}}</td>
                      <td>{{$fertilizer->cost}}</td>
                      <td><img src="{{asset('photos/'.$fertilizer->image)}}" alt="img-responsive" style="width: 60px"></td>
                      <td>
                      <a href="{{action('FertilizersController@edit', $fertilizer->id)}}" class="fa fa-edit btn btn-info btn-sm"></a>
                      <form action="{{action('FertilizersController@destroy', $fertilizer->id)}}" method="POST">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="fa fa-trash-alt btn btn-danger btn-sm"></button>
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