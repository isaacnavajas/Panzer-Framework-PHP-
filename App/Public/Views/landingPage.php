<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./App/Public/Src/Tengu.png">
    <title>Qultep php</title>
    <link rel="stylesheet" href="./App/Public/Src/Css/style.css">
</head>
<body>
    <div class="content">
        <center>
            <img src="./App/Public/Src/Tengu.png" alt="qultep" id="qultep">
            <h1 class="fontBear">Tengu</h1>
            <p>
                Saludos, soy Isaac Navajas Pozo y estoy desarrollando Tengu, un framework diseñado para ofrecerte una experiencia intuitiva y escalable en el desarrollo de proyectos. Con Tengu, podrás disfrutar de una plataforma fácil de usar que se adapta a cualquier tipo de proyecto. ¡Espero que te entusiasme tanto como a mí!
            </p>
            <p style="font-weight: bold;"><spam><img id="carpeta" src="https://qultep.com/App/Public/Src/carpeta.png"></spam> Versión del framework: <?= $data["version"]; ?>.</p>

            <!--<a id="enlace" href="">¿Cómo utilizar deployer.php?</a>-->
            <hr>
            <p>Descargar Framework Tengu:</p>
            <input type="text" id="copiar" value="www.google.es" readonly>
            <a href="" alt="Descargar Qultep" id="boton">Descargar</a>
            <hr>
            <p class="fontBear">www.isaacnavajaspozo.com/tengu</p>
        </center>
    </div>
    <script>
    
        function aparecer() {
            var elemento = document.getElementById("aparecer");
            elemento.style.display = "block !important;";
        }
        
    </script>
</body>
</html>
