<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    /**
     * primary Key .
     *
     * int
     */
    protected $primaryKey = "id";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'manage_service_engineer_id',
        'complaint_id',
        'description',
        'is_sent_mail',
        'payment_status',
        'payment_type'
    ];

}
