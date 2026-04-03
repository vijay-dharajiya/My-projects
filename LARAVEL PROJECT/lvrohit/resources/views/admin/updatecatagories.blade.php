@extends('admin.master')
@section('updatecatagories')

<div class="container mt-4">
	<div class="card">
		<div class="card-header">
			<h4>Edit Category</h4>
		</div>
		<div class="card-body">
			@if(session('upmsg'))
				<div class="alert alert-success">{{ session('upmsg') }}</div>
			@endif

			<form action="{{ route('admin.posteditcatagories', $catagories->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="catagories">Category Name</label>
                    <input type="text" name="catagories" id="catagories" class="form-control" value="{{ $catagories->cat_name }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Category</button>
                <a href="{{ route('admin.viewcatagories') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>
			</form>	
		</div>
	</div>
</div>

@endsection