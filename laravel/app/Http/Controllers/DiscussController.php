<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class DiscussController extends Controller
{
    public function index()
    {
        $topics = Topic::with([
            'posts' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'createdBy'
        ])->orderBy('created_at', 'desc')->get();

        return view('discuss.topics', ['topics' => $topics]);
    }

    public function posts(Topic $topic)
    {
        return view('discuss.posts', ['topic' => $topic]);
    }
}
