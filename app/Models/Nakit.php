<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nakit extends Model
{
    use HasFactory;

    protected $table = 'nakit';

    protected $fillable = ['model', 'gramaza', 'opis', 'polId', 'materijalId'];
}
