<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Slide;
use App\Models\Cart;
use App\Models\User;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Wishlist;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //hàm trả về trang chủ
    public function getIndex(){
        $slides= Slide::all();
        $new_products= Product::where('new',1)->paginate(8);
        $top_products= Product::where('top',1)->paginate(8);
        $promotion_products= Product::where('promotion_price','<>',0)->paginate(4);
        $all_products = Product::paginate(8);
       
        return view('trangchu',compact('slides','new_products','top_products','promotion_products', 'all_products'));
    }

    //hàm trả về chi tiết sản phẩm
    public function getChiTiet($sanpham_id){
        $sanpham=Product::find($sanpham_id);
        return view('chitiet',compact('sanpham'));
    }

    public function getCategory($id){
        $category = \App\Models\Category::find($id);
        $products = Product::where('id_type', $id)->paginate(8);
        return view('loai_sanpham', compact('category', 'products'));
    }

    //thêm 1 sản phẩm có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
    public function addToCart(Request $request,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('gio_hang');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('gio_hang', ['item_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
    }

    public function getSignin(){
        return view('dangky');
    }

    public function postSignin(Request $req){
        $req->validate(
        ['email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            'repassword'=>'required|same:password'
        ],
        ['email.required'=>'Vui lòng nhập email',
        'email.email'=>'Không đúng định dạng email',
        'email.unique'=>'Email đã có người sử dụng',
        'password.required'=>'Vui lòng nhập mật khẩu',
        'repassword.same'=>'Mật khẩu không giống nhau',
        'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]);

        $user=new User();
        $user->full_name=$req->fullname;
        $user->name=$req->fullname;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->level=3;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $user->save();
        return redirect()->back()->with('success','Tạo tài khoản thành công');
    }

    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $req){
        $req->validate(
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]
        );
        $credentials=['email'=>$req->email,'password'=>$req->password];
        if(Auth::attempt($credentials)){
            return redirect('/trangchu')->with(['flag'=>'alert','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('banhang.index');
    }

    public function getSearch(Request $req){
        $product = Product::where('name', 'like', '%'.$req->key.'%')
                            ->orWhere('unit_price', $req->key)
                            ->get();
        return view('search', compact('product'));
    }

    public function delCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function updateCart(Request $req, $id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateItem($id, $req->qty);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('dat_hang');
    }

    public function postCheckout(Request $req){
        $req->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        
        $total = $cart->totalPrice;
        $discount = 0;
        if($req->coupon) {
            $coupon = Coupon::where('code', $req->coupon)->first();
            if($coupon) {
                if($coupon->type == 'percentage') {
                    $discount = ($total * $coupon->value) / 100;
                } else {
                    $discount = $coupon->value;
                }
            }
        }
        
        $shipping_fee = 30000;
        $bill->total = $total - $discount + $shipping_fee;
        $bill->discount = $discount;
        $bill->shipping_fee = $shipping_fee;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->status = 'mới';
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        
        if($customer->email) {
            \Illuminate\Support\Facades\Mail::to($customer->email)->send(new \App\Mail\OrderSuccess($bill));
        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }
    public function getContact(){
        return view('lienhe');
    }

    public function postContact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        $contact = new \App\Models\Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->status = 'chưa liên hệ';
        $contact->save();
        
        return redirect()->back()->with('thongbao', 'Cảm ơn bạn đã liên hệ với chúng tôi!');
    }
    public function getProfile(){
        if(!Auth::check()) return redirect()->route('getlogin');
        $user = Auth::user();
        $customers = Customer::where('email', $user->email)->pluck('id');
        $bills = Bill::whereIn('id_customer', $customers)->orderBy('id', 'DESC')->get();
        return view('profile', compact('user', 'bills'));
    }

    public function postProfile(Request $request){
        if(!Auth::check()) return redirect()->route('getlogin');
        $user = User::find(Auth::id());
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('thongbao', 'Cập nhật thông tin thành công');
    }

    public function getWishlist(){
        if(!Auth::check()) return redirect()->route('getlogin');
        $wishlist = Wishlist::where('id_user', Auth::id())->get();
        return view('wishlist', compact('wishlist'));
    }

    public function addToWishlist($id){
        if(!Auth::check()) return redirect()->route('getlogin');
        $check = Wishlist::where('id_user', Auth::id())->where('id_product', $id)->first();
        if(!$check) {
            $wishlist = new Wishlist();
            $wishlist->id_user = Auth::id();
            $wishlist->id_product = $id;
            $wishlist->save();
            return redirect()->back()->with('thongbao', 'Đã thêm vào sản phẩm yêu thích');
        }
        return redirect()->back()->with('thongbao', 'Sản phẩm đã có trong danh sách yêu thích');
    }

    public function delWishlist($id){
        if(!Auth::check()) return redirect()->route('getlogin');
        $wishlist = Wishlist::where('id_user', Auth::id())->where('id_product', $id)->first();
        if($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('thongbao', 'Đã xóa khỏi sản phẩm yêu thích');
        }
        return redirect()->back();
    }
}
