<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $newdata = new Highlight;

        $newdata->product_id = $request->product_id;
        $newdata->title = $request->title;
        $newdata->description = $request->description;

        if ($request->hasFile('highlightimage')) {
            $image = $request->file('highlightimage');
            // Get the original filename without the extension
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            
            // Add the current date to the filename
            $currentDate = now()->format('YmdHis');
            
            // Create a new image name
            $imageName = $originalName . '_' . $currentDate;
            
            // Define the image storage path
            $imagePath = public_path('storage/images/product/highlight/');
            
            $manager = new ImageManager(new Driver());
            $imageOptimized = $manager->read($image->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $imageOptimized->save($imageFullPath);

            $newdata->image = $imageName . '.webp';
        }
        $newdata->save();
        
        return redirect()->back()->with('highlight', 'highlight');
    }

    /**
     * Display the specified resource.
     */
    public function show(Highlight $highlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Highlight $highlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Highlight $highlight)
    {
        // dd($request);

        $highlight->title = $request->title;
        $highlight->description = $request->description;

        if ($request->hasFile('highlightimage')) {
            if ($highlight->image) {
                $path = public_path('storage/images/product/highlight/' . $highlight->image);

                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $image = $request->file('highlightimage');
            // Get the original filename without the extension
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            
            // Add the current date to the filename
            $currentDate = now()->format('YmdHis');
            
            // Create a new image name
            $imageName = $originalName . '_' . $currentDate;
            
            // Define the image storage path
            $imagePath = public_path('storage/images/product/highlight/');
            
            $manager = new ImageManager(new Driver());
            $imageOptimized = $manager->read($image->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $imageOptimized->save($imageFullPath);

            $highlight->image = $imageName . '.webp';
        }
        $highlight->save();

        return redirect()->back()->with('highlight', 'highlight');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Highlight $highlight)
    {
        // Delete the main product image if it exists
        $path = public_path('storage/images/product/highlight/' . $highlight->image);
        if (file_exists($path)) {
            unlink($path);
        }

        // Finally, delete the product
        $highlight->delete();

        return redirect()->back()->with('highlight', 'highlight');
    }
}
