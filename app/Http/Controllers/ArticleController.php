<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::where('user_id', auth()->user()->id)->get();

        // dd('Mes produits '.$produits);
        return view('admin.homeAdmin', compact('produits'));
    }

    public function article()
    {
        $produits = Produit::all();

        // dd('Mes produits '.$produits);
        return view('articles', compact('produits'));
    }

    public function mes_articles()
    {
        $produits = Produit::where('user_id', auth()->user()->id)->get();

        // dd('Mes produits '.$produits);
        return view('admin.mesArticles', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addArticles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reponse = $request->validate([
            'nom_produit' => 'required|string',
            'prix' => 'required',
            'stock' => 'required',
            'file' => 'required',
        ]);

        $user_connecte = auth()->user()->id;
        $produit_user_connecte = Produit::where('user_id', $user_connecte)->get();
        $nom_produit = $request->nom_produit;
        $produit = Produit::where('nom_produit', $nom_produit)->first();
        //dd('OK '.$produit);
        if ($produit && $produit_user_connecte) {
            // Le produit existe déjà dans la base de données
            // Gérer l'erreur ou afficher un message d'erreur approprié

            return redirect()->back()->withErrors(['nom_produit' => 'Ce produit existe déjà.'])->withInput();
        }else{

            $produit = new Produit();
            $image = $request->file;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage', $imagename);

            $produit->nom_produit = $request->nom_produit;
            $produit->prix = $request->prix;
            $produit->description = $request->description;
            $produit->stock = $request->stock;
            $produit->image = $imagename;
            $produit->user_id = auth()->user()->id;
            // dd('Les infos récupérer '.$produit);

            $produit->save();

            return redirect()->back()->with('message','Le produit '.$request->nom_produit.' a été ajouté avec succès.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
