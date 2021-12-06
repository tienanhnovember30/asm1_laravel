<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="container">
    <form action="" method="post">
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
                <div class="form-group">
                    <label for="">Giá vé</label>
                    <input type="text" name="travel_fee" class="form-control" placeholder="">
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