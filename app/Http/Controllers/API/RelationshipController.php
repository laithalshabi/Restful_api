<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;

class RelationshipController extends Controller
{
    public function userLessons($id)
    {
        $user = User::findOrFail($id)->lessons;
        $fields = array();
        $filtered = array();
        foreach ($user as $lessons) {
            $fields['Title'] = $lessons->title;
            $fields['Content'] = $lessons->body;
            $filtered[] = $fields;
        }
        return response()->json(['data' => $filtered], 200);
    }
    public function lessonTags($id)
    {
        $lesson = Lesson::findOrFail($id)->tags;
        $fields = array();
        $filtered = array();
        foreach ($lesson as $tag) {
            $fields['Name'] = $tag->name;
            $filtered[] = $fields;
        }
        return response()->json(['data' => $filtered], 200);
    }
    public function tagLessons($id)
    {

        $tag = Tag::findOrFail($id)->lessons;
        $fields = array();
        $filtered = array();
        foreach ($tag as $lesson) {
            $fields['Title'] = $lesson->title;
            $fields['Content'] = $lesson->body;
            $filtered[] = $fields;
        }
        return response()->json(['data' => $filtered], 200);
    }
}
