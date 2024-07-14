
@extends('admin.layout.master')

@section('title')
    Thêm mới danh mục
@endsection

@section('content')
    <form action="{{ route('admin.catalogues.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">File Cover</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="cover" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_active" value="1" checked>
                    <label class="form-check-label" for="exampleCheck1" >Is Active</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
