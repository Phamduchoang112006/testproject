<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;

class OrderController extends Controller
{
    public function getOrderList(){
        $order = Bill::orderBy('id', 'DESC')->get();
        return view('admin.order.list', compact('order'));
    }

    public function getOrderDetail($id){
        $order = Bill::find($id);
        $detail = BillDetail::where('id_bill', $id)->get();
        return view('admin.order.detail', compact('order', 'detail'));
    }

    public function getOrderDelete($id){
        $order = Bill::find($id);
        $order->delete();
        return redirect()->route('admin.getOrderList')->with('thongbao', 'Xóa thành công');
    }
}
