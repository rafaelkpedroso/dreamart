<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'video';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['slug', 'title', 'author', 'url','views','rating'];

}
