
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
    <title>Modifier l'Achat</title>
</head>
<body>
    <h1>Modifier l'Achat</h1>
    <form action="{{ route('achats.update', ['IdAchat' => $achat->IdAchat]) }}" method="POST">

        <label for="IdOuvrage">Id Ouvrage:</label><br>
        <input type="text" id="IdOuvrage" name="IdOuvrage" value="{{ old('IdOuvrage',$achat->IdOuvrage) }}"><br>

        <label for="DateAchat">Date Achat:</label><br>
        <input type="date" id="DateAchat" name="DateAchat" value="{{ old('DateAchat',$achat->DateAchat) }}"><br>

        <label for="Quantite">Quantite:</label><br>
        <input type="text" id="Quantite" name="Quantite" value="{{ old('Quantite',$achat->Quantite) }}"><br>

        <label for="CoutTotal">Cout Total:</label><br>
        <input type="text" id="CoutTotal" name="CoutTotal" value="{{ old('CoutTotal',$achat->CoutTotal) }}"><br>

        @csrf
        @method('PUT')
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
