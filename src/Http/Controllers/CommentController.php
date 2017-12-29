<?php

namespace Matthewbdaly\LaravelComments\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Auth\Guard;
use Matthewbdaly\LaravelComments\Http\Requests\CommentRequest;
use Matthewbdaly\LaravelComments\Http\Requests\FlagRequest;
use Matthewbdaly\LaravelComments\Contracts\Repositories\Comment;
use Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag;

/**
 * Comment controller
 */
class CommentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Comment repository
     *
     * @var $comment
     */
    protected $comment;

    /**
     * Flag repository
     *
     * @var $flag
     */
    protected $flag;

    /**
     * Auth instance
     *
     * @var $auth
     */
    protected $auth;

    /**
     * Constructor
     *
     * @param Comment $comment The comment repository.
     * @param Flag $flag The flag repository.
     * @param Guard $auth The auth instance.
     * @return void
     */
    public function __construct(Comment $comment, Flag $flag, Guard $auth)
    {
        $this->comment = $comment;
        $this->flag = $flag;
        $this->auth = $auth;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CommentRequest $request The request.
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $data = $request->all();
        $data['ip_address'] = $request->ip();
        if ($user = $this->auth->user()) {
            $data['user_id'] = $user->id;
            if (!array_key_exists('user_name', $data) && $username = $user->name) {
                $data['user_name'] = $username;
            }
            if (!array_key_exists('user_email', $data) && $email = $user->email) {
                $data['user_email'] = $email;
            }
            if (!array_key_exists('user_url', $data) && $url = $user->url) {
                $data['user_url'] = $url;
            }
        }
        $this->comment->create($data);
        return view('comments::commentsubmitted');
    }

    /**
     * Flag a comment
     *
     * @param  FlagRequest $request The request.
     * @return \Illuminate\Http\Response
     */
    public function flag(FlagRequest $request)
    {
        $data = $request->all();
        if ($user = $this->auth->user()) {
            if (!array_key_exists('user_id', $data) && $user_id = $user->id) {
                $data['user_id'] = $user_id;
            }
        }
        $this->flag->create($data);
        return view('comments::flagsubmitted');
    }
}
