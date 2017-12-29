<form method="POST" action="/comments">
    {{ csrf_field() }}
    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="email" name="email" placeholder="Email address" />
        </div>
    </div>
    <div class="field">
        <label class="label">Website</label>
        <div class="control">
            <input class="input" type="url" name="url" placeholder="Website" />
        </div>
    </div>
    <div class="field">
        <label class="label">Comment</label>
        <div class="control">
            <textarea class="textarea" name="comment" placeholder="Enter your comment"></textarea>
        </div>
    </div>
    <input type="hidden" name="commentable_id" value="{{ $parent->id }}" />
    <input type="hidden" name="commentable_type" value="{{ get_class($parent) }}" />
    <div class="field">
        <div class="control">
            <input type="submit" class="button">Submit</input>
        </div>
    </div>
</form>
@foreach ($parent->comments as $comment)
    {{ $comment->comment }}
@endforeach
