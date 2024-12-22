<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ChatMessageResource;
use App\Http\Resources\ChatResource;
use App\Http\Resources\ChatUserResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends ApiController
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    { 
        return $this->response( ChatUserResource::collection( Chat::getUsersInChatsWithChatId() ) );
    }

    public function messages( Request $request )
    {
        $userAuth = Auth::user();
        $chatId    = $request->chatId;
        $messages   =  Chat::findOrFail($chatId)->messages()->orderBy('created_at', 'desc')->get();
        $userInChat = Chat::getUserByChatId($chatId)->first();
        // return $messages;
        $response   = [
            'chat_id'       => $chatId,
            'user_sender'   => new UserResource( $userInChat ),
            'user_reciever' => new UserResource( $userAuth ),
            'messages'      => MessageResource::collection( $messages ),
        ];

        return $this->response( $response );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
