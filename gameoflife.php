<style>
    table {border-collapse: collapse;}
    td {width: 5px; height: 5px;}

    tr{background: #999;}
    b{background: #000;}
</style>

<?php
    if(!isset($_GET['generation'])){
        $generation = 0;
    }
    else{
        $generation = $_GET['generation'];
    }

    function emptyArray(){
        $row = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        return $row;
    }

    function newGame(){
        for($i = 0; $i < 10; $i++){
            $game[] = emptyArray();
        }

        return $game;
    }

    function place($game, $column, $row){
        $game[$column][$row] = 1;

        return $game;
    }

    function returnColor($field){
        if($field == 0){
            return $field;
        }
        else{
            return "<b>".$field."</b>";
        }
    }

    function drawGame($game){
        echo "<table style='width:10%'>";
        
        for($c = 0; $c < 10; $c++){
            echo "<tr>";
            
            for($r = 0; $r < 10; $r++){
                echo "<td>" . returnColor($game[$c][$r]) . "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";
    }

    $game = newGame();

    $game = place($game, 1, 1);

    drawGame($game);

    echo 'Generation: ' . $generation . '<br>';

    echo '<a href="gameoflife.php?generation=' . (string)$generation + 1 . '"> Next </a>';
?>