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
<div class="comment">
    @if (isset($comment->user_name))
    <p class="has-text-weight-bold">{{ $comment->user_name }}</p>
    @else
    <p class="has-text-weight-bold">{{ 'Anonymous' }}</p>
    @endif
    <p>{{ $comment->comment }}</p>
    <div class="flag">
        <form method="POST" action="{{ route('comments.flag') }}">
            {{ csrf_field() }}
            <div class="field">
                <label class="label">Reason</label>
                <div class="control">
                    <input class="input" type="text" name="reason" required placeholder="Reason for flagging" />
                </div>
            </div>
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            <div class="field">
                <div class="control">
                    <input type="submit" class="button is-primary" value="Flag this comment"></input>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
