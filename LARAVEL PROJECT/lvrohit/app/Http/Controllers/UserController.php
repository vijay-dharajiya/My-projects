<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;//verify user login or not and usertype admin or user important part after complete UC than write this for authetication
use Barryvdh\DomPDF\Facade\Pdf;// invoice data 
use Illuminate\Http\Request;
use App\Models\catagories;//fetch data from catagories table
use App\Models\products;//fetch data from products table
use App\Models\Order;//fetch data from orders table
use App\Models\productcarts;//fetch data from productcarts table
use App\Models\Wishlist;//fetch data from wishlists table


class UserController extends Controller
{
    /*dashboard*/
    //dashboard function is used to check user login or not and usertype admin or user
    function index(){

        if(Auth::check()&& Auth::user()->usertype=='user'){
            return view('dashboard');
        }
        
        else if(Auth::check()&& Auth::user()->usertype=='admin'){
            return view('admin.dashboard');
        }
    }
    
    /*home*/
    //home function is used to fetch data from products table and display on index page
    function home(){
        //$products = products::all();
        $products = products::all();
        return view('index', compact('products'));
    }
    function shop(){
        $products = products::all();
        return view('shop', compact('products'));
    }
    function contact(){
        return view('contact');
    }

    static function viewCat(){
        return catagories::all();
    }
    /*category products*/
    //categoryProducts function is used to fetch data from products table based on category and display on
    function viewcategory($cat_name)
    {
        $products = Products::where('catagories', $cat_name)->get();

        return view('catagories', compact('products'));
    }

    /*product details*/
    //productsdetails function is used to fetch data from products table and display on productsdetails page
    function productsdetails($id){
        //return $id;
        $products = products::findOrFail($id);
        return view('productsdetails', compact('products'));
    }

    /*add to wishlist*/
    //addtowishlist function is used to add products into wishlist and check if product already in wishlist or not
    //if product already in wishlist then it will display message product already in wishlist
    //if product not in wishlist then it will add product into wishlist and display message product added into wishlist
    function addtowishlist($id){
            $checkwishlist = Wishlist::where('user_id', Auth::id())->where('product_id',$id)->first();
            if($checkwishlist){
                return redirect()->back()->with('cartmsg','Product Already in Wishlist');
            }
        //return $id;
            $prowish = new Wishlist();
            $prowish->user_id = Auth::id();
            $prowish->product_id = $id;
            $prowish->save();
           return redirect()->back()->with('cartmsg','Product Added into Wishlist');
    }

    /*wishlist*/
    //wishlist function is used to fetch data from productcarts table and display on wishlist page
    static function wishcount(){
        if(Auth::check()){
            $wcount = Wishlist::where('user_id', Auth::id())->count();
        }
        else{
            $wcount ='';
        }
        return $wcount;
    }
     /*wish list*/
    //cartlist function is used to fetch data from productcarts table and display on cartlist page
    function wishlist(){
        $wishitems = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist', compact('wishitems'));
    }

    /* remove wishlist*/
    function removewish($id){
        //return $id;
        $cartpro = wishlist::where('user_id', Auth::id())->where('id',$id)->first();
        $cartpro->delete();
        return redirect()->back()->with('cartmsg','Product Removed from wishlist');

    }
    /*add to cart
        addtocart function is used to add products into cart and check if product already in cart or not
        if product already in cart then it will display message product already in cart
        if product not in cart then it will add product into cart and display message product added into cart
    */
    function addtocart($id){
            $checkcart = productcarts::where('user_id', Auth::id())->where('product_id',$id)->first();
            if($checkcart){
                return redirect()->back()->with('cartmsg','Product Already in Cart');
            }
        //return $id;
            $procart = new productcarts();
            $procart->user_id = Auth::id();
            $procart->product_id = $id;
            $procart->save();
           return redirect()->back()->with('cartmsg','Product Added into Cart');
    }
        /*static function cartcount*/
    //cartcount function is used to count number of products in cart and display on cart icon in header
    static function cartcount(){
        if(Auth::check()){
            $count = productcarts::where('user_id', Auth::id())->count();
        }
        else{
            $count ='';
        }
        return $count;
    }
    /*cart list*/
    //cartlist function is used to fetch data from productcarts table and display on cartlist page
    function cartlist(){
        $cartitems = productcarts::where('user_id', Auth::id())->get();
        return view('cartlist', compact('cartitems'));
    }

    /*delete cart product*/
    //deleteCartpro function is used to delete product from cart and display message product removed from cart 
    function deleteCartpro($id){
        //return $id;
        $cartpro = productcarts::where('user_id', Auth::id())->where('product_id',$id)->first();
        $cartpro->delete();
        return redirect()->back()->with('cartmsg','Product Removed from Cart');

    }
    /*search product*/
    //searchproduct function is used to search product from products table based on product name and display
    function searchproduct(Request $rq){
            //return $rq->input(); 
            $product = products::where('product_name', 'like', '%' . $rq->search. '%')->orwhere('catagories', 'like', '%' . $rq->search. '%')->orwhere('product_desc', 'like', '%'.$rq->search.'%')->paginate(3);
            return view('search', compact('product'));
    }
    /*checkout*/
    //checkout function is used to fetch data from productcarts table and display on checkout page
    public function checkout(Request $request)
    {
       $products = $request->products;
        
         // coming from cart page JS fetch         

         if (!$products || count($products) === 0) {
             return redirect()->route('cart')->with('error', 'Cart is empty');
         }
 
         return view('checkout', compact('products'));
    }
    /*place order*/
    //placeOrder function is used to place order and save order details into orders table and display
    function placeOrder(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'payment_method' => 'required'
        ]);

        $orderId = 'ORD'.time(); // unique order number
        $paymentMethod = $request->payment_method;
        if ($paymentMethod === 'COD') 
        {
        
            foreach ($request->products as $item) {
                
                Order::create([
                    'order_id' => $orderId,
                    'user_id' => Auth::id(),
                    'name' => $request->name,
                    'contact' => $request->contact,
                    'address' => $request->address,
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'subtotal' => $item['qty'] * $item['price'],
                    'payment_method' => $request->payment_method,
                    'status' => 'PLACED'
                ]);
            }

            // clear cart
            Productcarts::where('user_id', Auth::id())->delete();
            return view('afterorder',compact('orderId'));
        }
        // ONLINE PAYMENT → PAYU
        return $this->redirectToPayU($request, $orderId);
    }
    // online payment function //

    private function redirectToPayU(Request $request, $orderId)
    {
    // PayU credentials
    $key  = config('services.payu.key');
    $salt = config('services.payu.salt');

    // Order amount calculation
    $amount = 0;
    foreach ($request->products as $item) {
        $amount += ($item['qty'] * $item['price']);
    }

    // PayU requires amount with 2 decimals
    $amount = number_format($amount, 2, '.', '');

    // Mandatory PayU fields
    $txnid       = 'TXN' . time() . rand(1000, 9999);
    $productinfo = 'Order Payment';
    $firstname   = trim($request->name);
    $email       = 'customer@test.com'; // MUST match form email
    $phone       = $request->contact;

    /*
     |--------------------------------------------------------------------------
     | PAYU HASH STRING (DO NOT CHANGE ORDER OR PIPES)
     |--------------------------------------------------------------------------
     | sha512(key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5||||||SALT)
     */
    $hashString =
        $key . '|' .
        $txnid . '|' .
        $amount . '|' .
        $productinfo . '|' .
        $firstname . '|' .
        $email . '|||||||||||' .
        $salt;

    $hash = strtolower(hash('sha512', $hashString));

    // Store order data temporarily (used after PayU success)
    session([
        'payu_order_id' => $orderId,
        'payu_products' => $request->products,
    ]);

    // Redirect to PayU auto-submit page
    return view('payu-redirect', compact(
        'key',
        'txnid',
        'amount',
        'productinfo',
        'firstname',
        'email',
        'phone',
        'hash'
    ));
}

public function payuSuccess(Request $request)
{
    $orderId = session('order_id');
    $products = session('products');

    foreach ($products as $item) {
        Order::create([
            'order_id' => $orderId,
            'user_id' => Auth::id(),
            'product_id' => $item['product_id'],
            'qty' => $item['qty'],
            'price' => $item['price'],
            'subtotal' => $item['qty'] * $item['price'],
            'payment_method' => 'ONLINE',
            'status' => 'PAID'
        ]);
    }

    Productcart::where('user_id', Auth::id())->delete();

    session()->forget(['order_id','products']);

    return redirect()->route('cart')->with('success', 'Order placed successfully');
    }
    public function payuFail()
    {
        return redirect()->route('cart')->with('error', 'Payment failed');
    }
       
    /*my orders*/
    //myOrders function is used to fetch data from orders table based on user id and display on my-orders page and group by order id to display orders in order wise and also fetch data from catagories table to display categories in header
    public function myOrders()
    {  
        $orders = Order::with('product')->where('user_id', auth()->id()) ->orderBy('created_at', 'desc') ->get() ->groupBy('order_id');
       return view('my-orders', compact('orders'));
    }

    /* order remove function*/
    public function removeOrder($order_id)
    {
        Order::where('order_id', $order_id)
            ->where('user_id', auth()->id())
            ->update([
                'status' => 'canceled'
            ]);

        return redirect()->back()->with('success', 'Order canceled  successfully.');
    }
    /* invoice function*/
    public function invoice($orderId)
    {
        $orders = Order::with('product')   
        ->where('order_id', $orderId)
        ->get();

        if ($orders->isEmpty()) {
            abort(404);
        }

        $customer = $orders->first();

        $total = $orders->sum('subtotal');

        $pdf = Pdf::loadView('invoice-pdf', [
            'orders' => $orders,
            'customer' => $customer,
            'total' => $total,
            'orderId' => $orderId
        ]);

        return $pdf->stream("Invoice-{$orderId}.pdf");
    }



}
