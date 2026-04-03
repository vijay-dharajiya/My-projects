@extends('admin.master')
@section('addcatagories')

<div class="container-fluid mt-5 mb-5">
	<!--@if(session('msg'))
    <div class="alert alert-success" role="alert">
            <h6>{{session('msg')}}</h6>
    </div>  // if send msg from controller are show this but this commentted now admin controller redirect to viewcatagories  
    @endif-->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add catagories</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.postaddcatagories') }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="catagories_name" class="form-label font-weight-bold">catagories Name</label>
                                    <input type="text" class="form-control @error('catagories_name') is-invalid @enderror" id="catagories_name" name="catagories" placeholder="Enter catagories name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">
                                     Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection