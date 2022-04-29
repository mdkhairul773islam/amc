<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineAdmission extends Model {
    use HasFactory, SoftDeletes;


    public function department() {
        return $this->hasOne(Department::class, 'id', 'department_id')->select('id', 'name', 'slug');
    }
}
