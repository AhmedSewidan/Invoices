<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    
    public static function getUsersInChatsWithChatId()
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $usersWithChats = $user->chats()->with('users')->orderByRaw('COALESCE(chats.updated_at, chats.created_at) DESC')->get(); 
        
        return $usersWithChats->flatMap( function($chat) use($user){
            return $chat->users->except($user->id)->map( function( $user ) use($chat){
                return (object) [
                    'chat' => $chat,
                    'user' => $user,
                ];
            } );
        } );
    }

    public static function getUserByChatId( $chat_id )
    {
        $user_id = auth()->user()->id;
        return Chat::findOrFail( $chat_id )->users->except($user_id);
    }

    // Relations
    public function users()
    {
        return $this->belongsToMany( User::class );
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
