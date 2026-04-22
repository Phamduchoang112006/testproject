<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $categories = ['Cơm Dĩa', 'Bánh mì', 'Bú phở'];
        $dishesByCategories = [];
        foreach ($categories as $cat) {
            $dishesByCategories[$cat] = Restaurant::where('category', $cat)->get();
        }
        return view('restaurant.index', compact('dishesByCategories'));
    }

    public function create()
    {
        return view('restaurant.create');
    }

    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $data['image'] = 'images/' . $fileName;
        } else {
            $data['image'] = 'https://via.placeholder.com/600x400.png?text=' . urlencode($data['name']);
        }

        Restaurant::create($data);

        return redirect()->route('restaurant.index')->with('success', 'Thêm món ăn thành công!');
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurant.show', compact('restaurant'));
    }
}
