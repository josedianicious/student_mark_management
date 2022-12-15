<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentMark extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Set table name
     */
    protected $table = "student_marks";

    /**
     * Set primary key
     */
    protected $primaryKey = 'mark_id';
    /**
     * Set mass assignable columns
     */
    protected $fillable = ['student_id','maths_mark','science_mark','history_mark','total_mark','term_id',];
    /**
     * Set hidden columns
     */
    protected $hidden = ['student_id','deleted_at','mark_id'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','student_id');
    }

    public function term(){
        return $this->belongsTo(Term::class,'term_id','term_id');
    }
}
