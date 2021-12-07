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
                                    <label for="">Biển số xe</label>
                                    <input type="text" name="plate_number" value="{{$model->plate_number}}" class="form-control" placeholder="">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Tên tài xế</label>
                                    <input type="text" name="owner" value="{{$model->owner}}" class="form-control" placeholder="">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <div class="row">
                                        <div class="col-6 offset-3">
                                            <img src="{{asset($model->plate_image)}}" alt="" class="img-thumbnail">
                                        </div>
                                        <br>
                                    </div>
                                    <input type="file" name="plate_image" class="form-control" placeholder="">
                                    @error('plate_image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Giá vé</label>
                                    <input type="text" name="travel_fee" value="{{$model->travel_fee}}" class="form-control" placeholder="">
                                </div>
                               

                            </div>
                        
                            <div class="col-12 d-flex justify-content-end">
                                <br>
                                <a href="{{route('car.index')}}" class="btn btn-danger">Hủy</a>
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