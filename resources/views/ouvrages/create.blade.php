<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Ajouter un Ouvrage</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #0074D9;
            color: #fff;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            flex-direction: column;
        }

        form {
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 15px;
            border: 2px solid #0074D9;
            position: relative;
        }

        h1 {
            text-align: center;
            margin-top: 10vh;
            font-size: 36px;
        }

        label {
            display: block;
            align-self: flex-start;
            margin-bottom: 5px;
            text-align: left;
            color: #fff;
        }

        input,
        select {
            width: calc(100% - 20px);
            padding: 8px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            background-color: #fff;
            color: #000;
        }

        select {
            background-color: #fff;
        }

        button {
            background-color: #033560;
            color: #fff;
            padding: 16px 32px !important;
            border: none;
            cursor: pointer;
            border-radius: 15px;
            margin-right: 15px;
            font-weight: bold;
            font-size: 24px;
            margin-top: 20px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Ajouter un Ouvrage</h1>

    <form action="{{ route('ouvrages.store') }}" method="POST">
        @csrf
        <label for="Titre">Titre:</label>
        <input type="text" id="Titre" name="Titre"><br>

        <label for="Auteur">Auteur:</label>
        <input type="text" id="Auteur" name="Auteur"><br>

        <label for="Editeur">Editeur:</label>
        <input type="text" id="Editeur" name="Editeur"><br>

        <label for="Prix">Prix:</label>
        <input type="number" id="Prix" name="Prix"><br>

        <label for="AnneePublication">Année de Publication:</label>
        <input type="text" id="AnneePublication" name="AnneePublication"><br>

        <label for="Statut">Statut:</label>
        <select id="Statut" name="Statut">
            <option value="disponible">Disponible</option>
            <option value="non disponible">Non disponible</option>
        </select><br>

        <button type="submit">Ajouter</button>
    </form>
<!-- ... Votre code HTML existant ... -->

@if(session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Succès</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#successModal').modal('show');
        });
    </script>
@endif


</body>

</html>



