<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presidente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<img class="fullscreen-image" src="imagenes/presidente.jpg" alt="Imagen a pantalla completa">

<div class="titulo">
    <label for="">Votar por Presidente</label>
</div>

<div class="button-container espacio">
    <div class="button-row espacio">
        <div>
        <button class="button" data-partido="Todos" onclick="vote(this)"><img src="imagenes/partido2.png" alt=""></button>
        <button class="button" data-partido="Nulo" onclick="vote(this)"><img src="imagenes/nulo.jpg" alt=""></button>
        <button class="button" data-partido="Partido Azul" onclick="vote(this)"><img src="imagenes/partido4.png" alt=""></button>
        </div>

        <div>
        <button class="button" data-partido="Valor" onclick="vote(this)"><img src="imagenes/partido3.png" alt=""></button>
        <button class="button" data-partido="MLP" onclick="vote(this)"><img src="imagenes/partido5.jpg" alt=""></button>
        <button class="button" data-partido="Nosotros" onclick="vote(this)"><img src="imagenes/partido1.png" alt=""></button>
        </div>
    </div>
</div>
<div class="botonAl">
        <button id="redirect-button" class="redirect-button" disabled onclick="redirectToAlcalde()">Votar Alcalde</button>
    </div>
<script>
    var buttons = document.querySelectorAll(".button");
    var redirectButton = document.getElementById("redirect-button");

    function vote(button) {
        if (button.classList.contains("disabled")) {
            return;
        }

        var partido = button.getAttribute("data-partido"); // Obtiene el nombre del partido

        // Envía una solicitud al servidor para registrar el voto
        fetch('registrar_voto_presidente.php', {
            method: 'POST',
            body: JSON.stringify({ partido }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Actualiza la UI o muestra un mensaje de confirmación
            console.log(data.message);
        });

        var voteMark = document.createElement("div");
        voteMark.classList.add("vote-mark");
        voteMark.innerHTML = "X";
        button.appendChild(voteMark);

        buttons.forEach(function (btn) {
            if (btn !== button) {
                btn.classList.add("disabled");
            }
        });

        redirectButton.removeAttribute("disabled");
    }

    function redirectToAlcalde() {
            window.location.href = "alcalde.php";
        }
</script>
</body>
</html>

