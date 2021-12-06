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
                                <input type="text" class="form-control" name="keyword" value="{{$searchData['keyword']}}" placeholder="Tìm theo tên hành khách">
                            </div>
                            <div class="form-group">
                                <label for="">Danh sách xe</label>
                                <select name="car_id" class="form-control">
                                    <option value="">Tất cả</option>
                                    @foreach ($cars as $item)
                                        <option @if($item->id == $searchData['car_id']) selected @endif value="{{$item->id}}">{{$item->owner}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tên cột</label>
                                <select name="column_names" class="form-control">
                                    @foreach ($column_names as $key => $item)
                                        <option  @if($key == $searchData['column_names']) selected @endif value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sắp xếp theo</label>
                                <select name="order_by" class="form-control">
                                    @foreach ($order_by as $key => $item)
                                        <option @if($key == $searchData['order_by']) selected @endif value="{{$key}}">{{$item}}</option>
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
                        <th>Tên hành khách</th>
                        <th>Thời gian chạy</th>
                        <th>Ảnh hành khách</th>
                        <th>Biển số xe</th>
                        <th>Tên tài xế</th>
                        <th>
                            <a href="{{route('passenger.add')}}">Add new</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($passengers as $item)
                            <tr>
                                <td>{{($passengers->currentPage() - 1)*$passengers->perPage() + $loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->travel_time}}</td>
                                <td>
                                    <img src="{{asset($item->avatar)}}" width="100">
                                </td>
                                <td>{{$item->car->plate_number}}</td>
                                <td>{{$item->car->owner}}</td>
                                <td>
                                    <a href="{{route('passenger.edit', ['id' => $item->id])}}">Edit</a>
                                    <a href="{{route('passenger.remove', ['id' => $item->id])}}">Remove</a>
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$passengers->onEachSide(1)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection