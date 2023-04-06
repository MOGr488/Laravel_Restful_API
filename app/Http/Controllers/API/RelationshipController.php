<?php

namespace App\Http\Controllers\API;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function userLessons($id)
    {
        $user = User::find($id)->lessons;
        return $user;
    }

    public function lessonTags($id)
    {
        $lesson = Lesson::find($id)->tags;
        return $lesson;
    }

    public function tagLessons($id)
    {
        $tag = Tag::find($id)->lessons;
        return $tag;
    }
}
