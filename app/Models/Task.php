<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    //dados da tabela tasks
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    use SoftDeletes;
}
