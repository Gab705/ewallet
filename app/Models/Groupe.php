<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $table = 'groupe';
    protected $fillable = ['user_id', 'name', 'description', 'montant', 'periodicite', 'devise', 'password'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
