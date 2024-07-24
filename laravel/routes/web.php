<?php

use App\Models\Topic;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render("Discuss", [
        "topics" => Topic::with(["posts", "posts.createdBy", "createdBy"])
                           ->when(request("search"), function ($query, $search) {
                               $query->where("last_name", "like", "%{$search}%")
                                     ->orWhere("first_name", "like", "%{$search}%");
                           })
                           ->paginate(10)
                           ->withQueryString(),

        'filters'  => request()->only(["search"])
    ]);
});
