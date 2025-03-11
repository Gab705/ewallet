<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tableau de bord Admin</h1>


    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg">Utilisateurs inscrits</h2>
            <p class="text-2xl font-bold"></p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg">Transactions</h2>
            <p class="text-2xl font-bold"></p>
        </div>
        <div class="bg-red-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg">Dépenses</h2>
            <p class="text-2xl font-bold"></p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg">Entrées</h2>
            <p class="text-2xl font-bold"></p>
        </div>
    </div>

    <!-- Tableau des utilisateurs -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Détails des utilisateurs</h2>
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Nom</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Transactions</th>
                    <th class="border p-2">Dépenses</th>
                    <th class="border p-2">Entrées</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="text-center">
                    <td class="border p-2">{{ $user->name }}</td>
                    <td class="border p-2">{{ $user->email }}</td>
                    <td class="border p-2">{{ $user->transactions_count }}</td>
                    <td class="border p-2 text-red-500 font-bold">{{ number_format($user->total_depenses, 2) }} FCFA</td>
                    <td class="border p-2 text-green-500 font-bold">{{ number_format($user->total_entrees, 2) }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>