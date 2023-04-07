<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    /**
     * Initaiate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.basic.once')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson = LessonResource::collection(Lesson::all());
        return $lesson->response()
                    ->setStatusCode(200, "Lessons Returned Successfully")
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
        $lesson = LessonResource::collection( Lesson::create($request->all()));
        return $lesson->response()
                    ->setStatusCode(200, "Lesson Stored Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = new LessonResource(Lesson::findOrFail($id));
        return $lesson->response()
                    ->setStatusCode(200, "Lesson Returned Successfully")
                    ->header('Additional-Header', 'True');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = LessonResource::collection(Lesson::findOrfail($id));
        $lesson->update($request->all());

        return $lesson->response()
                    ->setStatusCode(200, "Lesson Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::findOrFail($id)->delete();
        return 204;
    }
}
