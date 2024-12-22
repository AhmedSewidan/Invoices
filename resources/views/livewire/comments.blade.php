<div>
    <form wire:submit.prevent="saveComment">
        <h3>علق هنا :</h3>
        <input type="text" wire:model="comment" name="comment" style="width: 100%; height: 120px">
        @error('comment')
            <div style="color: red; font-size: 14px;">
                {{ $message }}
            </div>
        @enderror
        <div class="mt-3">
            <input type="submit" value="أدخل" class="btn btn-primary">
            <span class="spinner">
                <div wire:loading class="spinner-border" role="status">
                    <span class="sr-only"></span>
                </div>
            </span>
        </div>

    </form>
</div>
