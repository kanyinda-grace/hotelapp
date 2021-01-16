<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
   protected $fillable = [
    	"numero",
    	'floor',
    	'status'
    ];
 
    public function hotels(){
    	return $this->belongsTo(Hotel::class);
    }
    public function bookings(){
    	return $this->belongsTo(Book::class);
    }
    public function hotel(){
    	return $this->belongsTo(Hotel::class);
    }
}
