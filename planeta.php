<?php
    require_once "../Planetas/model/Planeta.php";
    require_once "../Planetas/model/ApiUse.php";

    $nome = $_GET["planeta"];
    $planeta = Apiuse::usaAPI($nome);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/root.css" type="text/css" />
    <link rel="stylesheet" href="assets/style/stylePlaneta.css" type="text/css"/>
    <title>Planeta <?php echo $planeta->__get("nome");?></title>
</head>

<body>
    <main>
        <div class="container-planeta">
            <h1><?php echo $planeta->__get("nome")?></h1>
            <div class = "planeta">
                <div class="imageSettings" id="planet"></div>
            </div>
        </div>

        <div class="information">
            <div class="descricao">
                <span class="descricaoTitulo Titulo">Sobre</span>
                <br><br>
                <span class="descricaoInformacao desc"><?php echo $planeta->__get("descricao") ?></span>
            </div>
            <br><br>
            <div class="gravidade_lua">
                <div class="gravidade">
                    <span class="gravidadeTitulo Titulo">Gravidade:</span>
                    <span class="gravidadeInformacao desc"><?php echo $planeta->__get("gravidade") ?> m/s²</span>
                </div>
                <div class="lua">
                    <span class="luaTitulo Titulo">Luas:</span>
                    <span class="luaInformacao desc"><?php echo $planeta->__get("qntLuas") ?></span>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <p>© Copyright 2022 Everton Soares</P>
    </footer>

    <script>
        const planeta = document.getElementById("planet")
        const luas = document.getElementById("luas")

        let nomePlaneta = "<?php echo $planeta->__get("nome");?>"
        
        switch (nomePlaneta)
        {
            case "Mercúrio":
                planeta.classList.add("mercury")
            break;
            
            case "Vênus":
                planeta.classList.add("venus")
            break;

            case "Terra":
                planeta.classList.add("earth")
            break

            case "Marte":
                planeta.classList.add("mars")
            break

            case "Júpiter":
                planeta.classList.add("jupiter")
            break

            case "Saturno":
                planeta.classList.add("saturn")
            break;

            case "Urano":
                planeta.classList.add("uranus")
            break;

            case "Netuno":
                planeta.classList.add("neptune")
            break;
        }
    </script>
</body>
</html>