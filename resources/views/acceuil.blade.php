<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="E-Wallet">

    <!-- Icône pour l'écran d'accueil -->
    <link rel="apple-touch-icon" href="/images/portefeuille (1).png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/portefeuille (1).png">
    <link rel="manifest" href="/manifest.json">
    <title>E-WALLET</title>
</head>
<body class="bg-[#F5F8FB] text-gray-800 antialiased font-sans min-h-screen flex flex-col">

<header>
    <div class="w-full max-w-4xl mx-auto flex justify-between items-center mt-4 px-4">
        <h1 class="font-bold text-blue-600 text-[20px] flex items-center">
            <a href="{{ route('index') }}" class="flex items-center">
                E- <p class="text-[#000000]">Wallet</p>
                <img src="{{ asset('images/portefeuille (1).png') }}" alt="" class="w-5 ml-1">
            </a>
        </h1>

        <form action="{{ route('logout') }}" method="POST" class="flex items-center">
            @csrf
            <button type="submit" class="font-bold text-[17px] flex items-center cursor-pointer">
                Déconnexion
                <img src="{{ asset('images/fleche-droite (1).png') }}" alt="" class="w-5 ml-1">
            </button>
        </form>
    </div>

    <div class="w-full max-w-4xl mx-auto mt-4 px-4 md:hidden">
        <form action="" class="pb-3 pr-2 flex items-center border-b border-slate-300 text-slate-300 focus-within:border-slate-900 focus-within:text-slate-900 transition w-full">
            <input id="search" value="" class="px-2 w-full outline-none placeholder-slate-400" type="search" name="search" placeholder="Rechercher Transaction">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>
</header>

<section class="w-full max-w-4xl mx-auto mt-8 px-4 flex-1">
    <div class="shadow-xl p-8 md:p-16 rounded-lg bg-white flex flex-col items-center">
        <h1 class="text-[50px] font-bold mb-8 text-center">{{ $user->balance }}{{ $user->devise }}</h1>

        <div class="w-full flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-4">
            <div class="cursor-pointer p-3 shadow-md bg-blue-600 text-white rounded-md w-full md:w-1/4 text-center">
                <p class="flex items-center justify-center">
                    <img src="{{ asset('images/fleche-bas-gauche (2).png') }}" alt="" class="w-3 mr-2">
                    <a href="{{ route('entree') }}">Entrée argent</a>
                </p>
            </div>
            <div class="cursor-pointer p-3 shadow-md bg-red-600 text-white rounded-md w-full md:w-1/4 text-center">
                <p class="flex items-center justify-center">
                    <img src="{{ asset('images/fleche-bas-gauche (3).png') }}" alt="" class="w-3 mr-2">
                    <a href="{{ route('sortie') }}">Sortie argent</a>
                </p>
            </div>
            <div class="cursor-pointer p-3 shadow-md bg-blue-600 text-white rounded-md w-full md:w-1/4 text-center">
                <p class="flex items-center justify-center">
                    <img src="{{ asset('images/parametres-cog (1).png') }}" alt="" class="w-5 mr-2">
                    <a href="{{ route('dashboard') }}">Paramètres</a>
                </p>
            </div>
            <div id="install-button" class="cursor-pointer p-3 shadow-md bg-blue-600 text-white rounded-md w-full md:w-1/4 text-center">
                <p class="flex items-center justify-center">
                    <img src="{{ asset('images/download.png') }}" alt="" class="w-4 mr-2">
                    <span id="install-button">Installer E-Wallet</span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="w-full max-w-4xl mx-auto mt-8 px-4 flex flex-col md:flex-row justify-between items-center">
    <h1 class="font-bold text-[28px] mb-4 md:mb-0">Transactions</h1>
    <form action="{{ route('reset.transactions') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="border rounded-xl w-[200px]">
            <button type="submit" class="w-full flex items-center justify-center p-3 cursor-pointer">
                Réinitialiser
                <img src="{{ asset('images/circulaire.png') }}" alt="" class="w-4 ml-2">
            </button>
        </div>
    </form>
</section>

@foreach ($transaction as $transactions)
<section class="w-full max-w-4xl mx-auto mt-4 px-4 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
    <div class="flex items-center">
        <img src="{{ asset('images/transaction (1).png') }}" alt="" class="md:w-12 w-9">
        <div class="md:ml-4">
            <h2 class="font-bold ml-1">{{ $transactions->descritption }}</h2>
            <h4 class="text-sm text-gray-500 ml-1">{{ $transactions->created_at->format('F Y à H:i') }}</h4>
        </div>
    </div>

    <div class="flex items-center space-x-4">
        <p class="font-bold {{ $transactions->type === 'entrée' ? 'text-blue-600' : 'text-red-600' }}">
            {{ $transactions->type === 'entrée' ? '' : '-' }}{{ $transactions->amount }}
        </p>
        <a href="{{ $transactions->type === 'sortie' ? route('showsortie', $transactions->id) : route('showedit', $transactions->id) }}">
                <button type="submit" class="cursor-pointer">
                    <img src="{{ asset('images/editer.png') }}" alt="editer" class="md:w-5 w-6 mt-1">
                </button>
            </a>
        <form action="{{ route('delete', $transactions->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="cursor-pointer">
                <img src="{{ asset('images/supprimer.png') }}" alt="Supprimer" class="md:w-5 w-6 mt-1">
            </button>
        </form>
    </div>
</section>
@endforeach


<div class="mt-8 w-full max-w-md mx-auto px-4">
    {{ $transaction->links() }}
</div>

<footer class="w-full bg-black mt-8 py-4 flex items-center justify-center">
    <div class="text-white text-center">
        <p class="mb-2">Copyright © 2024, Tout droit réservé, Créé par Eloge KOHOU</p>
        <a href="https://portfolio.elogekohou.site/" class="underline">Portfolio</a>
    </div>
</footer>

<script>
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
    const installButton = document.getElementById('install-button');
    if (installButton) installButton.style.display = 'block';

    installButton?.addEventListener('click', () => {
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then((choiceResult) => {
            console.log(choiceResult.outcome === 'accepted' ? "L'utilisateur a accepté l'installation" : "L'utilisateur a refusé l'installation");
            deferredPrompt = null;
        });
    });
});
</script>

</body>
</html>
