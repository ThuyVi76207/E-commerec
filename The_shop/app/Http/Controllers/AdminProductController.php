<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Component\Recusive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Http\Requests\ProductAddRequest;
use Storage;
use DB;
class AdminProductController extends Controller
{
    private $category;
    private $product;
    private $productImage;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $products = $this->product->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id='');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request)
    {   
        //Laravel5 Database check
        try {     
                DB::beginTransaction();
                $fileName = "";

                $dataProduct = [
                    'name' => $request->name,
                    'price' => $request->price,
                    'content' => $request->content, 
                    'user_id'=> auth()->id(), 
                    'category_id' => $request->category_id,
                ];

                if($request->hasFile('feature_image_path'))
                {
                    $file = $request->feature_image_path;
                    $fileName = $file->getClientOriginalName();
                    $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('feature_image_path')->storeAs('public/product/' . auth()->id(), $fileNameHash);
                    $dataProduct['feature_image_name'] = $fileName;
                    $dataProduct['feature_image_path'] = Storage::url($path);
                }

                $product = $this->product->create($dataProduct);
                if ($request->hasFile('image_path')){
                    foreach ($request->image_path as $file){
                        $fileNames = $file->getClientOriginalName();
                        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                        $filePath = $file->storeAs('public/product/' . auth()->id(), $fileNameHash);
                        
                            $this->productImage->create([
                                'product_id' => $product->id,
                                'image_path' => Storage::url($filePath),
                                'image_name' => $fileNames
                            ]);
                        }
                    }

                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagsId[] = $tagInstance->id;
                }
                $product->tags()->attach($tagsId);
                DB::commit();
                return redirect()->route('product.index');

        } catch (\Exception $exception) {
            // Neu co loi xay ra trong qua trinh nhap du lieu -> tra ve Rollback
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }

    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {    
        try {     
                DB::beginTransaction();
                $fileName = "";

                $dataProductUpdate = [
                    'name' => $request->name,
                    'price' => $request->price,
                    'content' => $request->content, 
                    'user_id'=> auth()->id(), 
                    'category_id' => $request->category_id,
                ];

                if($request->hasFile('feature_image_path'))
                {
                    $file = $request->feature_image_path;
                    $fileName = $file->getClientOriginalName();
                    $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('feature_image_path')->storeAs('public/product/' . auth()->id(), $fileNameHash);
                    $dataProductUpdate['feature_image_name'] = $fileName;
                    $dataProductUpdate['feature_image_path'] = Storage::url($path);
                }
            

                $product = $this->product->find($id)->update($dataProductUpdate);
                $product = $this->product->find($id);

                if ($request->hasFile('image_path')){
                    $this->productImage->where('product_id', $id)->delete();
                    foreach ($request->image_path as $file){
                        $fileNames = $file->getClientOriginalName();
                        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                        $filePath = $file->storeAs('public/product/' . auth()->id(), $fileNameHash);
                        
                            $this->productImage->create([
                                'product_id' => $product->id,
                                'image_path' => Storage::url($filePath),
                                'image_name' => $fileNames
                            ]);
                        }
                    }

                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagsId[] = $tagInstance->id;
                }
                $product->tags()->sync($tagsId);
                DB::commit();
                return redirect()->route('product.index');

        } catch (\Exception $exception) {
            // Neu co loi xay ra trong qua trinh nhap du lieu -> tra ve Rollback
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function delete($id) {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function getSearch(Request $request){
        $product = Product::where('name','like', '%'.$request->key.'%')
                            ->orWhere('price', $request->key)
                            ->get();
        return view('admin.product.search', compact('product'));
    }

    public function categoryProduct($id){
        //$categories = Category::find($id);
        $this->category->find($id);
        $product = Product::where('category_id',$id)->get();
        return view('admin.product.category_product',compact('product','category'));
    }

}
