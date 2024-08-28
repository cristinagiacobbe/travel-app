<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'date', 'cover_image', 'description', 'valutation', 'people', 'additional_notes', 'completed', 'latitude', 'longitude'];
}
