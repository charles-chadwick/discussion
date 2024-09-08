<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DiscussController extends Controller
{
    public function index()
    {
        return Inertia::render("Discuss", [
            // this is for the topics
            "topics"  => Topic::with(["posts", "posts.createdBy", "createdBy"])
                // when there is a search, we need to run it
                              ->when(request("search"), function ($query, $search) {
                    $query->where("last_name", "like", "%{$search}%")
                          ->orWhere("first_name", "like", "%{$search}%");
                })
                              ->paginate(10)
                              ->withQueryString(),
            // this is for the search
            'filters' => request()->only(["search"]),
            // and this is because we just want to preview the first post
            'preview' => true
        ]);
    }

    public function posts(Topic $topic)
    {
        return Inertia::render("Posts", [
            // this is for the topics
            "posts"   => Post::with(['topic', 'topic.createdBy', 'createdBy'])
                             ->findOrFail($topic->id),
            // and this is because we just want to preview the first post
            'preview' => false
        ]);
    }
}
