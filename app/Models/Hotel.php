<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels'; // Define the table name
    // Add all the fields to the fillable array for mass assignment
    protected $fillable = ['name', 'location', 'latitude', 'longitude', 'images', 'price'];

    // Cast the 'images' field to an array automatically
    protected $casts = [
        'images' => 'array', // Automatically decode JSON to an array
    ];
}
