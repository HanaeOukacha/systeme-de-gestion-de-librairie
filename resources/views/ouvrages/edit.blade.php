
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

        <title>Modifier l'Ouvrage</title>


    <title>Modifier l'Ouvrage</title>
</head>
<body>
    <h1>Modifier l'Ouvrage</h1>
    <form action="{{ route('ouvrages.update', ['Id' => $ouvrage->Id]) }}" method="POST">

        <label for="Titre">Titre:</label><br>
        <input type="text" id="Titre" name="Titre" value="{{ old('Titre',$ouvrage->Titre) }}"><br>

        <label for="Auteur">Auteur:</label><br>
        <input type="text" id="Auteur" name="Auteur" value="{{ old('Auteur',$ouvrage->Auteur) }}"><br>

        <label for="Editeur">Editeur:</label><br>
        <input type="text" id="Editeur" name="Editeur" value="{{ old('Editeur',$ouvrage->Editeur) }}"><br>

        <label for="Prix">Prix:</label><br>
        <input type="number" id="Prix" name="Prix" value="{{ old('Prix',$ouvrage->Prix) }}"><br>


        <label for="AnneePublication">Année de Publication:</label><br>
        <input type="text" id="AnneePublication" name="AnneePublication" value="{{ old('AnneePublication',$ouvrage->AnneePublication) }}"><br>
        <label for="Statut">Statut:</label><br>
        <select id="Statut" name="Statut">
            <option value="disponible" {{ $ouvrage->Statut === 'disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="non disponible" {{ $ouvrage->Statut === 'non disponible' ? 'selected' : '' }}>Non disponible</option>
        </select><br>
        @csrf
        @method('PUT')
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
