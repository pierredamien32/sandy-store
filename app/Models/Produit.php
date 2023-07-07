<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';

    protected $fillable = [
        'nom_produit',
        'prix',
        'description',
        'stock',
        'image',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
