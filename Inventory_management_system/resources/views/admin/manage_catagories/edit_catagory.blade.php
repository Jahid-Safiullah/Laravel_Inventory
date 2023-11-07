@extends('admin.layout')

@section('content')
    <div class="">
        <div class="col-md-12 grid-margin stretch-card">
            <div style="border-radius: 25px;" class="card  shadow-lg p-3 mb-5 bg-body border border-info">


                <!-- <div class="template-demo">

                                  <button type="button" class="btn btn-outline-info btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                                  </button>
                                  <button type="button" class="btn btn-outline-warning btn-icon-text">
                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Reset </button>
                                </div> -->

                <!-- <div>
                    <button style="border-radius: 10px;" type="submit" class="btn btn-primary mr-2 border border-light"><i
                            class="fas fa-edit" style="color: #000000;"></i>Edit</button>

                </div> -->

                <div class="card-body">
                    <div style=" text-align: center;">
                        <div class="line"></div>
                        <h3 class="card-title "> Edit Catagory <span style="color:green"> ( {{$viewData->name}} ) </span> Information</h3>
                        <div class="line"></div>
                    </div>


                    <br>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" method="post" action="{{url('update_catagory',$viewData->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row " >
                            <label for="catagory" class="col-sm-2 col-form-label">Catagory Name</label>
                            <div class="col-sm-10 ">
                                <input value='{{$viewData->name}}' style="border-radius: 10px;" type="text" class="form-control" id="catagory"
                                  name="catagory_name"  placeholder="Catagory Name">
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-end flex-column">
                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input style="border-radius: 10px;" type="checkbox" class="form-check-input"> Remember
                                    me </label>
                            </div>
                            <div class="">
                            <button style="border-radius: 10px;" type="submit" class="btn btn-primary mr-2 border border-light">update</button>
                            <a href="{{route('all_catagories')}}" class="btn btn-warning mr-2 border border-light" style="border-radius: 10px;" type="cancel">Back</a>
                               
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    </div>
@endsection
