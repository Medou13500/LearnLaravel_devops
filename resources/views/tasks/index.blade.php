<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma TodoList</title>
</head>
<body>

    <h1>✅ Ma TodoList</h1>

    <!-- Affichage des tâches -->
    <ul>
        @forelse($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong><br>
                {{ $task->description }}<br>
                Statut : {{ $task->completed ? '✅ Terminée' : '🕒 En cours' }}
                <hr>
            </li>
        @empty
            <p>Aucune tâche pour l’instant.</p>
        @endforelse
    </ul>

    <!-- Formulaire d'ajout -->
    <h2>Ajouter une tâche</h2>

    <form action="{{ url('/tasks') }}" method="POST">
        @csrf
        <label for="title">Titre :</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Description :</label><br>
        <textarea name="description" id="description" rows="3" required></textarea><br><br>

        <label for="completed">Tâche terminée ?</label>
        <input type="checkbox" name="completed" value="1"><br><br>

        <button type="submit">Ajouter</button>
    </form>

</body>
</html>
