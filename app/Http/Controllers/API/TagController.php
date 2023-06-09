<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = TagResource::collection( Tag::all());
        return $tag->response()
                    ->setStatusCode(200, "Tags Returned Successfully")
                    ->header('Additional-Header', 'True');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = TagResource::collection( Tag::create($request->all()));
        return $tag->response()
        ->setStatusCode(200, "Tag Stored Successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = new TagResource(Tag::findOrFail($id));
        return $tag->response()
                    ->setStatusCode(200, "User Returned Successfully")
                    ->header('Additional-Header', 'True');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = TagResource::collection(Tag::findOrfail($id));
        $tag->update($request->all());

        return $tag->response()
        ->setStatusCode(200, "Tag Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return 204;
    }
}
