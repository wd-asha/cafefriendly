<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\ProductFilter;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* ----------------------- */
    /*    Show all products    */
    /* ----------------------- */
    public function index()
    {
        $products = Product::latest()->orderBy('updated_at', 'desc')->paginate(5);
        $trashed = Product::onlyTrashed()->orderBy('updated_at', 'desc')->paginate(5);
        $categories = Category::all();
        /* to the coffees list page */
        return view('admin.product.index', compact('products', 'categories', 'trashed'));
    }
    /*  end show all products  */

    /* ---------------------------------------- */
    /* Show all equipments with filter Category */
    /* ---------------------------------------- */
    public function indexS(ProductFilter $request){
        $products = Product::filter($request)->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        $trashed = Product::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.product.index', compact('products', 'categories', 'trashed'));
    }
    /* end show all equipments with filter category */

    /* ------------------------------------ */
    /* Show all products with filter Amount */
    /* ------------------------------------ */
    public function indexA(ProductFilter $request){
        $products = Product::filter($request)->paginate(10);
        $categories = Category::all();
        $trashed = Product::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('admin.product.index', compact('products', 'categories', 'trashed'));
    }
    /* end show all products with filter amount */

    /* ------------------------ */
    /*    Create new product    */
    /* ------------------------ */
    public function create()
    {
        $categories = Category::all();
        /* show page with form */
        return view('admin.product.create', compact('categories'));
    }
    /*  end create new product  */

    /* ------------------- */
    /*   Save new product  */
    /* ------------------- */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'product_code' => 'required',
            'product_title' => 'required',
            'product_weight' => 'required',
            'product_price' => 'required',
            'category_id' => 'required',
            'product_image' => 'required',
        ],
            [
                'product_code.required' => 'Ошибка: Код обязателен для заполнения',
                'product_title.required' => 'Ошибка: Наименование обязательно для заполнения',
                'product_weight.required' => 'Ошибка: Вес обязателен для заполнения',
                'product_price.required' => 'Ошибка: Цена обязательна для заполнения',
                'category_id.required' => 'Ошибка: Необходимо выбрать категорию',
                'product_image.required' => 'Ошибка: Необходимо выбрать фото',
            ]);
        /* preparing the data that came from the form */
        $data = array();
        $data['product_title'] = $request->product_title;
        $data['category_id'] = $request->category_id;
        $data['product_code'] = $request->product_code;
        $data['product_price'] = $request->product_price;
        $data['product_weight'] = $request->product_weight;
        $data['product_about'] = $request->product_about;
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        if($request->product_status) {
            $data['product_status'] = 1;
        }else{
            $data['product_status'] = 0;
        };
        /* preparing the image for saving */
        $image_one = $request->product_image;
        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            if($request->category_id === 1) {
                Image::make($image_one)->resize(155, 155)->save('media/product/' . $image_one_name);}
            else {
                Image::make($image_one)->resize(155, 124)->save('media/product/' . $image_one_name);}
            $data['product_image'] = 'media/product/' . $image_one_name;
        }
        /* save new product */
        Product::create($data);
        $notification = array(
            'message' => 'Новый продукт создан',
            'alert-type' => 'success'
        );
        /* to the products list page */
        return Redirect()->route('admin.products')->with($notification);
    }
    /*  end save new product  */

    /* -------------------- */
    /*   Activate product   */
    /* -------------------- */
    public function active($id)
    {
        Product::find($id)->update([
            'product_status' => 1
        ]);
        $notification = array(
            'message' => 'Продукт активирован',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end activate product */

    /* ---------------------- */
    /*   Inactivate product   */
    /* ---------------------- */
    public function inactive($id)
    {
        Product::find($id)->update([
            'product_status' => 0
        ]);
        $notification = array(
            'message' => 'Продукт дезактивирован',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end inactivate product */

    /* ---------------------- */
    /*      Edit product      */
    /* ---------------------- */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        /* show the coffee edit page */
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /* ----------------- */
    /*  Trashed product  */
    /* ----------------- */
    public function delete($id)
    {
        Product::find($id)->delete();
        $notification = array(
            'message' => 'Продукт в корзине',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end trashed product */

    /* ------------------------- */
    /*      Destroy product      */
    /* ------------------------- */
    public function destroy($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $image_one = $product->product_image;
        unlink($image_one);

        Product::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Продукт удален',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy product -- */

    /* ------------------------- */
    /*      Restore product      */
    /* ------------------------- */
    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Продукт восстановлен',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -- end restore product -- */

    /* ----------------------------- */
    /*      Show single product      */
    /* ----------------------------- */
    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.show', compact('product', 'categories'));
    }
    /* -- end show single product -- */

    /* ------------------------------ */
    /*      Update product image      */
    /* ------------------------------ */
    public function updatePhoto(Request $request, $id)
    {
        $old_image_one = $request->old_image_one;
        $image_one = $request->file('image_one');
        $data = array();
        if($image_one) {
            /* delete the previous image if there was one */
            if($old_image_one !== 'media/product/empty-image.png') {
                unlink($old_image_one);
            };
            /* prepare and save a new image */
            $image_one = $request->file('image_one');
            $location = 'media/product/';
            $name_image_one = hexdec(uniqid());
            $ext_image = strtolower($image_one->getClientOriginalExtension());
            $full_image = $location.$name_image_one.'.'.$ext_image;
            $image_one->move($location, $full_image);
            $data['product_image'] = $full_image;
            /* updating product */
            Product::find($id)->update($data);
            $notification = array(
                'message' => 'Изображение обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Изображение не обновлено',
                'alert-type' => 'error'
            );
        }
        /* to the products list page */
        return Redirect()->route('admin.products')->with($notification);
    }
    /* ---- end update product image ---- */

    /* ------------------------- */
    /*       Update product      */
    /* ------------------------- */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['product_title'] = $request->product_title;
        $data['category_id'] = $request->category_id;
        $data['product_code'] = $request->product_code;
        $data['product_price'] = $request->product_price;
        $data['product_weight'] = $request->product_weight;
        $data['product_about'] = $request->product_about;
        if($request->product_status) {
            $data['product_status'] = 1;
        }else{
            $data['product_status'] = 0;
        };
        /* update product */
        $update = Product::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Продукт обновлен',
                'alert-type' => 'success'
            );
            /* to the products list page */
            return Redirect()->route('admin.products')->with($notification);
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
            /* to the products list page */
            return Redirect()->route('admin.products')->with($notification);
        }
    }
    /* ---- end update product ---- */

    /* ------------------------------------------ */
    /*   Change in quantity of product available   */
    /* ------------------------------------------ */
    public function amount(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['product_amount'] = (int)$request->product_amount;
        /* update quantity product */
        $update = Product::find($id)->update($data);
        if($update && $data['product_amount'] != NULL) {
            $notification = array(
                'message' => 'Количество обновлено',
                'alert-type' => 'success'
            );
            /* to the products list page */
            return Redirect()->route('admin.products')->with($notification);
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
            /* to the coffees list page */
            return Redirect()->route('admin.products')->with($notification);
        }
    }
    /* end change in quantity of product available */
}
