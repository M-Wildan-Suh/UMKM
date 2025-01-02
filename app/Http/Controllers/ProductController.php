<?php

namespace App\Http\Controllers;

use App\Models\NoHandphone;
use App\Models\PivotProductTag;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no_tlp = NoHandphone::first()->no_tlp;
        $data = Product::all();
        $tag = ProductTag::all();
        return view('admin.product.index', compact('data', 'no_tlp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag = ProductTag::all();
        return view('admin.product.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->tag);
        $newdata= new Product();

        $newdata->name = $request->name;
        $newdata->subtitle = $request->subtitle;
        $newdata->price = $request->price;
        $newdata->template = $request->template;
        $newdata->description = $request->description;
        $newdata->address = $request->address;
        $newdata->no_tlp = $request->no_tlp;
        $newdata->youtube = $request->link;

        if ($request->hasFile('thumbnail')) {
            $imageFile = $request->file('thumbnail');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/product/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $newdata->image = $imageName . '.webp';
        }

        $newdata->save();

        if ($request->tag) {
            foreach ($request->tag as $item) {
                $tag = ProductTag::where('tag', $item)->first();
                
                if ($tag) {
                    $newpivot = new PivotProductTag;
    
                    $newpivot->tag_id = $tag->id;
                    $newpivot->product_id = $newdata->id;
    
                    $newpivot->save();
                } else {
                    $newtag = new ProductTag;

                    $newtag->tag = ucfirst($item);

                    $newtag->save();

                    $newpivot = new PivotProductTag;
    
                    $newpivot->tag_id = $newtag->id;
                    $newpivot->product_id = $newdata->id;
    
                    $newpivot->save();
                }
                
            }
        }
          
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->productTags->transform(function ($data) {
            $data->tag = $data->productTag->tag;
            return $data;
        });
        
        // Mengambil semua ID dari productTags yang harus dikecualikan
        $excludedIds = $product->productTags->pluck('productTag.id');
        
        // Memfilter tag berdasarkan ID yang tidak ada di excludedIds
        $tag = ProductTag::whereNotIn('id', $excludedIds)->get();
        // dd($tag);
        
        return view('admin.product.edit', compact('product', 'tag'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($product);

        $product->name = $request->name;
        $product->subtitle = $request->subtitle;
        $product->price = $request->price;
        $product->template = $request->template;
        $product->description = $request->description;
        $product->address = $request->address;
        $product->no_tlp = $request->no_tlp;
        $product->youtube = $request->link;

        if ($request->hasFile('thumbnail')) {
            if ($product->image) {
                $path = public_path('storage/images/product/' . $product->image);

                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $imageFile = $request->file('thumbnail');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/product/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $product->image = $imageName . '.webp';
        }

        $product->save();

        PivotProductTag::where('product_id', $product->id)->delete();
        
        if ($request->tag) {
            // Hapus data pivot yang memiliki product_id sesuai
        
            foreach ($request->tag as $item) {
                $tag = ProductTag::where('tag', $item)->first();
        
                if ($tag) {
                    $newpivot = new PivotProductTag;
    
                    $newpivot->tag_id = $tag->id;
                    $newpivot->product_id = $product->id;
    
                    $newpivot->save();
                } else {
                    $newtag = new ProductTag;
        
                    $newtag->tag = ucfirst($item);
        
                    $newtag->save();
        
                    $newpivot = new PivotProductTag;
        
                    $newpivot->tag_id = $newtag->id;
                    $newpivot->product_id = $product->id;
        
                    $newpivot->save();
                }
            }
        }
        

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the main product image if it exists
        $path = public_path('storage/images/product/' . $product->image);
        if (file_exists($path)) {
            unlink($path);
        }

        // Fetch associated product gallery images
        $productGalleries = ProductGallery::where('product_id', $product->id)->get();

        // Loop through each gallery image and delete it
        foreach ($productGalleries as $gallery) {
            $galleryPath = public_path('storage/images/product/gallery/' . $gallery->image); // Adjust the path as needed
            if (file_exists($galleryPath)) {
                unlink($galleryPath);
            }
            // Delete the gallery record from the database
            $gallery->delete();
        }

        // Finally, delete the product
        $product->delete();

        return redirect()->back()->with('success', 'product and its gallery images deleted successfully.');
    }
}
