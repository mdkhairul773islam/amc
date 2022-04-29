<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model {
    use HasFactory, SoftDeletes;

    public function designation() {
        return $this->hasOne(Designation::class, 'id', 'designation_id')->select('id', 'name');
    }

    public function department() {
        return $this->hasOne(Department::class, 'id', 'department_id')->select('id', 'name', 'slug');
    }
}
