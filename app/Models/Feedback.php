<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'id',
        'text',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function answers()
    {
        return $this->morphMany('App\Models\Answer', 'answerable');
    }

}
