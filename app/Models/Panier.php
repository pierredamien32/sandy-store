<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $table = 'paniers';

    protected $fillable = [
        'quantite',
        'confirm_commande',
        'status',
        'phone_id',
        'produit_id'
    ];

    public function phone(){
        return $this->belongsTo(Phone::class);
    }

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
