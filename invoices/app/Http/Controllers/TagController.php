<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return view('tags.index');
    }

    public function list()
    {
        
        sleep(1);
        
        $html = view('tags.list')->with(['tags' => Tag::all()])->render();
        return response()->json(['html' => $html]);
    }


    public function store(Request $request)
    {
        
        
        
        $result = Tag::newTag($request->tag);
        // $tag = $result[0]->tag;
        // $new = $result[1];
        return response()->json([]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tagModel = Tag::where('tag', $request->tag)->first();
        if ($tagModel) {
            return response()->json([
                'message' => 'Tag already exists',
                'id' => $tag->id,
            ], 422);
        }
        $tag->update(['tag' => $request->tag]);
        return response()->json([
            'message' => 'Tag updated',
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            'message' => 'Tag deleted',
        ]); 
    }

    public function productAdd(Request $request, Product $product)
    {
        $result = Tag::newTag($request->tag);
        $tag = $result[0];
        
        $product->tags()->attach($tag->id);
        $html = view('tags.badge')->with(['tag' => $tag])->render();
        return response()->json([
            'message' => 'Tag added',
            'html' => $html,
        ]);
    }
}
