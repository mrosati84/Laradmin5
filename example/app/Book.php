<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package Laravel
 */
class Book extends Model
{
    // Model custom methods.
    public function author()
    {
        return $this->belongsTo('Laravel\Author');
    }
}
