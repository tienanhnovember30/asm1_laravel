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
            'travel_fee'=>'Giá vé'


        ];
        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];
        $cars = Car::all();
        $keyword = $request->has('keyword') ? $request->keyword : "";     
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "owner";
        $query = Car::where('owner', 'like', "%$keyword%");
        if($rq_order_by == 'asc'){
            $query->orderBy($rq_column_names);
        }else{
            $query->orderByDesc($rq_column_names);
        }
        $cars = $query->paginate($pageSize);
        $cars->appends($request->input());
        $searchDataC = compact('keyword');
        $searchDataC['order_by'] = $rq_order_by;
        $searchDataC['column_names'] = $rq_column_names;

        return view('cars.index', compact('cars', 'column_names', 'order_by','searchDataC'));
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
    public function addFormC(){
        return view('cars.add');
    }
    public function saveAddC(Request $request){
        $model = new Car();
        if($request->hasFile('plate_image')){
            $plimgPath = $request->file('plate_image')->store('cars');
            $plimgPath = str_replace('public/', '', $plimgPath);
            $model->plate_image = $plimgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('car.index'));
    }
    public function editFormC($id){
        $model= Car::find($id);
        if(!$model){
            return back();
        }
        return view('cars.edit');
    }
    public function saveEditC(Request $request, $id){
        $model= Car::find($id);
        if(!$model){
            return back();
        }
        if($request->hasFile('plate_image')){
            Storage::delete($model->plate_image);
            $plimgPath = $request->file('plate_image')->store('cars');
            $plimgPath = str_replace('public/', '', $plimgPath);
            $model->plate_image = $plimgPath;
        }
        $model->fill($request->all());
        $model->save();
        
        return redirect(route('car.index'));


    }
}
