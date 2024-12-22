<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    protected $fillable = array('chat_id', 'user_id', 'message', 'read_at');

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}