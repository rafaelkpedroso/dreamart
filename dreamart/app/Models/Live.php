<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'live';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['slug', 'title', 'author', 'url','views','rating','taxonomy'];
}
