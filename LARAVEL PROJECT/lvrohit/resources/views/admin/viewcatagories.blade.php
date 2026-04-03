@extends('admin.master')
@section('viewcatagories')

<div class="container m-5">
    @if(session('delmsg'))
        <div class="alert alert-danger mt-3">
            {{ session('delmsg') }}
        </div>
    @endif
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Cat Id</th>
                <th>Cat Name</th>
                <th colspan="2" class="text-center">Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($catagories as  $catagories)
            <tr>
                <td>{{ $catagories->id }}</td><!--{{ $catagories['id']}}-->
                <td>{{ $catagories->cat_name }}</td>
                <td><a href="{{ route('admin.updatecatagories', $catagories->id) }}" class="btn btn-primary btn-sm">Update</a></td>
                <td><a href="{{ route('admin.deletecatagories',$catagories->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('sure to delete ?')">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
