<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentInfo extends Model
{
    use HasFactory;

    protected $table = 'employment_infos';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['company_id', 'position1', 'position2', 'position3', 'status', 'hired_on'];

    // public function getEmployee(){
    //     return $this->belongsTo(Employee::class, 'id', 'emp_id');
    // }
}
