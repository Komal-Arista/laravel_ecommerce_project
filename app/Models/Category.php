<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'parent_id',
        'status',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-F-Y');
    }

    public function getStatusAttribute($value)
    {
        if ($value == 1) {
            return '<a href="' . route('admin.category.changeStatus', $this->id) .  '" title="chanage status" class="badge bg-label-success btn-sm">
                <span class="alert alert-success">Active</span></a>';
        } else {
            return '<a href="' . route('admin.category.changeStatus', $this->id) . '" title="change status" class="badge bg-label-danger btn-sm">
                <span class="alert alert-danger">Inactive</span></a>';
        }
    }
}
