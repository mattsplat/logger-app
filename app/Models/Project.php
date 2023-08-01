<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];

    public function getFilePathsAttribute()
    {
        return [$this->path.'/*.log', $this->path.'/**/*.log'];
    }
}
