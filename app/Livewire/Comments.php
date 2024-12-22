<?php

namespace App\Livewire;

use App\Events\GeneralNotificationsEvent;
use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\GeneralNotifications;
use Illuminate\Support\Facades\Log;
use Pusher\Pusher;

class Comments extends Component
{
    public $postId;
    public $comment;

    protected $rules = [
        'comment' => 'required|string|max:250',
        'postId' => 'required|exists:posts,id',
    ];
    
    public function saveComment()
    {
        $this->validate();
        $authUser = auth()->user();

        try {
            $comment = Comment::create([
                'user_id' => $authUser->id,
                'post_id' => $this->postId,
                'content' => $this->comment,
            ]);
            $user = Post::find($this->postId)->user;
            $data = [
                'username' => $authUser->name,
                'post_id' => $comment->post_id,
                'comment' => (strlen($comment->content) > 80) ? (substr($comment->content, 0, 80) . '...') : $comment->content,
            ];

            $user->notify(new GeneralNotifications($data));
            broadcast(new GeneralNotificationsEvent($data, $user->id));    // Sound after this pusher event
            
            $this->dispatch('show-message', 
                type : 'success', 
                message : 'Sent successfully.'
            ); 
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('show-message', 
                type : 'failed', 
                message : 'Saved successfully.'
            ); 
        }
    }
    public function render()
    {
        return view('livewire.comments');
    }
}
