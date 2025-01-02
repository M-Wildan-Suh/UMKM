<?php

namespace App\Http\Controllers;

use App\Models\NoHandphone;
use App\Models\PivotProductTag;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request) {
        // dd($request->filter);
        $no_tlp = NoHandphone::first()->no_tlp;
        if ($request->filter === 'all' && $request->search) {
            $data = Product::where('name', 'like', '%' . $request->search . '%')->inRandomOrder()->get();
        } elseif ($request->filter && $request->search) {
            $pivot = PivotProductTag::where('tag_id', $request->filter)->inRandomOrder()->get();
            $pivot->transform(function ($data) {
                $data = $data->product;
                return $data;
            });
            $data = $pivot->filter(function ($product) use ($request) {
                return stripos($product->name, $request->search) !== false;
            });
        } elseif ($request->search) {
            $data = Product::where('name', 'like', '%' . $request->search . '%')->inRandomOrder()->get();
        } elseif ($request->filter === 'all') {
            $data = Product::inRandomOrder()->get();
        } elseif ($request->filter) {
            $pivot = PivotProductTag::where('tag_id', $request->filter)->inRandomOrder()->get();
            $pivot->transform(function ($data) {
                $data = $data->product;
                return $data;
            });
            $data = $pivot;
        } else {
            $data = Product::inRandomOrder()->get();
        }
        $data = $data->map(function ($item) {
            $item->slug = Str::slug($item->name, '-');
            return $item;
        });
        $tag = ProductTag::all();
        $recomend = Product::all();
        $recomend = $recomend->map(function ($item) {
            $item->slug = Str::slug($item->name, '-');
            return $item;
        });
        return view('welcome', compact('data', 'no_tlp', 'recomend', 'tag'));
    }
    public function detail($slug) {
        $no_tlp = NoHandphone::first()->no_tlp;
        $data = Product::where('name', ucwords(str_replace('-', ' ', $slug)))->first();

        // Parsing URL YouTube
        $url = $data->youtube;
        $parsedUrl = parse_url($url);
        $videoId = null;

        if (isset($parsedUrl['host'])) {
            if ($parsedUrl['host'] === 'youtu.be') {
                // Jika URL menggunakan youtu.be, ambil ID dari path
                $videoId = ltrim($parsedUrl['path'], '/');
            } elseif (strpos($parsedUrl['host'], 'youtube.com') !== false) {
                // Jika URL menggunakan youtube.com, periksa path dan query
                if (strpos($parsedUrl['path'], '/shorts/') === 0) {
                    // Jika URL adalah Shorts, ambil ID dari path
                    $videoId = ltrim(str_replace('/shorts/', '', $parsedUrl['path']), '/');
                } elseif (isset($parsedUrl['query'])) {
                    // Jika URL menggunakan query, ambil ID dari parameter 'v'
                    parse_str($parsedUrl['query'], $query);
                    $videoId = $query['v'] ?? null;
                }
            }
        }

        // Buat embed URL jika ID ditemukan
        $data->embed = $videoId ? "https://www.youtube.com/embed/" . $videoId : $data->youtube;

        return view('detail', compact('data', 'no_tlp'));

    }
}
