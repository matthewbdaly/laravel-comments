<form method="POST" action="/comments">
    {{ csrf_field() }}
    <input type="email" name="email" placeholder="Email address" />
    <input type="url" name="url" placeholder="Website" />
    <textarea name="comment" placeholder="Enter your comment">
    </textarea>
    <input type="hidden" name="commentable_id" value="{{ $parent->id }}" />
    <input type="hidden" name="commentable_type" value="{{ get_class($parent) }}" />
</form>
@foreach ($parent->comments as $comment)
    {{ $comment->comment }}
@endforeach
