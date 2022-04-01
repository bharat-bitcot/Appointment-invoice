<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manageServiceEngineer extends Model
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
        'user_id',
        'complaint_id',
        'description'
    ];

    /**
     * Associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Associated with the complaint.
     */
    public function complaint()
    {
        return $this->belongsTo(complaint::class);
    }

}
