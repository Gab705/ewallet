<?php

namespace App\Http\Controllers;

use App\Models\Plafond;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;




class WalletController extends Controller
{
    public function index(Request $request){
        $recherche =  Transaction::query();
        if($search = $request->search){
            $recherche->where('descritption', 'LIKE', '%'.$search.'%');
        }
        $user = Auth::user();
        $transaction =  $recherche->where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(8);
        return view("acceuil", compact("user", "transaction"));
    }

    public function showerror(){
        return view("respoerreur");
    }

    public function showAddEntryForm(){
        return view("entree");
    }

    public function showAddExpenseForm(){
        return view("sortie");
    }

    public function addEntry(Request $request){
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'descritption' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->balance += $request->amount;
        $user->save();

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'entrée',
            'amount' => $request->amount,
            'descritption' => $request->descritption,
        ]);

        return redirect()->route('index')->with('success', 'Votre entrée a bien été enregistrée');
    }


    public function addExpense(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'descritption' => 'required|string|max:255',
        'categories' => 'required'
    ]);

    $user = Auth::user();
    $plafond = Plafond::where('user_id', $user->id)->latest()->first();

    if ($plafond) {
        $totalRetraits = Transaction::where('user_id', $user->id)
            ->where('type', 'sortie')
            ->whereBetween('created_at', [$plafond->start_date, $plafond->end_date])
            ->sum('amount');

        if (($totalRetraits + $request->amount) > $plafond->montant) {
            return redirect()->route('errorplafond')->with('error', 'Vous avez atteint votre plafond de retrait.');
        }
    }

    if ($user->balance >= $request->amount) {
        $user->balance -= $request->amount;
        $user->save();
    } else {
        return redirect()->route('index')->with('error', 'Votre solde est insuffisant');
    }

    Transaction::create([
        'user_id' => $user->id,
        'type' => 'sortie',
        'amount' => $request->amount,
        'descritption' => $request->descritption,
        'categories' => $request->categories
    ]);

    return redirect()->route('index')->with('success', 'Votre sortie a bien été enregistrée');
}


    public function resetTranslation(){
        Transaction::where('user_id', Auth::id())->delete();

        $user = Auth::user();
        $user->balance = 0;
        $user->save();

        return redirect()->route('index')->with('success', 'Vos transactions ont été effacées');
    }

    public function delete($id){
        $user = Auth::user();
        $transaction = Transaction::find($id);
        if ($transaction){
            $transaction->delete();
            $user->balance -= $transaction->amount;
            $user->save();	
            return redirect()->route('index')->with('success', 'Votre transaction a bien été supprimée');
        }
    }

    public function afficherPlafond(){
        return view('plafond');
    }

    public function modifierPlafond(Request $request){
        $request->validate([
            'montant' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        Plafond::where('user_id', Auth::id())->delete();

        $plafond = Plafond::create([
            'user_id' => Auth::id(),
            'montant' => $request->montant,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date)
        ]);

        return redirect()->route('dashboard')->with('success', 'Votre plafond a bien été modifié');
    }

    public function errorPlafond(){
        return view('errorplafond');
    }

    public function showedit($id){
        $transaction = Transaction::find($id);
        return view('edit', compact('transaction'));
    }

    public function editentree(Request $request, $id){
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'descritption' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->balance += $request->amount;
        $user->save();

        $transaction = Transaction::find($id);

        $transaction->update([
            'user_id' => $user->id,
            'type' => 'entrée',
            'amount' => $request->amount,
            'descritption' => $request->descritption,
        ]);

        return redirect()->route('index')->with('success', 'Votre entrée a bien été enregistrée');
    }

    public function showsortie($id){
        $transaction = Transaction::find($id);
        return view('editsortie', compact('transaction'));
    }

    public function majsortie(Request $request,$id)
{
    $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'descritption' => 'required|string|max:255',
        'categories' => 'required'
    ]);

    $user = Auth::user();
    $plafond = Plafond::where('user_id', $user->id)->latest()->first();

    if ($plafond) {
        $totalRetraits = Transaction::where('user_id', $user->id)
            ->where('type', 'sortie')
            ->whereBetween('created_at', [$plafond->start_date, $plafond->end_date])
            ->sum('amount');

        if (($totalRetraits + $request->amount) > $plafond->montant) {
            return redirect()->route('errorplafond')->with('error', 'Vous avez atteint votre plafond de retrait.');
        }
    }

    if ($user->balance >= $request->amount) {
        $user->balance -= $request->amount;
        $user->save();
    } else {
        return redirect()->route('index')->with('error', 'Votre solde est insuffisant');
    }
    $transaction = Transaction::find($id);
    $transaction->update([
        'user_id' => $user->id,
        'type' => 'sortie',
        'amount' => $request->amount,
        'descritption' => $request->descritption,
        'categories' => $request->categories
    ]);

    return redirect()->route('index')->with('success', 'Votre sortie a bien été enregistrée');
}

    public function showformgroupe(){
        return view('formgroupe');
    }
}
