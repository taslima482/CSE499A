<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;

class Scholarship extends Model
{

//    public function scholarship_details()
//    {
//        return $this->belongsToMany(Student::class)->withoutGlobalScopes();
//    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'scholarship_student')->withoutGlobalScopes()->withPivot('is_approve');
    }
    public function approved_students()
    {
        return $this->belongsToMany(Student::class, 'scholarship_student')->withoutGlobalScopes()->wherePivot('is_approve',1);
    }


    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($model){
            if (session()->has('tenant_id')) {
                $model->tenant_id = session()->get('tenant_id');
            }
        });
    }
}
