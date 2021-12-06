@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <input type="text" class="form-control" name="keyword" value="{{$searchDataC['keyword']}}" placeholder="Tìm theo tên tài xế">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tên cột</label>
                                <select name="column_names" class="form-control">
                                    @foreach ($column_names as $key => $item)
                                        <option  @if($key == $searchDataC['column_names']) selected @endif value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sắp xếp theo</label>
                                <select name="order_by" class="form-control">
                                    @foreach ($order_by as $key => $item)
                                        <option @if($key == $searchDataC['order_by']) selected @endif value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <th>ID</th>
                        <th>Biển số xe</th>
                        <th>Tên tài xế</th>
                        <th>Giá vé</th>
                        <th>Ảnh</th>
                        <th>
                            <a href="{{route('car.add')}}">Add new</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($cars as $item)
                            <tr>
                                <td>{{($cars->currentPage() - 1)*$cars->perPage() + $loop->iteration}}</td>
                                <td>{{$item->plate_number}}</td>
                                <td>{{$item->owner}}</td>
                                <td>{{$item->travel_fee}}</td>
                                <td>
                                    <img src="{{asset($item->plate_image)}}" width="100">
                                </td>
                                <td>
                                    <a href="{{route('car.edit', ['id' => $item->id])}}">Edit</a>
                                    <a href="{{route('car.remove', ['id' => $item->id])}}">Remove</a>
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$cars->onEachSide(1)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection