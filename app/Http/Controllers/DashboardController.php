<?php

namespace App\Http\Controllers;

use App\Models\Plafond;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function showDashboard(){
        $user = Auth::user();
        $plafond = Plafond::where('user_id', $user->id)->get();
        $derniereTransaction = Transaction::where('user_id', $user->id)->latest()->take(3)->get();
        $nbrEntree = Transaction::where('user_id', $user->id)->where('type', 'entrée')->count();
        $nbrSortie = Transaction::where('user_id', $user->id)->where('type', 'sortie')->count();
        $nbrTransaction = Transaction::where('user_id', $user->id)->count();
        $totalEntree = (float) Transaction::where('user_id', $user->id)->where('type', 'entrée')->sum('amount');
        $totalsortie = (float) Transaction::where('user_id', $user->id)->where('type', 'sortie')->sum('amount');

        $nbralimentation = Transaction::where('user_id', $user->id)->where('categories', 'Alimentation')->count();
        $nbrtransaport = Transaction::where('user_id', $user->id)->where('categories', 'Transaport')->count();
        $nbrshopping = Transaction::where('user_id', $user->id)->where('categories', 'Shopping')->count();
        $nbrdivertissement = Transaction::where('user_id', $user->id)->where('categories', 'Divertissement')->count();
        $nbrsante = Transaction::where('user_id', $user->id)->where('categories', 'Sante')->count();
        $nbreducation = Transaction::where('user_id', $user->id)->where('categories', 'Education')->count();
        $nbrfactures = Transaction::where('user_id', $user->id)->where('categories', 'Factures')->count();
        $nbrpaiya = Transaction::where('user_id', $user->id)->where('categories', 'Paiya')->count();

        return view('dashboard', compact(
            "user", "totalEntree", "totalsortie", "nbrEntree", "nbrSortie", "nbrTransaction", "derniereTransaction", 
            "nbralimentation", "nbrtransaport", "nbrshopping", "nbrdivertissement", "nbrsante", "nbreducation", 
            "nbrfactures", "nbrpaiya", "plafond"
        ));

}
}