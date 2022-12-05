<?php


class Apiuse{

    private static $desc;
    private static $qntLuas = 0;
    private static $vetorPlaneta = array("mercury","venus","earth","mars","jupiter","saturn","uranus","neptune");
    private static $planetaExiste=false;
    private static $nomePortugues;

    private static function verificaSePlanetaExiste($nomePlaneta){
        foreach(Apiuse::$vetorPlaneta as $planeta)
        {
            if($nomePlaneta == $planeta)
                Apiuse::$planetaExiste = true;
        }
    }

    public static function usaAPI($nomePlaneta)
    {
        $url = "https://api.le-systeme-solaire.net/rest/bodies/".$nomePlaneta;
        Apiuse::verificaSePlanetaExiste($nomePlaneta);
        if(!APIuse::$planetaExiste)
        {
            echo "este planeta não existe em nossa base de dados";
            header("Location:../Planetas/index.html");
            return;
        }
        $file = file_get_contents($url);
        $vetorInformacao = json_decode($file,true);
        Apiuse::colocaDescricao($nomePlaneta);
        if(is_array($vetorInformacao["moons"]))
        {
            foreach($vetorInformacao["moons"] as $aux){
                Apiuse::$qntLuas += 1;
            }
        }

        $planeta = new Planeta(Apiuse::$nomePortugues,Apiuse::$desc,$vetorInformacao["gravity"],Apiuse::$qntLuas);
        return $planeta;
    }

    private static function colocaDescricao ($nomePlaneta)
    {
        switch ($nomePlaneta)
        {   
            case "mercury":
                Apiuse::$nomePortugues = "Mercúrio";
                Apiuse::$desc = "O planeta Mercúrio possui três recordes: é o mais rápido, o mais próximo do sol e o 
                menor planeta do sistema solar. Mercúrio é o primeiro planeta do sistema solar, a contar a partir da proximidade com o Sol, 
                distando-se em apenas 57,9 milhões de quilômetros da estrela em média.";
            break;

            case "venus":
                Apiuse::$nomePortugues = "Vênus";
                Apiuse::$desc = "Vênus é um dos planetas que compõem o Sistema Solar, 
                sendo o segundo planeta a partir do sol e o de maior proximidade com a Terra. 
                Vênus é um planeta que compõe o sistema solar. Está situado no sistema 
                solar no segundo lugar entre os planetas a partir do sol.";
            break;

            case "earth":
                Apiuse::$nomePortugues = "Terra";
                Apiuse::$desc = "Conhecido também como planeta água, é o maior dentre os quatro planetas rochosos que fazem parte do Sistema Solar. 
                O Planeta Terra é conhecido como Planeta Azul, por ter 70% da sua superfície coberta de água. 
                O Planeta Terra é um dos planetas que fazem parte do Sistema Solar e é o terceiro planeta mais próximo do Sol.";
            break;

            case "mars" :
                Apiuse::$nomePortugues = "Marte";
                Apiuse::$desc = "Marte é o quarto planeta a partir do Sol, 
                o segundo menor do Sistema Solar. Batizado em homenagem ao deus 
                romano da guerra, muitas vezes é descrito como o Planeta Vermelho, 
                porque o óxido de ferro predominante em sua superfície lhe dá uma aparência avermelhada.";
            break;

            case "jupiter":
                Apiuse::$nomePortugues = "Júpiter";
                Apiuse::$desc = "Quinto planeta a partir do Sol, situado entre Marte e Saturno, Júpiter é o maior planeta do sistema solar, 
                com diâmetro de 142.984 quilômetros – caberiam mil planetas como a Terra em Júpiter. 
                Sua atmosfera é composta principalmente de hidrogênio e hélio.";
            break;

            case "saturn":
                Apiuse::$nomePortugues = "Saturno";
                Apiuse::$desc = "Saturno, que é o segundo maior planeta do nosso sistema solar, 
                tem um diâmetro nove vezes maior que o da Terra e é composto, em maior parte, por hidrogênio. 
                Saturno é o sexto planeta do Sistema Solar — contando-se a partir da distância do sol —, 
                sendo mais conhecido pelos anéis que o circundam.";
            break;

            case "uranus":
                Apiuse::$nomePortugues = "Urano";
                Apiuse::$desc = "O planeta Urano faz parte do conjunto de planetas do Sistema Solar e fica entre Saturno e Netuno. 
                É o sétimo planeta partindo do sol. 
                Ele tem a coloração azul-esverdeada originada da fusão dos vários gases inclusos em sua atmosfera.";
            break;

            case "neptune":
                Apiuse::$nomePortugues = "Netuno";
                Apiuse::$desc = "O planeta azul tem muitas similaridades com outro mundo do nosso sistema: Urano. 
                Com um centro sólido do tamanho da Terra, Netuno tem em sua composição água, amônia e metano. Sua atmosfera é feita de hidrogênio, 
                hélio e também metano. 
                É o próprio metano que faz com que Urano e Netuno tenham a mesma cor azul";
            break;
        }
    }
}