<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    use HasFactory;


    public function produit_commande(): HasMany
    {
        return $this->hasMany(Produit_commande::class);
    }
    public function produit_fournisseur(): HasMany
    {
        return $this->hasMany(Produit_fournisseur::class);
    }
}
