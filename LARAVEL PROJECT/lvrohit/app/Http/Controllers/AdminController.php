<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagories;//fetch data from catagories table
use App\Models\products;//fetch data from products table
use App\Models\order;//fetch data from order table

class AdminController extends Controller
{
    /**
     * Display the add categories form
     * Returns the view for adding a new category
     */
    function addCatagories(){
        return view('admin.addcatagories');
    }

    /**
     * Display all categories
     * Retrieves all categories from the database and passes them to the view
     */
    function viewCatagories(){
        //return catagories::all();
        $catagories = catagories::all();
        return view('admin.viewcatagories',compact('catagories'));
    }

    /**
     * Store a new category in the database
     * Accepts POST request with category name and saves it
     */
    function postAddCatagories(request $rq){
        //return $rq->input();
        $cat =new catagories;
        $cat-> cat_name = $rq -> catagories;
        $cat-> save();
        return redirect()->route('admin.viewcatagories');//->with('msg','catagories added successfully');
    }

    /**
     * Delete a category by ID
     * Finds the category, deletes it from database, and redirects back
     * Shows success or error message based on operation result
     */
    function deletecatagories($id){
        $delcat = catagories::findOrfail($id);
        $delcat-> delete();
        return redirect()-> back()->with('delmsg','catagories deleted successfully');
    }
    
    /**
     * Update a category by ID
     * Finds the category and returns the update view with category data
     */
    function updatecatagories($id){
        $catagories = catagories::findOrfail($id);
        return view('admin.updatecatagories', compact('catagories'));
    }
    /**
     * Save updated category data
     * Accepts POST request with updated category name and saves changes
     */
    function posteditcatagories(request $rq, $id){
        $catagories = catagories::findOrfail($id);
        $catagories-> cat_name = $rq -> catagories;
        $catagories-> save();
        return redirect()->route('admin.viewcatagories')->with('upmsg','catagories updated successfully');
    }

    /**
     * Display the add product form
     * Returns the view for adding a new product
     */
    function addProduct(){
        $catagories = catagories::all();
        return view('admin.addproduct', compact('catagories'));
    }

    /**
     * Display all products
     * Returns the view for viewing all products
     */
    function viewProduct(){
        //$products = products::all();
        $products = products::paginate(3);
        return view('admin.viewproduct', compact('products'));
    }

    /**
     * Store a new product in the database
     * Accepts POST request with product details and saves it
    */
    function postAddProduct(request $rq){
        //return $rq->input();
        $product =new products;
        $product-> product_name = $rq -> product_name;
        $product-> product_price = $rq -> product_price;
        $product-> product_desc = $rq -> product_desc;
        $product-> catagories = $rq -> catagories;
        $image = $rq -> product_image;
        if($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $product-> product_image = $imagename;
                $rq->product_image->move('images',$imagename);
            }
        $product-> save();
        return redirect()->route('admin.viewproduct')->with('msg','Product added successfully');
    }

    /* Update product by ID
     * Finds the product and returns the update view with product data
    */
    function updateproduct($id){
        $product = products::findOrfail($id);
        $catagories = catagories::all();
        return view('admin.updateproduct', compact('product','catagories'));
    }

    /* Save updated product data
     * Accepts POST request with updated product details and saves changes
    */
    function posteditproduct(request $rq, $id){
        $product = products::findOrfail($id);
        $product-> product_name = $rq -> product_name;
        $product-> product_price = $rq -> product_price;
        $product-> product_desc = $rq -> product_desc;
        $product-> catagories = $rq -> catagories;
        $image = $rq -> product_image;//check if new image is uploaded or not if new image is uploaded then update the image otherwise keep the old image
        if($image)
            {
                // Delete old image if exists
                $oldImagePath = public_path('images/' . $product->product_image);//check if old image exists then delete it
                if(file_exists($oldImagePath)){
                    unlink($oldImagePath);
                }
                // Save new image and update product image field with new image name 
                $imagename = time().'.'.$image->getClientOriginalExtension();//generate unique image name using current timestamp and original image extension
                $product-> product_image = $imagename;
                $rq->product_image->move('images',$imagename);//move new image to images folder in public directory
            }
        $product-> save();
        return redirect()->route('admin.viewproduct')->with('upmsg','Product updated successfully');
    }
    /* Delete product by ID
     * Finds the product, deletes it from database, and redirects back
     * Shows success message after deletion
    */
    function deleteproduct($id){
        $delproduct = products::findOrfail($id);//find product by id and delete it from database and also delete the product image from images folder in public directory
        
        // Delete image if exists
        $imagePath = public_path('images/' . $delproduct->product_image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        
        $delproduct-> delete();
        return redirect()-> back()->with('delmsg','Product deleted successfully');
    }   
    /* Search products by name, category, or description
     * Accepts POST request with search query and returns matching products
    */
    function postsearchproduct(Request $rq){
            //return $rq->input(); 
            $products = products::where('product_name', 'like', '%' . $rq->search. '%')->orwhere('catagories', 'like', '%' . $rq->search. '%')->orwhere('product_desc', 'like', '%'.$rq->search.'%')->paginate(3);
            return view('admin.viewproduct', compact('products'));
    }
    /* View all orders
     * Retrieves all orders from the database and returns the view with order data
    */public function allorder()
    {
        $orders = Order::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('order_id');

        return view('admin.allorder', compact('orders'));
    }
    public function updateStatus(Request $request, $order_id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        Order::where('order_id', $order_id)
            ->update([
                'status' => $request->status
            ]);

        return back()->with('success', 'Order status updated successfully.');
    }

}
