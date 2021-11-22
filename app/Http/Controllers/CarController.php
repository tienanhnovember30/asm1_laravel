<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request){
        $pageSize=10;
        $column_names=[
            'plate_number'=>'Biển số xe',
            'owner'=>'Tên tài xế',
            'travel_fee'=>'Giá vé',
            'plate_image'=>''


        ];
        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];
        $cars = Car::all();
        $keyword = $request->has('keyword') ? $request->keyword : "";     
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "name";
        $query = Car::where('name', 'like', "%$keyword%");
        if($rq_order_by == 'asc'){
            $query->orderBy($rq_column_names);
        }else{
            $query->orderByDesc($rq_column_names);
        }
        return view('cars.index', compact('cars', 'column_names', 'order_by'));
    }
    
    public function remove($id){
        $model = Car::find($id);
        if(!empty($model->plate_image)){
            $PlimgPath = str_replace('storage/', 'public/', $model->plate_image);
            Storage::delete($PlimgPath);
        }
        $model->delete();
        
        return redirect(route('car.index'));
    }
}
