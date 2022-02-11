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

    protected $fillable = ['fName', 'mName', 'fName', 'bDate', 'address', 'contactNum1', 'contactNum2', 'profilePicSrc'];

    public function empInfo(){
        return $this->hasOne(EmploymentInfo::class, 'emp_id', 'id');
    }

    public function attainment(){
        return $this->hasMany(Attainment::class, 'emp_id', 'id');
    }

    public function fRecord(){
        return $this->hasOne(FinancialRecord::class, 'emp_id', 'id');
    }

    public function pass(){
        return $this->hasMany(Pass::class, 'emp_id', 'id');
    }

    public function memo(){
        return $this->hasMany(ViolationsAndMemo::class, 'emp_id', 'id');
    }

    public function ratelog(){
        return $this->hasMany(RateLog::class, 'emp_id', 'id');
    }

    public function emergencyContact(){
        return $this->hasOne(EmergencyContact::class, 'emp_id', 'id');
    }
}

