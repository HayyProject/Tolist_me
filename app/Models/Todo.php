<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'todos';

    protected $fillable = [
        'title',
        'description',
        'status',
        'start_date',
        'end_date',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function user()
{
    return $this->belongsTo(User::class);
}
}

