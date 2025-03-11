<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactiongrou extends Model
{
    use HasFactory;
    protected $table = 'transactiongroupe';
    protected $fillable = ['user_id', 'name', 'type', 'amount'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
