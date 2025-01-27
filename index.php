<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia <?php echo date('d');?></title>
</head>
<body>
    <?php 
    function linha($semana) { 
        $diaatual = date ('j');
    
        echo "<tr>";
        for ($i = 0; $i <= 6; $i++) {
            if (isset($semana[$i])) {
                if ($semana[$i] == $diaatual){
                    echo "<td><strong>{$semana[$i]}</strong></td>"; 
                } else { 
                echo "<td>{$semana[$i]}</td>";
                }
            } else {
                echo "<td></td>";
            }   
            }
        echo "</tr>";        
        }
    function calendario()
    {
        $dia = 1;
        $semana = array();
        while ($dia <= 31 ){
            array_push($semana, $dia);
            if (count($semana) == 7) {
                linha($semana);
                $semana = array();
            }
            $dia++;
        }
        linha($semana);
    }
    ?>
    <?php 
    $hora = date('H');
    if ($hora >= 5 && $hora < 12){
        $saudação = "Bom Dia";
    } elseif ($hora >= 12 && $hora < 18){
        $saudação = "Boa Tarde";
    }else {
        $saudação = "Boa Noite";
    }
    echo "<h1> $saudação!</h1>"
    ?>
    

    <table border = "1">
        <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sab</th>
        </tr>
        <?php calendario(); ?>
    </table>
  
</body>
</html>