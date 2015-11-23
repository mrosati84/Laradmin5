<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 * @package Laravel
 */
class Author extends Model
{
    // Model custom methods.
    public function books()
    {
        return $this->hasMany('Laravel\Book');
    }
}
