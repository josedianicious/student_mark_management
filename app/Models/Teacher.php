<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Set table name
     */
    protected $table = "teachers";

    /**
     * Set primary key
     */
    protected $primaryKey = 'teacher_id';
    /**
     * Set mass assignable columns
     */
    protected $fillable = ['teacher_name','teacher_email','teacher_mobile__number','teacher_gender'];
    /**
     * Set hidden columns
     */
    protected $hidden = ['teacher_id','deleted_at'];

    /**
     * Format gender with append
     */
    public function getGenderTextAttribute(){ //gender_text
        if ($this->teacher_gender == 1) return "M";
        else return "F";
    }

    protected $appends = ['gender_text'];
}
