<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        $data->category_name = $request->category;

        $data->save();
        
        return redirect()->back()->with('message', 'Category has been added successfully');
    }

    public function delete_category($id)
    {
        Category::destroy($id);

        return redirect()->back()->with('message', 'Category has been deleted successfully');
    }
    /*
    public function delete_category($id)
    {
        $data=category::find($id);

        $data->delete();

        return redirect()->back();
    }
    
    */

     public function view_product()
    {
        $categories = category::all();

        return view('admin.product', compact('categories'));
    }
    
    public function add_product(Request $request)
    {
        $product = new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->title=$request->title;
        $product->category_id=$request->category;
        // $product->image=$request->image;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image=$imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product added successfully');
    }

    public function show_product()
    {
        // ProductController.php
        $products = Product::with('category')->get();

        
        return view('admin.show_product', compact('products'));
    }

     public function delete_product($id)
     {

        $product=Product::find($id);

        $product->delete();

        return redirect()->back()->with('Message', 'Product has been deleted.');

     }

     public function update_product($id)
     {
        $product = Product::find($id);

        $category = Category::all();
        
        return view('admin.update_product', compact('product', 'category'));
     }

     public function product_update_confirm(Request $request, $id)
     {
        $product = Product::find($id);

        $product->title=$request->title;
        
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        
        $product->category_id = $request->category;

        $product->quantity=$request->quantity;
        
        $image=$request->image;

        if ($image)
        {
            
            $imagename = time().'.'.$image->getClientOriginalExtension();
    
            $request->image->move('product', $imagename);
    
            $product->image=$imagename;
        }


        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully');
     }

}
