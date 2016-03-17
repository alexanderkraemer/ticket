<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    /**
     * No timestamps used in this Database Table
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Name of the Table in the Database
     *
     * @var string
     */
    protected $table = 'priority';

    /**
     * Database columns which are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];
}
