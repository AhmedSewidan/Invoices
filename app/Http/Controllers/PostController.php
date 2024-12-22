<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboards.notifications.posts');
    }

    public function checkNewComments()
    {
        $notifications = auth()->user()->notifications()->orderBy('created_at', 'asc')->take(3)->get();
        $notificationCount = auth()->user()->notifications()->count();
        return response()->json([
            'commentData' => $notifications,
            'commentsCount' => $notificationCount
        ]);
    }

}
