@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                <form action="{{route('view_fertilizers.update', $fertilizer->id)}}" class="user" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" name="name" value="{{$fertilizer->name}}" class="form-control form-control-user" id="exampleName" placeholder="Name" required>
                      </div>
                      <div class="col-sm-6">
                      <input type="text" name="type" value="{{$fertilizer->type}}" class="form-control form-control-user" id="exampleType" placeholder="Type" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" name="composition" value="{{$fertilizer->composition}}" class="form-control form-control-user" id="exampleComposition" placeholder="Composition" required>
                      </div>
                      <div class="col-sm-6">
                      <input type="text" name="uses" value="{{$fertilizer->uses}}" class="form-control form-control-user" id="exampleUses" placeholder="Uses of Fertilizers" required>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="benefits" value="{{$fertilizer->benefits}}" class="form-control form-control-user" id="exampleBenefits" placeholder="Benefits of fertilizers" required>
                        </div>
                        <div class="col-sm-6">
                        <input type="text" name="effects" value="{{$fertilizer->effects}}" class="form-control form-control-user" id="exampleEffects" placeholder="Fertilizer Effects" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="form-group">
                        <input type="unit" name="cost" value="{{$fertilizer->cost}}" class="form-control form-control-user" id="exampleInputUnit" placeholder="Unit Price" required>
                        </div>
                        <div class="form-group">
                        <input type="file" name="image" value="{{$fertilizer->image}}" class="form-control form-control-user" id="exampleInputImage" placeholder="Image" onchange="return imageval()" required>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-warning btn-user btn-block">
                      Update Fertilizer
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