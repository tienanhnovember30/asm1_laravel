@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tên hành khách</label>
                                    <input type="text" name="name" value="{{$model->name}}" class="form-control" placeholder="">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <div class="row">
                                        <div class="col-6 offset-3">
                                            <img src="{{asset($model->avatar)}}" alt="" class="img-thumbnail">
                                        </div>
                                        <br>
                                    </div>
                                    <input type="file" name="avatar" class="form-control" placeholder="">
                                    @error('avatar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Thời gian khởi hành</label>
                                    <input type="datetime-local" name="travel_time" value="{{$model->travel_time}}" class="form-control" placeholder="">
                                    @error('quantity')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Biển số xe</label>
                             <select name="car_id" value="{{$model->car_id}}"  class="form-control">
                                @foreach ($cars as $item)
                                    <option value="{{$item->id}}">{{$item->plate_number}}</option>
                                @endforeach
                              </select>
                                </div>

                            </div>
                        
                            <div class="col-12 d-flex justify-content-end">
                                <br>
                                <a href="{{route('passenger.index')}}" class="btn btn-danger">Hủy</a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    