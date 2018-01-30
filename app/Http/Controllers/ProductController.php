<?php
namespace App\Http\Controllers;
use File;
use Storage;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function __construct()
  { $this->middleware('auth')->except(['index', 'show']); }

  public function index()
  {
    $products = Product::orderBy('name')->paginate(12);
    return view('products.index', compact('products'));
  }

  public function create()
  { return view('products.create'); }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'        => 'required|min:5|max:100',
      'price'       => 'required|numeric|min:10|max:999999.99',
      'image'       => 'required|image',
      'description' => 'required'
    ]);
    $img = $request->image;
    $img_new_name = time().$img->getClientOriginalName();
    $path = Storage::putFileAs('products',
                               $request->file('image'),
                               $img_new_name);
    Product::create([
      'name'        => $request->name,
      'price'       => $request->price,
      'image'       => $path,
      'description' => $request->description
    ]);
    return redirect()->route('products.index')
                     ->with(['success'=>'Product successfully added.']);
  }

  public function show(Product $product)
  { return view('products.show', compact('product')); }

  public function edit(Product $product)
  { return view('products.edit', compact('product')); }

  public function update(Request $request, Product $product)
  {
    $this->validate($request, [
      'name'        => 'required|min:5|max:100',
      'price'       => 'required|numeric|min:10|max:999999.99',
      'description' => 'required'
    ]);
    if($request->hasFile('image'))
    {
      if((Storage::disk('local')->exists($product->image)) &&
         ($product->image != 'products/default_product.jpg'))
      {
        Storage::delete($product->image);
      }
      $img = $request->image;
      $img_new_name = time().$img->getClientOriginalName();
      $product->image = Storage::putFileAs('products',
                                           $request->file('image'),
                                           $img_new_name);
    }
    $product->name        = $request->name;
    $product->price       = $request->price;
    $product->description = $request->description;
    $product->save();
    return redirect()->route('products.index')
                     ->with(['success'=>'Product successfully updated.']);
  }

  public function destroy(Product $product)
  {
    if((Storage::disk('local')->exists($product->image)) &&
       ($product->image != 'products/default_product.jpg'))
    {
      Storage::delete($product->image);
    }
    $product->delete();
    return redirect()->route('products.index')
                     ->with(['success'=>'Product successfully deleted.']);
  }
}
