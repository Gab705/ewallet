<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/portefeuille (1).png">
    <title>E-WALLET</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex flex-col md:flex-row min-h-screen">

        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-8">
            <div class="relative mb-8 flex flex-col md:flex-row md:justify-between md:items-center">
                <h1 class="text-3xl font-bold text-gray-800 flex items-center space-x-3">
                    <img src="{{ asset('images/rapport.png') }}" alt="" class="w-10 h-10">
                    <a href="{{ route('index') }}">Dashboard</a>
                </h1>
                <p class="flex items-center mt-4 md:mt-0 space-x-2 text-xl font-semibold text-gray-700">
                    <img src="{{ asset('images/garcon-avec-des-lunettes.png') }}" alt="" class="w-10 h-10 rounded-full">
                    <span>{{ $user->name }}</span>
                </p>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-600">Entrée Totales</h3>
                    <p class="text-2xl font-bold text-green-500 mt-2">{{ $totalEntree }} FCFA</p>
                </div>
                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-600">Dépenses Totales</h3>
                    <p class="text-2xl font-bold text-red-500 mt-2">{{ $totalsortie }} FCFA</p>
                </div>
                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-600">Solde Restant</h3>
                    <p class="text-2xl font-bold text-blue-500 mt-2">{{ $user->balance }} FCFA</p>
                </div>
            </div>

            <!-- Transaction Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-600">Nombre d'Entrées</h3>
                    <p class="text-2xl font-bold text-green-500 mt-2">{{ $nbrEntree }}</p>
                </div>
                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-600">Nombre de Sorties</h3>
                    <p class="text-2xl font-bold text-red-500 mt-2">{{ $nbrSortie }}</p>
                </div>
                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h3 class="text-lg font-medium text-gray-600">Nombre de Transactions</h3>
                    <p class="text-2xl font-bold text-blue-500 mt-2">{{ $nbrTransaction }}</p>
                </div>
                <div class="cursor-pointer p-5 shadow-md bg-blue-600 text-white rounded-md w-full">
                    <p class="flex items-center justify-center">
                        <a href="{{ route('afficherPlafond') }}">DEFINIR UN PLAFOND</a>
                    </p>
                </div>
                <div class="cursor-pointer p-5 shadow-md bg-white-600 text-black rounded-md w-full">
                @foreach ($plafond as $plafonds)
                        <p class="flex items-center justify-center">
                            <a href="" class="font-bold">PLAFOND : {{ $plafonds->montant }}</a>
                        </p>
                @endforeach
                </div>
                <div class="cursor-pointer p-5 shadow-md bg-blue-600 text-white rounded-md w-full">
                    <p class="flex items-center justify-center">
                        <a href="{{ route('showformgroupe') }}">GROUPE</a>
                    </p>
                </div>
            </div>

            <!-- Doughnut & Pie Charts -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Répartition des Transactions</h2>
                    <canvas id="transactionDoughnutChart"></canvas>
                </div>

                <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Répartition des Montants</h2>
                    <canvas id="transactionPieChart"></canvas>
                </div>
            </div>


            <!-- Recent Transactions -->
            <div class="bg-white shadow-lg rounded-2xl p-5 border border-gray-200 mt-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Dernières Transactions</h2>
                <ul class="space-y-4">
                    @foreach ($derniereTransaction as $derniereTransactions)
                        <li class="flex justify-between items-center text-gray-700">
                            <span>{{ $derniereTransactions->descritption }}</span>
                            @if ($derniereTransactions->type === 'entrée')
                                <span class="text-green-500 font-bold">+{{ $derniereTransactions->amount }} FCFA</span>
                            @else
                                <span class="text-red-500 font-bold">-{{ $derniereTransactions->amount }} FCFA</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <footer class="w-full bg-gray-900 text-white py-4 mt-10">
        <div class="text-center">
            <p>© 2024, Tous droits réservés - Créé par Eloge KOHOU</p>
            <a href="https://portfolio.elogekohou.site/" class="underline mt-2 inline-block">Portfolio</a>
        </div>
    </footer>

    <script>
    const nbralimentation = @json($nbralimentation);
    const nbrtransaport = @json($nbrtransaport);
    const nbrshopping = @json($nbrshopping);
    const nbrdivertissement = @json($nbrdivertissement);
    const nbrsante = @json($nbrsante);
    const nbreducation = @json($nbreducation);
    const nbrfactures = @json($nbrfactures);
    const nbrpaiya = @json($nbrpaiya);

    const totalEntree = @json($totalEntree);
    const totalSortie = @json($totalsortie);

    // Graphique en anneau (Nombre de Transactions)
    const ctxDoughnut = document.getElementById('transactionDoughnutChart').getContext('2d');
    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: ['Alimentation', 'Transport', 'Shopping', 'Divertissement', 'Santé', 'Education', 'Factures', 'Paiya'],
            datasets: [{
                data: [nbralimentation, nbrtransaport, nbrshopping, nbrdivertissement, nbrsante, nbreducation, nbrfactures, nbrpaiya],
                backgroundColor: ['#4ade80', '#f87171', '#60a5fa', '#facc15', '#a78bfa', '#fb923c', '#34d399', '#9333ea'],
                borderColor: ['#16a34a', '#dc2626', '#2563eb', '#ca8a04', '#7c3aed', '#ea580c', '#059669', '#db2777'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Répartition des Transactions' }
            }
        }
    });

    // Graphique en secteurs (Montants en FCFA)
    const ctxPie = document.getElementById('transactionPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Total Entrées', 'Total Sorties'],
            datasets: [{
                data: [totalEntree, totalSortie],
                backgroundColor: ['#1e40af', '#b91c1c'],
                borderColor: ['#1e40af', '#b91c1c'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Répartition des Montants' }
            }
        }
    });
</script>
</body>

</html>
