<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRoomRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function create()
    {
        return view('rooms.create');
    }

    public function store(StoreRoomRequest $request)
    {
        $data = $request->validated();
        $data['is_booked'] = $request->has('is_booked');
        
        Room::create($data);

        return redirect()->back()->with('success', 'Thành công! Phòng đã được tạo.');
    }
}
