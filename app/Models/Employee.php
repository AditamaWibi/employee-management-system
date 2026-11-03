<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $fillable = [
        'employee_number',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'salary',
        'department_id',
        'position_id'
    ];

    protected function cast() : array {
        return [
            'hire_date' => 'date',
            'salary' => 'decimal:2'
        ];
    }

    public function department() : BelongsTo {
        return $this->belongsTo(Department::class);
    }

    public function position() : BelongsTo {
        return $this->belongsTo(Position::class);
    }
}
