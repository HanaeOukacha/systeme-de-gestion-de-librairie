<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Librairie Sin</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #fff;
            overflow: hidden; /* Hide overflow for the animation */
            text-align: center;
            opacity: 0;
            animation: fadeInDown 1s ease forwards;
        }


        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        #container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        #logout-button {
            padding: 10px 35px;
            font-size: 14px ;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #e6ebef;
            color: #111111;
        }

        #librairie-sin-container {
            margin-bottom: 20px;
            text-align: left ;
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

        #image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .image-row {
            display: flex;
            justify-content: space-around;
            margin-bottom: 50px;
            cursor: pointer;
        }

        .image-box {
            width: 250px;
            height: 250px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            margin-right: 100px;
            color: #000;
            cursor: pointer;
        }

        .image-label {
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="container">
        <a href="{{ route('logout') }}"><button id="logout-button">Déconnecter</button></a>
        <div id="librairie-sin-container">
            <div id="librairie">Librairie</div>
            <div id="sin">Sin</div>
        </div>
    </div>

    <div id="image-container">
        <div class="image-row">
            <div class="image-box" onclick="redirection('{{route('ouvrages.index')}}')">
                <div class="image-label">Ouvrages</div>
            </div>
            <div class="image-box" onclick="redirection('{{route('abonnes.index')}}')">
                <div class="image-label">Abonnés</div>
            </div>
        </div>
        <div class="image-row">
            <div class="image-box" onclick="redirection('{{route('achats.index')}}')">
                <div class="image-label">Achats</div>
            </div>
            <div class="image-box" onclick="redirection('{{route('emprunts.index')}}')">
                <div class="image-label">Emprunts</div>
            </div>
        </div>
    </div>

    <script>
        function redirection(url) {
            window.location.href = url;
        }
    </script>
</body>

</html>

