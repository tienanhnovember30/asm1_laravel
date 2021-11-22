<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassengerController extends Controller
{
    public function index(Request $request){
        $pageSize = 10;
        $column_names = [
            'name' => 'Tên hanh khach',
            'avatar'=>'',
            'travel_time' => "Thoi gian"
        ];

        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];

        $keyword = $request->has('keyword') ? $request->keyword : "";
        $car_id = $request->has('car_id') ? $request->car_id : "";
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "name";

        // dd($keyword, $car_id, $rq_column_names, $rq_order_by);
        $query = Passenger::where('name', 'like', "%$keyword%");
        if($rq_order_by == 'asc'){
            $query->orderBy($rq_column_names);
        }else{
            $query->orderByDesc($rq_column_names);
        }

        if(!empty($car_id)){
            $query->where('car_id', $car_id);
        }
        $passengers = $query->paginate($pageSize);
        // giữ lại các giá trị đang tìm kiếm trong link phần trang
        $passengers->appends($request->input());

        $cars = Car::all();
        $searchData = compact('keyword', 'car_id');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;
        return view('passengers.index', compact('passengers', 'cars', 'column_names', 'order_by', 'searchData'));
    }

    public function remove($id){
        $model = Passenger::find($id);
        if(!empty($model->avatar)){
            $avtPath = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($avtPath);
        }
        $model->delete();
        
        return redirect(route('passenger.index'));
    }

    public function addForm(){
        $cars = Car::all();
        return view('passengers.add', compact('cars'));
    }

    public function saveAdd(Request $request){
        $model = new Passenger();
        if($request->hasFile('avatar')){
            $avtPath = $request->file('avatar')->store('public/passengers');
            $avtPath = str_replace('public/', 'storage/', $avtPath);
            $model->avatar = $avtPath;
        }
        
        $model->fill($request->all());
        $model->save();
        return redirect(route('passenger.index'));
    }

    public function editForm($id){
        $model = passenger::find($id);
        if(!$model){
            return back();
        }
        $cars = Car::all();
        return view('passengers.edit', compact('model', 'cars'));
    }

    public function saveEdit(Request $request, $id){
        $model = passenger::find($id);
        if(!$model){
            return back();
        }
        if($request->hasFile('avatar')){
            $oldAvt = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($oldAvt);

            $avtPath = $request->file('avatar')->store('public/passengers');
            $avtPath = str_replace('public/', 'storage/', $avtPath);
            $model->avatar = $avtPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('passenger.index'));
    }

}