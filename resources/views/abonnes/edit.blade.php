
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
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
    <title>Modifier un Abonné</title>
</head>
<body>
    <h1>Modifier un Abonné</h1>
    <form action="{{ route('abonnes.update', ['Id' => $abonne->Id]) }}" method="POST">

        <label for="Nom">Nom:</label><br>
        <input type="text" id="Nom" name="Nom" value="{{ old('Nom',$abonne->Nom) }}"><br>

        <label for="Prenom">Prenom:</label><br>
        <input type="text" id="Prenom" name="Prenom" value="{{ old('Prenom',$abonne->Prenom) }}"><br>

        <label for="Email">Email:</label><br>
        <input type="text" id="Email" name="Email" value="{{ old('Email',$abonne->Email) }}"><br>

        <label for="NumeroTelephone">Numero de Telephone:</label><br>
        <input type="text" id="NumeroTelephone" name="NumeroTelephone" value="{{ old('NumeroTelephone',$abonne->NumeroTelephone) }}"><br>

        @csrf
        @method('PUT')
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
