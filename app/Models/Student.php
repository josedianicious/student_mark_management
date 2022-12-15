<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Set table name
     */
    protected $table = "students";

    /**
     * Set primary key
     */
    protected $primaryKey = 'student_id';
    /**
     * Set mass assignable columns
     */
    protected $fillable = ['student_name','student_email','mobile_number','gender','teacher_id'];
    /**
     * Set hidden columns
     */
    protected $hidden = ['teacher_id','deleted_at','student_id'];

    /**
     * Format gender with append
     */
    public function getGenderTextAttribute(){ //gender_text
        if ($this->gender == 1) return "M";
        else return "F";
    }

    protected $appends = ['gender_text'];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','teacher_id');
    }
}
