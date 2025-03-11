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
        $plafond = Plafond::all();
        $derniereTransaction = Transaction::latest()->take(3)->get();
        $nbrEntree = Transaction::where('type', 'entree')->count('type');
        $nbrSortie = Transaction::where('type','sortie')->count('type');
        $nbrTransaction = Transaction::count();
        $totalEntree = (float) Transaction::where('type', 'entree')->sum('amount');
        $totalsortie = (float) Transaction::where('type', 'sortie')->sum('amount');
        $nbralimentation = Transaction::where('categories', 'Alimentation')->count('categories');
        $nbrtransaport = Transaction::where('categories', 'Transaport')->count('categories');
        $nbrshopping = Transaction::where('categories', 'Shopping')->count('categories');
        $nbrdivertissement = Transaction::where('categories', 'Divertissement')->count('categories');
        $nbrsante = Transaction::where('categories', 'Sante')->count('categories');
        $nbreducation = Transaction::where('categories', 'Education')->count('categories');
        $nbrfactures = Transaction::where('categories', 'Factures')->count('categories');
        $nbrpaiya = Transaction::where('categories', 'Paiya')->count('categories');
        return view('dashboard', compact("user", "totalEntree", "totalsortie", "nbrEntree", "nbrSortie", "nbrTransaction", "derniereTransaction", 
        "nbralimentation", "nbrtransaport", "nbrshopping", "nbrdivertissement", "nbrsante", "nbreducation", "nbrfactures", "nbrpaiya", "plafond"));
    }
}
