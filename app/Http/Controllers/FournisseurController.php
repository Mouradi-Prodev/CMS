<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseur = Fournisseur::get();
        return Inertia::render('Fournisseur/Fournisseur',['fournisseur'=>$fournisseur]);
    }
    public function create(Request $request){
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $request->post('nom');
        $fournisseur->adresse = $request->post('adresse');
        $fournisseur->telephone = $request->post('telephone');
        $fournisseur->save();
    }
    public function edit(Request $request){
        $fournisseur = Fournisseur::where('id', $request->id)->first();
        return Inertia::render('Fournisseur/Edit',['fournisseur' => $fournisseur]); 
    }
    public function update(Request $request)
    {
        $fourniseur = Fournisseur::where('id', $request->post('id'))->first();
        $fourniseur->nom = $request->post('nom');
        $fourniseur->adresse = $request->post('adresse');
        $fourniseur->telephone = $request->post('telephone');
        $fourniseur->save();
    }
   
    public function delete($id)
    {
       
        Fournisseur::where('id',$id)->delete();
        return response()->json(['fournisseurs'=>Fournisseur::get()]);
    }
}
