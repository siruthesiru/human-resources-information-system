<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // public function getRouteKeyName()
    // {
    //     return 'emp_id';
    // }

    protected $table = 'employees';

    public $primaryKey = 'id';

    public $timestamps = true;
}

