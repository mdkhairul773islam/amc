<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    public function page(){
        return $this->hasOne(Page::class, 'department_id', 'id')->select('department_id', 'url', 'header_image', 'featured_image');
    }
}
