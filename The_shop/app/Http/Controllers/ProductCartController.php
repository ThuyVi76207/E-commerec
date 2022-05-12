<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;
use mysql_xdevapi\Table;

class ProductCartController extends Controller
{
    private $category;
    private $product;
    private $productImage;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Customer $customer)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->customer = $customer;
    }
    public function listproduct()
    {
        $categories = DB::select('select name from categories where parent_id = 0');
        $product = $this->product->all();
        return view('products', ['categories' => $categories], compact('product'));
    }
    public function detailproducts($id)
    {
        $products = DB::table('products')->where('id',$id)->first();
        $productImage = DB::table('product_images')->where('product_id', $id)->get();
        return view('detailproduct', ['products'=>$products],compact('productImage'));
    }
    public function addToCart($id)
    {
//        session()->forget('cart');
//        print_r(session()->get('cart'));
//        dd('end');
       //session()->flush();

        $product = $this->product->find($id);
        $carts = session()->get('carts');
//        $carts = array();
        if(isset($carts[$id])) {
            $carts[$id]['quantity'] = $carts[$id]['quantity'] + 1;
        } else {
            $carts[$id] = [
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=> 1,
                'feature_image_path' => $product->feature_image_path
            ];
        }
        session()->put('carts',$carts);
//        session()->push('carts', $carts);
        session()->save();
        return response()->json([
            'code'=>200,
            'message'=>'success'
            ], 200);
    }
    public function showCart()
    {
        $carts = session()->get('carts');
        //print_r(session()->get('carts'));
        return view('admin.product.cart', compact('carts'));
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity)
        {
            $carts = session()->get('carts');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('carts', $carts);
            $carts = session()->get('carts');
            $cartComponent = view('admin.product.cart', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }

    public function deleteCart(Request $request)
    {
        if ($request->id)
        {
            $carts = session()->get('carts');
            unset($carts[$request->id]);
            session()->put('carts', $carts);
            $carts = session()->get('carts');
            $cartComponent = view('admin.product.cart', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'code' => 200], 200);
        }
    }

    public function orderInfo()
    {
        $total = 0;
        $carts = session()->get('carts');
        foreach ($carts as $cartitem)
        {
            $total += $cartitem['quantity'] * $cartitem['price'];
        }
        return view('orderinfo', compact('carts', 'total'));
    }

    public function sendMail(Request $request)
    {
        $this->customer->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $address =  $request->address;
        $carts = session()->get('carts');
        Mail::send('email',compact('name', 'phone', 'address', 'carts'), function ($email) use ($request, $name) {
            $email -> subject('HÓA ĐƠN THANH TOÁN W-BREAK');
            $email -> to($request->email, $name);
        });
        $carts = session()->get('carts');
        return view('admin.product.cart',compact('carts'));
    }

}
