
<div class="mt-5" style="height: 100%">
    @foreach ($posts as $post)
        @if ($post->user_id != Auth::user()->id)
            <div class="invoice-container-2">
                <div class="invoice-header-2">
                    <h2>عنوان المنشور<span> {{ $post->title ?? '' }} </span></h2>
                </div>
                <div class="invoice-details-card"
                    style="padding: 20px; background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 0 0 8px 8px;">
                    <div>
                        <div>
                            <h3>المحتوي : <small> {{ $post->content ?? '' }} </small></h3>
                        </div>
                        <br>
                        <livewire:comments :postId="$post->id"/>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
