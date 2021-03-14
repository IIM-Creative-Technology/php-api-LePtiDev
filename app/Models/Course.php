<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'start',
        'end',
        'speaker_id',
        'classroom_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function speaker(){
        return $this->belongsTo(Speaker::class);
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function marks(){
        return $this->hasMany(Mark::class);
    }

}
