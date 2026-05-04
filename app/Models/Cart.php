<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
	public $items = null;  //$items là mảng liên hợp, cụ thể $items=array("product_id"=>array("qty","price","item")); ->item lại là 1 mảng Product
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	//thêm 1 mặt hàng item có id cụ thể vào giỏ hàng
	public function add($item, $id){
        $price = $item->promotion_price == 0 ? $item->unit_price : $item->promotion_price;
		$mathang = ['qty'=>0, 'price' => $price, 'item' => $item];
		//$mathang: lưu số lượng, tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//qty: số lượng của 1 item (mặt hàng) trong giỏ hàng
		//price: tổng tiền của 1 item (mặt hàng) trong giỏ hàng
		//item: là mặt hàng trong giỏ hàng
		if($this->items){ //nếu items != null tức có mặt hàng trong cart thì
			if(array_key_exists($id, $this->items)){ //array_key_exists() là hàm kiểm tra id của item (mặt hàng) được thêm vào đã có trong giỏ hàng chưa? nếu có thì lấy về item(mặt hàng) có id này rồi lưu vào biến $mathang 
				$mathang = $this->items[$id];
			}
		}
		$mathang['qty']++;  //tăng số lượng của item vừa thêm lên 1
		$mathang['price'] = $price * $mathang['qty'];
		$this->items[$id] = $mathang;
		$this->totalQty++;
		$this->totalPrice += $price;
	}

	//thêm nhiều mặt hàng item có số lượng soluong có id cụ thể vào giỏ hàng
	public function addMany($item, $id, $soluong){
        $price = $item->promotion_price == 0 ? $item->unit_price : $item->promotion_price;
		$mathang = ['qty'=>0, 'price' => $price, 'item' => $item];
		if($this->items){ 
			if(array_key_exists($id, $this->items)){ 
				$mathang = $this->items[$id];
			}
		}
		$mathang['qty'] = $mathang['qty'] + $soluong; 
		$mathang['price'] = $price * $mathang['qty'];
		$this->items[$id] = $mathang;
		$this->totalQty += $soluong;
		$this->totalPrice += $price * $soluong;
	}

	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
        $price = $this->items[$id]['item']->promotion_price == 0 ? $this->items[$id]['item']->unit_price : $this->items[$id]['item']->promotion_price;
		$this->items[$id]['price'] -= $price;
		$this->totalQty--;
		$this->totalPrice -= $price;
		if($this->items[$id]['qty'] <= 0){
			unset($this->items[$id]);  //hàm unset(): xóa giá trị của biến
		}
	}

	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}

    public function updateItem($id, $qty){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        
        $this->items[$id]['qty'] = $qty;
        $price = $this->items[$id]['item']->promotion_price == 0 ? $this->items[$id]['item']->unit_price : $this->items[$id]['item']->promotion_price;
        $this->items[$id]['price'] = $qty * $price;
        
        $this->totalQty += $this->items[$id]['qty'];
        $this->totalPrice += $this->items[$id]['price'];
        
        if($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
}
