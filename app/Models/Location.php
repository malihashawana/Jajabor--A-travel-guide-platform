<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // Define the table if it is not the default
    protected $table = 'locations';

    // Define the fillable columns to allow mass assignment
    protected $fillable = ['name', 'address', 'description', 'image_url'];
}
