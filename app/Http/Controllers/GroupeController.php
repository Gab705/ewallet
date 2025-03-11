<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Transaction;
use App\Models\Transactiongrou;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GroupeController extends Controller
{
    public function creerGroupe(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'montant' => 'required|string',
            'periodicite' => 'required',
            'devise' => 'required',
            'password' => 'required|string|min:8'
        ]);
        
        $groupe = Groupe::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'montant' => $request->montant,
            'periodicite' => $request->periodicite,
            'devise' => $request->devise,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('showgroupeindex');
    }
    public function connectGrou(){
        return view('connectGrou');
    }
    public function connexionGroupe(Request $request) {
        $request->validate([
            'password' => 'required|string'
        ]);
        $groupe = Groupe::first();
        if ($groupe && Hash::check($request->password, $groupe->password)) {
            return redirect()->route('showgroupeindex')->with('success', 'Connexion réussie !');
        }else return("bonjour");
    }
    public function showgroupeindex(){
        $user = Auth::user();	
        $groupe = Groupe::first();
        $transactionGroupe = Transactiongrou::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(8);
        return view('groupeindex', compact('groupe', 'transactionGroupe'));
    }
    public function showentreegroupe(){
        return view('entreegroupe');
    }
    public function storeentreegroupe(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01'
        ]);
    
        $user = Auth::user();
        $groupe = Groupe::where('user_id', $user->id)->first();
    
        if (!$groupe) {
            return redirect()->back()->with('error', 'Aucun groupe trouvé pour cet utilisateur.');
        }
    
        $groupe->balance += $request->montant;
        $groupe->save();
    
        Transactiongrou::create([
            'user_id' => $user->id,
            'groupe_id' => $groupe->id,
            'name' => $request->name,
            'type' => 'entree',
            'amount' => $request->amount
        ]);
    
        return redirect()->route('showgroupeindex')->with('success', 'Enregistrement réussi!');
    }
        public function deleteTransaction($id){
        $groupe = Groupe::first();
        $transaction = Transactiongrou::find($id);
        if ($transaction){
            $transaction->delete();
            return redirect()->route('showgroupeindex')->with('success', 'Votre transaction a bien été supprimée');
        }
    }
    
    public function majentreegroupe($id){
        $transaction = Transactiongrou::find($id);
        return view('showeditentreegroupe', compact('transaction'));
    }
    public function majeentreegroupe(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|string|min:0.01'
        ]);
        $user = Auth::user();
        $groupe = Groupe::first();
        
        $groupe->balance += $groupe->balance + $request->amount;
        $groupe->save();
        $transaction = Transactiongrou::find($id);
        $groupe->update([
            'user_id' => $user->id,
            'name' => $request->name,
            'type' => 'entree',
            'montant' => $request->amount
        ]);

        return redirect()->route('showgroupeindex')->with('success', 'Enregistrement réussi!');
    }
    public function showprofilegroupe() {
        $user = Auth::user();
        $groupe = Groupe::where('user_id', $user->id)->first();
        return view('profilgroupe', compact('user', 'groupe'));
    }
    

    public function resetTransactiongroupe(){
        $user = Auth::user();
        $groupe = Groupe::first();	
        $transaction = Transactiongrou::where('user_id', $user->id)->delete();
        $groupe->balance = 0;
        $groupe->save();


        return redirect()->route('showgroupeindex')->with('success', 'Toutes vos transactions ont été supprimées');
    }
}
