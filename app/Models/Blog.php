<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Scopes\TenantScope;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'url', 
        'category',
        'description'
    ];  
}
