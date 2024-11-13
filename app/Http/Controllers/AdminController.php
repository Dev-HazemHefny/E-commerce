<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));

    }
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Added Succefully');
        return redirect()->back();
    }
    public function delete_category($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addWarning('Category Deleted');
        return redirect()->back();
    }
    public function edit_category($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id)
    {
        $data = Category::findOrFail($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Updated Succefully');
        return redirect('/view_category');
    }
    public function add_product()
    {

        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request)
    {
        $data =new Product;
        $data->title = $request->title;
        $data->descreption = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image=$request->image;
        if($image)
        {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Succefully');
        return redirect()->back();
    }
    public function view_product()
    {
        $products = Product::paginate(1);
         return view('admin.view_product',compact('products'));
    }
    public function delete_product($id)
    {
        $data = Product::findOrFail($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addWarning(message: 'Product Deleted');
        return redirect()->back();
    }
    public function update_product($id)
    {

        $data = Product::findOrFail($id);
        $categories=Category::all();
        return view('admin.update_page',compact('data','categories'));
    }
    public function edit_product(Request $request , $id)
    {
        $data = Product::findOrFail($id);
        $data->title = $request->title;
        $data->descreption = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image=$request->image;
        if($image)
        {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Succefully');
        return redirect('/view_product');
    }
    public function product_search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('products'));
    }
    public function view_orders()
    {
        $data = Order::all();
        return view('admin.order',compact('data'));
    }
    public function order_accepted($id)
    {
        $data = Order::findOrFail($id);
        $data->status = 'Order Accepted' ;
        $data->save();
        return redirect('view_orders');
    }
    public function order_delivered($id)
    {
        $data = Order::findOrFail($id);
        $data->status = 'Order Delivered' ;
        $data->save();
        return redirect('view_orders');
    }
    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
