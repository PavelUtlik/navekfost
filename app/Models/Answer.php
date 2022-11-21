<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'text',
        'user_id',
        'answerable_id',
        'answerable_type',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    const ANSWERABLE_TYPE = [
        'feedback' => 'App\Models\Feedback',
    ];

    public function feedback()
    {
        return $this->morphTo()->forClass(Feedback::class);
    }
}

