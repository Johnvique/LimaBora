@extends('layouts.main')
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                <form action="{{route('view_plants.update', $plant->id)}}" class="user" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="name" value="{{$plant->name}}" class="form-control form-control-user" id="exampleName" placeholder="Plants Name" required>
                        </div>
                        <div class="col-sm-6">
                        <input type="text" name="scientific_name" value="{{$plant->scientific_name}}" class="form-control form-control-user" id="exampleScientificName" placeholder="Scientific Name" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <select type="classification" name="classification" value="{{$plant->classification}}" class="form-control-user" id="exampleInputClassification" required>
                                  <option value="" selected>---select Classification---</option>
                                  <option value="crop">crop</option>
                                  <option value="cereal">cereal</option>
                                  <option value="legume">legume</option>
                                  <option value="fruit">fruit</option>
                                  <option value="vegetable">vegetable</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-sm-6">
                        <input type="text" name="source" value="{{$plant->source}}" class="form-control form-control-user" id="exampleSource" placeholder="Plant Source" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="family" value="{{$plant->family}}" class="form-control form-control-user" id="exampleFamily" placeholder="Plant Family" required>
                        </div>
                        <div class="col-sm-6">
                        <input type="price" name="price" value="{{$plant->price}}" class="form-control form-control-user" id="examplePrice" placeholder="Charged Prices" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="form-group">
                        <input type="textarea" name="benefits" value="{{$plant->benefits}}" class="form-control form-control-user" id="exampleInputBenefits" placeholder="Benefits" required>
                        </div>
                        <div class="form-group">
                        <input type="file" name="image" value="{{$plant->image}}" class="form-control form-control-user" id="exampleInputBenefits" placeholder="plants image" onchange="return imageval()" required>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-warning btn-user btn-block">
                        Update Plant
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