<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>

    <!-- Bootstrap CSS (replace the link with the version you're using) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #fff;
            overflow: hidden; /* Hide overflow for the animation */
        }

        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #librairie-sin-container {
            margin-bottom: 20px;
            text-align: center;
            z-index: 1; /* Ensure text is above the background animation */
        }

        #librairie {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        opacity: 1; /* Rendre visible dès le début */
        animation: fadeInDown 1s ease forwards;
        animation: dance 1s ease infinite alternate;
    }

    #sin {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        opacity: 1; /* Rendre visible dès le début */
        animation: fadeInDown 1s ease forwards;
        animation: dance 1s ease infinite alternate;
    }
    @keyframes dance {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px); /* Increased distance */
            }

            100% {
                transform: translateY(0);
            }
        }


        @keyframes fadeInDown {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: #0074D9; /* Fallback for non-supporting browsers */
            /* Gradient background with shades of blue */
            background: linear-gradient(135deg, #3498DB, #3b82b1, #4d82a5, #0e3f60);
            background-size: 400% 400%;
            animation: gradientBackground 15s ease infinite;
        }

        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        #login-box {
            width: 400px;
            padding: 30px;
            background-color: #001f3f;
            text-align: center;
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            animation: slideIn 1s ease forwards;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        #login-box h2 {
            margin-bottom: 30px;
            color: #fff;
        }

        #login-box label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            color: #fff;
        }

        #login-box input {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 25px;
            background-color: #fff;
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        #login-box input:focus {
            transform: scale(1.02);
        }

        #login-box button {
            width: 70%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background-color: #0074D9; /* Teinte de bleu */
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease;
        }

        #login-box button:hover {
            background-color: #0056b3; /* Teinte de bleu au survol */
            transform: scale(1.05);
        }
        .modal-content {
            background-color: #fff; /* Fond blanc */
            color: #000; /* Texte en noir */
        }

        .modal-header {
            background-color: #0074D9; /* Header en bleu */
            color: #fff; /* Texte en blanc */
            border-bottom: none; /* Suppression de la bordure du haut */
        }

        .modal-title {
            color: #fff; /* Texte du titre en blanc */
        }

        .close {
            color: #000; /* Couleur du bouton de fermeture en noir */
            opacity: 1; /* Rendre le bouton de fermeture visible */
        }

        .close:hover {
            color: #fff; /* Changement de couleur au survol */
        }

        .modal-footer {
            border-top: none; /* Suppression de la bordure du bas */
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="librairie-sin-container">
            <div id="librairie">Librairie</div>
            <div id="sin">Sin</div>
        </div>
        <div id="login-box">
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <label for="Id">Identifiant</label>
                <input id="Id" type="text" name="Id" required autofocus class="form-control">

                <label for="MotDePasse">Mot de passe</label>
                <input id="MotDePasse" type="password" name="MotDePasse" required class="form-control">
                <button type="submit" class="btn btn-primary">Se connecter</button>

            </form>
        </div>

        <!-- Modal d'erreur -->
        @if(session('error'))
        <div class="modal fade" id="erreurModal" tabindex="-1" role="dialog" aria-labelledby="erreurModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="erreurModalLabel">Erreur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('error') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Bootstrap JS and jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- JavaScript to display the modal -->
        @if(session('error'))
        <script>
            $(document).ready(function () {
                $('#erreurModal').modal('show');
            });
        </script>
        @endif
</body>

</html>


