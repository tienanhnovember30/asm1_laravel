@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm mới</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Biển số xe</label>
                                <input type="text" name="plate_number" class="form-control" placeholder="">
                              </div>

                              <div class="form-group">
                                <label for="">Tên tài xế</label>
                                <input type="text" name="owner" class="form-control" placeholder="">
                            </div>
                        
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" name="plate_image" class="form-control" placeholder="">
                </div>
                        </div>
                        <div class="col-6">
                        
                <div class="form-group">
                    <label for="">Giá vé</label>
                    <input type="text" name="travel_fee" class="form-control" placeholder="">
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