<form method="POST" action="{{ route('comments.submit') }}">
    {{ csrf_field() }}
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" type="text" name="user_name" placeholder="Name" />
        </div>
    </div>
    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="email" name="user_email" placeholder="Email address" />
        </div>
    </div>
    <div class="field">
        <label class="label">Website</label>
        <div class="control">
            <input class="input" type="url" name="user_url" placeholder="Website" />
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
            <input type="submit" class="button is-primary" value="Submit"></input>
        </div>
    </div>
</form>
@foreach ($parent->comments as $comment)
    <h4>{{ $comment->user_name || 'Anonymous' }}</h4>
    {{ $comment->comment }}
@endforeach
