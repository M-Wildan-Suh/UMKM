<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setLastModificationDate(now()))
            ->add(Url::create('/product')->setLastModificationDate(now()));

        // Dynamically add more URLs if needed, such as from a database
        foreach (Product::all() as $model) {
            $slug = Str::slug($model->name, '-');
            $sitemap->add(Url::create("/{$slug}")->setLastModificationDate($model->updated_at));
        }

        $sitemap->writeToFile(storage_path('app/public/sitemap.xml'));

    }
}

