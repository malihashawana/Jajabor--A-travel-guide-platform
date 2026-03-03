<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    // Add fillable or guarded attributes
    protected $fillable = [
        'flight_id',   // or 'hotel_id' if you plan to store hotel receipts too
        'user_id',
        'amount',
        'payment_date',
        'receipt_number',
        'receipt_path',  // Add the receipt_path field
    ];

    // Define relationships with Flight or Hotel
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
