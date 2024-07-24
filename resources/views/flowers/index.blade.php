
@extends('flowers.master')

@section('content')

@if ($message = Session::get('success'))

<div class="alert alert-success">
    {{$message}}
</div>
    
@endif

<div class="container mt-5 ">
    <h1 class=""><b>Quản lý hoa</b></h1>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Create</b></div>
            <div class="col col-md-6">
                <a href="{{route('flowers.create')}}" class="btn btn-success btn-sm float-end">Thêm loài hoa mới</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>Flower ID</th>
                <th>Flower Name</th>
                <th>Flower Description</th>
                <th>URL</th>
                <th>Region</th>
                <th>created at</th>
                <th>updated at</th>
                <th>Thao tác</th>
            </tr>
            @if (count($flowers) > 0)
                @foreach ($flowers as $row)
                
            
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->Name}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->image_url}}</td>
                    <td>
                        <ul>@foreach ($row->regions as $region)
                            <li>{{$region->region_name}}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>{{$row->created_at}}</td>
                    <td>{{$row->updated_at}}</td>
                    
                    
                    <td>
                        <form action="{{route('flowers.destroy', $row->id)}}" method="post"  onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('flowers.edit', $row->id )}}" class="btn btn-warning">Sửa</a>
                            <input type="submit" class="btn btn-danger " value="Xóa">
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No data found</td>
                </tr>
            @endif
        </table>
        <div class="card-footer text-muted">
            <div class="d-flex justify-content-center">
                {{$flowers->links('pagination::bootstrap-4')}};
            </div>
        </div>
        
    </div>

</div>

@endsection