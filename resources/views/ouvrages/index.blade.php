<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Liste des Ouvrages</title>
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            position: relative;
        }

        h1 {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        tr {
            font-weight: bold;
            color: black;
        }

        th {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
        }

        td a {
            text-decoration: none;
            margin-right: 10px;
        }

        td form {
            display: inline-block;
        }

        .modify-button,
        .delete-button {
            padding: 10px 30px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
            cursor: pointer;
        }

        .add-link,
        .return-button {
            padding: 10px 35px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            margin-right: 10px;
        }

        .action-buttons {
            display: flex;
            align-items: center;
        }

        .modify-button {
            background-color: #27ae60;
            color: white;
        }

        .modify-button:hover {
            background-color: #219d54;
        }

        .delete-button {
            background-color: #e74c3c;
            color: white;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .add-link,
        .return-button {
            background-color: #2c3e50;
            color: white;
        }

        .add-link:hover,
        .return-button:hover {
            background-color: #1b2838;
        }

        .action-buttons-top {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="action-buttons-top">
        <a href="{{ route('ouvrages.create') }}" class="add-link">Ajouter </a>
        <a href="{{ route('dashboard') }}" class="return-button">Retour</a>
    </div>

    <h1>Liste des Ouvrages</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Editeur</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>Année de Publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ouvrages as $ouvrage)
            <tr>
                <td>{{ $ouvrage->Id }}</td>
                <td>{{ $ouvrage->Titre }}</td>
                <td>{{ $ouvrage->Auteur }}</td>
                <td>{{ $ouvrage->Editeur }}</td>
                <td>{{ $ouvrage->Prix }}</td>
                <td>{{ $ouvrage->AnneePublication }}</td>
                <td>{{ $ouvrage->Statut }}</td>

                <td class="action-buttons">
                    <a href="{{ route('ouvrages.edit', ['Id' => $ouvrage->Id]) }}" class="modify-button">Modifier</a>
                    <form action="{{ route('ouvrages.destroy', ['Id' => $ouvrage->Id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
