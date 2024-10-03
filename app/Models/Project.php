<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'content', 'date'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }
}

