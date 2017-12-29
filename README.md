# laravel-comments

[![Build Status](https://travis-ci.org/matthewbdaly/laravel-comments.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-comments)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-comments/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-comments?branch=master)

Simple comments system, loosely inspired by Django's comments system. Allows comments to be attached to an object, and allows for them to be flagged by users for moderator attention.

Installation
------------

```
composer require matthewbdaly/laravel-comments
```

You will also need to run `php artisan migrate` to set up the required database tables.

Usage
-----

To allow comments to be attached to an object, add the trait `Matthewbdaly\LaravelComments\Eloquent\Traits\Commentable` to it. The object will then have a `comments` polymorphic relation.

Views
-----

The package includes a view for submitting comments, named `comments::comments`, which can be included in another view as follows:

```php
@include('comments::comments', ['parent' => $post])
```

The value of `parent` must be an instance of the commentable object (eg, a blog post). The view also includes a form for flagging comments.

Obviously, if you prefer you can override this view with your own content.

The package also includes the following views:

* `comments::commentsubmitted`
* `comments::flagsubmitted`

These simply acknowledge receipt of the comment or flag, but are fairly basic and so you should feel free to replace them as you see fit.

Of course there's nothing stopping you creating your own routes and controllers for creating, viewing and flagging comments, and if you wish to build a REST API that allows for adding comments to objects you can just use these models directly:

* `Matthewbdaly\LaravelComments\Eloquent\Models\Comment`
* `Matthewbdaly\LaravelComments\Eloquent\Models\Comment\Flag`

I recommend that you use my repositories, which are as follows:

* `Matthewbdaly\LaravelComments\Contracts\Repositories\Comment`
* `Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag`

These use `matthewbdaly/laravel-repositories` and so implement caching on the decorated repository, making it simple to ensure your models get cached appropriately.

Events
------

You can set up listeners for the following events:

* `Matthewbdaly\LaravelComments\Events\CommentReceived`

Fired when a new comment is submitted. The package does not include any kind of validation of comments, so you can instead listen for this event and implement your own functionality to validate them (eg, check it with Akismet, check for links).

* `Matthewbdaly\LaravelComments\Events\CommentFlagged`

This event indicates that a comment has been flagged for moderator attention. You can use this event to send whatever notification is most appropriate (eg, email, Slack, SMS).
