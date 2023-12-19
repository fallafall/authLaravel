<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::all();
         return view('clients.liste', ['clients' => $clients]);
        // return view('clients.liste');
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        return view('clients.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $request->validate([
                    'nom' => 'required',
                    'prenom' => 'required',
                    'numero' => 'required',
                ]);
        
                Client::create($request->all());
        
                return redirect()->route('clients.index')->with('success','Client ajouté avec succé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
     return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'numero' => 'required',
        ]);
  
        $client->update($request->all());
   
        return redirect()->route('clients.index')->with('success','Client modifié avec succé.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
       $client->delete();

       return  redirect()->route('clients.index')->with('success','Client supprimer avec succé');
    
    }
}
