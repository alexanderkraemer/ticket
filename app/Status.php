<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
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
    protected $table = 'status';

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
