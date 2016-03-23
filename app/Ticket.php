<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Name of the Table in the Database
     *
     * @var string
     */
    protected $table = 'ticket';

    /**
     * Database columns which are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'creator',
        'description',
        'status_id',
        'priority_id',
        'user_id',
    ];
}
