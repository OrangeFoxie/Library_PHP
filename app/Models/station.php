<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class station extends Model
{
    use HasFactory;
    // protected $table = 'station';
    
    /**
     * 
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'Room_id',
    ];    
}
