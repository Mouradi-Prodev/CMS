<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProduitController extends Controller
{
    public function index()
    {
        $produit = Produit::get();
        return Inertia::render('Produit/Produit',['produit'=>$produit]);
    }
    public function create(Request $request)
    {
        $produit = new Produit();
        $produit->nom = $request->post('nom');
        $produit->description = $request->post('description');
        $produit->quantite_stock = $request->post('quantite');
        $produit->save();
        
    }

    public function edit(Request $request)
    {
        
        $produit = Produit::where('id',$request->id)->first();
        
        return Inertia::render('Produit/Edit', ['produit'=>$produit]);
    }

    public function update(Request $request)
    {
        $produit = Produit::where('id',$request->post('id'))->first();
        $produit->nom = $request->post('nom');
        $produit->description = $request->post('description');
        $produit->quantite_stock = $request->post('quantite_stock');
        $produit->save();
    }

    public function delete($id)
    {
       
        Produit::where('id',$id)->delete();
        return response()->json(['produits'=>Produit::get()]);
    }

}
