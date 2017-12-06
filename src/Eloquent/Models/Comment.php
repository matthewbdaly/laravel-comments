<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Comment model
 */
class Comment extends Model
{
    use SoftDeletes;
}
