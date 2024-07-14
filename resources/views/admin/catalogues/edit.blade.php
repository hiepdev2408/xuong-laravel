@extends('admin.layout.master')

@section('title')
    Cập nhật danh mục {{ $model->name }}
@endsection

@section('content')
    <form action="{{ route('admin.catalogues.update', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $model->name }}"
                        name="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">File Cover</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="cover"
                        aria-describedby="emailHelp">
                    <img src="{{ \Storage::url($model->cover) }}" width="100px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <input class="form-check-input" type="checkbox" role="switch"
                        @checked($model->is_active)
                        value="1" name="is_active" id="is_active">
                    <label class="form-check-label" for="exampleCheck1">Is Active</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
