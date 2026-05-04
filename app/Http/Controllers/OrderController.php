<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\BillDetail;

class OrderController extends Controller
{
    public function getOrderList(Request $request){
        $status = $request->query('status', 'mới');
        $order = Bill::where('status', $status)->orderBy('id', 'DESC')->get();
        return view('admin.order.list', compact('order', 'status'));
    }

    public function getOrderDetail($id){
        $order = Bill::find($id);
        $detail = BillDetail::where('id_bill', $id)->get();
        return view('admin.order.detail', compact('order', 'detail'));
    }

    public function postUpdateStatus(Request $request, $id){
        $order = Bill::find($id);
        $order->status = $request->status;
        $order->save();
        
        if($order->customer && $order->customer->email) {
            \Illuminate\Support\Facades\Mail::to($order->customer->email)->send(new \App\Mail\OrderStatusUpdated($order));
        }
        
        return redirect()->back()->with('thongbao', 'Cập nhật trạng thái thành công');
    }

    public function getOrderDelete($id){
        $order = Bill::find($id);
        if($order) {
            BillDetail::where('id_bill', $id)->delete();
            $order->delete();
        }
        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }
}
