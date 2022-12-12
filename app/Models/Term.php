<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    /**
     * Set table name
     */
    protected $table = "terms";

    /**
     * Set primary key
     */
    protected $primaryKey = 'term_id';
    /**
     * Set fillable
     */
    protected $fillable = ['term_title'];
}

