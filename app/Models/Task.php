<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{
    use Sortable;

    protected $fillable = [
        'username',
        'email',
        'text',
        'status'
    ];

    public $sortable = [
        'username',
        'email',
        'text',
        'status'
    ];
}
