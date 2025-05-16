<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    use HasFactory;

    protected $table = 'shipments'; // Defines the table name

    protected $fillable = [
        'recipient_name',
        'contact_number',
        'street',
        'road',
        'house_number',
        'country'
    ];
}