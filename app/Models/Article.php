<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'published',
        'trash'

    ];

    protected $table = 'articles';

    protected $primaryKey = 'id';
}
