<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DiscussController extends Controller
{
    public function topics(Request $request)
    {

        if ($request->route()
                    ->hasParameter('topic')) {

            $topics = Topic::with([
                'posts' => function ($query) {
                    $query->orderBy('created_at', 'asc');
                },
                'posts.createdBy',
                'createdBy'
            ])
                           ->orderBy('created_at', 'desc')
                           ->where('id', $request->route()
                                                 ->parameter('topic'))
                           ->get();
            $preview = false;

        } else {

            $topics = Topic::with([
                'posts' => function ($query) {
                    $query->orderBy('created_at', 'asc')->limit(1);
                },
                'posts.createdBy',
                'createdBy'
            ])
                           ->orderBy('created_at', 'desc')
                           ->get();
            $preview = true;

        }

        return Inertia::render('Discuss/Posts',
            ['topics' => $topics, 'preview' => $preview]
        );
    }

}
