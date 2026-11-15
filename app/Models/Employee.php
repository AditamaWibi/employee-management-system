<?php

namespace App\Models;

use App\Services\EmployeeNumbergenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','email','phone_number','hire_date','department_id','position_id'];

    protected $casts = ['hire_date' => 'date'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }
    
    protected static function booted(): void {
        static::creating(function (Employee $employee) {
            if (empty($employee->employee_number)) {
                $employee->employee_number = app(EmployeeNumbergenerator::class)->generate($employee->hire_date);
            }
        });
    }
}
