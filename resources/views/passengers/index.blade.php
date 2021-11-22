<table>
    <thead>
        <th>ID</th>
        <th>Tên hành khách</th>
        <th>Thời gian chạy</th>
        <th>Ảnh hành khách</th>
        <th>Biển số xe</th>
        <th>Tên tài xế</th>
        <th>
            <a href="">Add new</a>
        </th>
    </thead>
    <tbody>
        @foreach ($passengers as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->travel_time}}</td>
                <td>{{$item->avatar}}</td>
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