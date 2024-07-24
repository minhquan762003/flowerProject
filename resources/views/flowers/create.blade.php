@extends('flowers.master')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                
            @endforeach
        </ul>
    </div>
    
@endif

<div class="card">
    <div class="card-header">Thêm hoa mới</div>
    <div class="card-body">
        <form action="{{route('flowers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="Name" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Img URL</label>
                <div class="col-sm-10">
                    <input type="text" name="image_url" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Region name</label>
                <div class="col-sm-10">
                    <input type="text" name="region_name" class="form-control">
                </div>
            </div>



            <div class="text-center">
                <a href="{{route('flowers.index')}}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" value="Thêm" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>
    
@endsection