<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username1 = $_POST['player1'];
  $username2 = $_POST['player2'];
}

else{
    $username1 = null;
    $username2 = null;
}

?>

<html>
<head>
<title></title>
</head>
<body>
    <header><h2>Welcome to battle royal</h2></header>
<form action="" method="post">
  Player 1 Name: <input type="text" name="player1">
  <br>
  Player 2 Name: <input type="text" name="player2">
  <br>
  <input type="submit">
</form>


<?php

$player1="Player 1";
$player2= "Player 2";

class gameStart{

    public $hitPoints;
    public $name;
    public $class;

    public function __construct(){
        echo "Your character names are: <br>";

    }
    
}

class player1{
    public $healthPoints= 100;
    public $strikePoints= 20;

    function strike(){
        $this->healthPoints -= $this->strikePoints;
     
    }

    function name(){
        return 'Player 1 Turn';
    }
        
}

class player2{
    public $healthPoints= 100;
    public $strikePoints= 20;
    

    function strike(){
        $this->healthPoints -= $this->strikePoints;
        
    }

    function name(){
        return 'Player 2 Turn';
    }
        
}

$p1= new player1 ();
$p2= new player2 ();


    // echo '<pre>';
    // var_dump($p1-> healthPoints);
    // echo '</pre>';

new gameStart()

?>

<?php if ($username1) { ?>
<p><strong><?php echo (strtoupper($player1));?></strong> has chosen the name of <strong><?php echo (strtoupper($username1)); ?></strong></p>
<?php } ?>

<?php if ($username2) { ?>
<p> <strong><?php echo (strtoupper($player2));?></strong> has chosen the name of <strong><?php echo (strtoupper($username2)); ?></strong></p>
<?php } ?>


<?php

if (!$username1 || !$username2 ){
    echo 'Waiting On Input...!';
}

    else{

    $isPlayer1Turn = true;

    while ($p1->healthPoints >= 0 && $p2->healthPoints >= 0) { ?>

        <form action="" method="get">
                <input type="text" name="hit" placeholder="Enter 'hit' to attack">
        </form>

    <!-- echo $_GET["hit"]; ?> -->

    <?php   

        if ($isPlayer1Turn && $_GET["hit"]=="hit") {

            // Player 1's attacks
            $p1->strike(); 

            echo $username1.' attacks ' . $username2.". ". $username2 . "'s health is: " . $p2->healthPoints . '<br>';
            
        } else if (!$isPlayer1Turn && $_GET["hit"]=="hit") {
            // player 2 attacks
            $p2->strike(); 
            echo $username2.' attacks ' . $username1.". ". $username1 ."'s health is: " . $p1->healthPoints . '<br>';
        }

        else {
            echo "enter again";
            break;
        }
        
        $isPlayer1Turn = !$isPlayer1Turn; // Toggle turns
    }

    // Game over, determine the winner

    if (!$username1 || !$username2 ){
        echo 'Waiting On Winner...!';
    }

    else{
        if ($p1->healthPoints <= 0) {
            echo "<br>" ."<strong>". (strtoupper($username2)) . "</strong>" .' wins!';
        } else {
            echo (strtoupper($username1)) .' wins!';
        }
    }
}
?>

</body>
</html>