
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Centre le formulaire horizontalement */
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: royalblue;
            margin-top: 20px; /* Ajuster la marge supérieure */
        }

        label {
            color: royalblue;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            border: 1px solid royalblue;
            border-radius: 5px;
            padding: 8px;
            margin-bottom: 10px;
            width: 300px; /* Changer la largeur des champs de saisie */
            box-sizing: border-box;
            background-color: white;
        }

        button {
            background-color: royalblue;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Suppression de la bordure du formulaire */
        form {
            border: none;
            padding: 0;
            margin: 0;
        }
    </style>
    <title>Modifier l'Emprunt</title>
</head>
<body>
    <h1>Modifier l'Emprunt</h1>
    <form action="{{ route('emprunts.update', ['IdEmprunt' => $emprunt->IdEmprunt]) }}" method="POST">

        <label for="IdOuvrage">Id Ouvrage:</label><br>
        <input type="text" id="IdOuvrage" name="IdOuvrage" value="{{ old('IdOuvrage',$emprunt->IdOuvrage) }}"><br>

        <label for="IdAbonne">Id Abonne:</label><br>
        <input type="text" id="IdAbonne" name="IdAbonne" value="{{ old('IdAbonne',$emprunt->IdAbonne) }}"><br>

        <label for="DateEmprunt">Date Emprunt:</label><br>
        <input type="date" id="DateEmprunt" name="DateEmprunt" value="{{ old('DateEmprunt',$emprunt->DateEmprunt) }}"><br>

        <label for="DateRetourPrevue">DateRetourPrevue:</label><br>
        <input type="date" id="DateRetourPrevue" name="DateRetourPrevue" value="{{ old('DateRetourPrevue',$emprunt->DateRetourPrevue) }}"><br>

        <label for="DateRetourReelle">DateRetourReelle:</label><br>
        <input type="date" id="DateRetourReelle" name="DateRetourReelle" value="{{ old('DateRetourReelle',$emprunt->DateRetourReelle) }}"><br>

        @csrf
        @method('PUT')
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
