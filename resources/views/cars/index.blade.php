<table>
    <thead>
        <th>ID</th>
        <th>Biển số xe</th>
        <th>Tên tài xế</th>
        <th>Giá vé</th>
        <th>Ảnh</th>
        <th>
            <a href="">Add new</a>
        </th>
    </thead>
    <tbody>
        @foreach ($cars as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->plate_number}}</td>
                <td>{{$item->owner}}</td>
                <td>{{$item->travel_fee}}</td>
                <td>{{$item->plate_image}}</td>
                <td>
                    <a href="{{route('car.edit', ['id' => $item->id])}}">Edit</a>
                    <a href="{{route('car.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>