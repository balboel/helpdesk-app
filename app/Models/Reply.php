<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table = 'tiket_balasan';
    protected $fillable = [
        'tiket_id',
        'user_id',
        'balasan',
        'file_id'
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'tiket_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function files()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}
