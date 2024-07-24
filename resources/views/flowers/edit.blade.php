@extends('flowers.master')

@section('content')
    <div class="card-header">Sửa thông tin hoa</div>
    <div class="card-body">
        <form action="{{route('flowers.update', $flower->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">FLower Name</label>
                <div class="col-sm-10">
                    <input type="text" name="Name" class="form-control" value="{{$flower->Name}}">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">FLower Description</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" value="{{$flower->description}}">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">FLower URL</label>
                <div class="col-sm-10">
                    <input type="text" name="image_url" class="form-control" value="{{$flower->image_url}}">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Region name</label>
                <div class="col-sm-10">
                    <input type="text" name="region_name" class="form-control" value="{{$flower->regions[0]->region_name ??''}}">
                </div>
            </div>




            <div class=" text-center">
                <a href="{{route('flowers.index')}}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" value="Sửa" class="btn btn-primary">
            </div>
        </form>

    </div>
@endsection