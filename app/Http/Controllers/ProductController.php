<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // product list
    public function list(){
        $pizzas = Product::select('products.*','categories.name as category_name')
        ->when(request('key'),function($query){
            $query->where('products.name','like','%'.request('key').'%');
        })
        ->leftJoin('categories','products.category_id','categories.id')
        ->orderBy('products.created_at','desc')
        ->paginate(3);
        $pizzas->appends(request()->all());
        return view('admin.product.stationeryList',compact('pizzas'));
    }

    // direct pizza create page
    public function createPage(){
        $categories= Category::select('id','name')->get();
        return view('admin.product.create',compact('categories'));
    }

    // delete pizza
    public function delete($id){
        Product::where('id',$id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess'=>'Product has been successfully Deleted']);
    }

    // edit pizza (for view)
    public function edit($id){
        $pizza=Product::select('products.*','categories.name as category_name')
        ->leftJoin('categories','products.category_id','categories.id')
        ->where('products.id',$id)->first();
        return view('admin.product.edit',compact('pizza'));
    }

    // update page pizza
    public function updatePage($id){
        $pizza=Product::where('id',$id)->first();
        $category=Category::get();
        return view('admin.product.update',compact('pizza','category'));
    }

    // create product
    public function create(Request $request){
        $this->productValidationCheck($request,'create');
        $data=$this->requestProductInfo($request);

        $fileName = uniqid() . $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public/', $fileName);
        $data['image'] = $fileName;

        Product::create($data);
        return redirect()->route('product#list');
    }
    // update pizza
    public function update(Request $request){
        $this->productValidationCheck($request,'update');
        $data=$this->requestProductInfo($request);

        if($request->hasFile('productImage')){
            $oldImageName = Product::where('id',$request->productId)->first();
            $oldImageName = $oldImageName->image;

            if($oldImageName != null){
                Storage::delete('public/'.$oldImageName);
            }
            $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/',$fileName);
            $data['image'] = $fileName;
        }
        Product::where('id',$request->productId)->update($data);
        return redirect()->route('product#list');
    }

    // request product info
    private function requestProductInfo($request){
        return[
            'category_id' => $request->category,
            'name' => $request->productName,
            'description' => $request->description,
            'price'=>$request->price,
            'waiting_time'=>$request->waitingTime
        ];
    }
    // product validation check
    private function productValidationCheck($request,$action){
        $validationRules=[
            'productName' => 'required|min:5|unique:products,name,'.$request->productId,
            'category' => 'required',
            'description' => 'required|min:10',
            'price' => 'required',
            'waitingTime' => 'required'
        ];
        $validationRules['productImage'] = $action == 'create'? 'required|mimes:jpg,png,jpeg,webp|file': 'mimes:jpg,png,jpeg,webp|file';
        Validator::make($request->all(),$validationRules)->validate();
    }
}
