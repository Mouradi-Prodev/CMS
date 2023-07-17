<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produit_fournisseur extends Model
{
    use HasFactory;
    public function produit():BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
