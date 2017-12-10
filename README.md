# laravel-comments

[![Build Status](https://travis-ci.org/matthewbdaly/laravel-comments.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-comments)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-comments/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-comments?branch=master)

Simple comments system, loosely inspired by Django's comments system. Currently in development.

Installation
------------

```
composer require matthewbdaly/laravel-comments
```

Usage
-----

To allow comments to be attached to an object, add the trait `Matthewbdaly\LaravelComments\Eloquent\Traits\Commentable` to it. The object will then have a `comments` polymorphic relation.
