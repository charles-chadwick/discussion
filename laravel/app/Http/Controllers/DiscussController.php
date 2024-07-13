<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DiscussController extends Controller
{
    public function topics()
    {
        $topics = Topic::with(
            [
                'posts' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'posts.createdAt',
                'createdBy'
            ])
                       ->orderBy('created_at', 'desc')
                       ->get();

        return Inertia::render('Discuss/Topics', ['topics' => $topics]);
    }

    public function posts(Topic $topic)
    {
        $topic = Topic::with(
            [
                'posts' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'posts.createdAt',
                'createdBy'
            ])
                      ->orderBy('created_at', 'desc')
                      ->find($topic->id);

        return Inertia::render('Discuss/Posts', ['topic' => $topic]);
    }
}
