<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'attachment'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
