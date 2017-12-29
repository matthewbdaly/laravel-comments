<?php

namespace Matthewbdaly\LaravelComments\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Auth\Guard;
use Matthewbdaly\LaravelComments\Http\Requests\CommentRequest;
use Matthewbdaly\LaravelComments\Contracts\Repositories\Comment;

/**
 * Comment controller
 */
class CommentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Comment repository
     *
     * @var $repo
     */
    protected $repo;

    /**
     * Auth instance
     *
     * @var $auth
     */
    protected $auth;

    /**
     * Constructor
     *
     * @param Comment $repo The comment repository.
     * @param Guard $auth The auth instance.
     * @return void
     */
    public function __construct(Comment $repo, Guard $auth)
    {
        $this->repo = $repo;
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
        $comment = $this->repo->create($data);
        return view('comments::commentsubmitted');
    }
}
