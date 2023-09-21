<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return view('tags.index');
    }

    public function list()
    {
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
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
