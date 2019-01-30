<?php
require __DIR__ . '/Monster.php';
function getMonsters()
{
	$dsn = 'mysql:host=localhost;dbname=monsters';
	$username = 'root';
	$password = 'root';
	
	try{
	$dbh = new PDO($dsn, $username, $password);
	}catch(Exception $e){
		die("Erreur : ".$e->getMessage());
	}
	
	$query = "SELECT * FROM monster";
    $result = $dbh -> query($query);
	$monsters = $result->fetchAll();
	
	return $monsters;
}

/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function fight( $firstMonster, $secondMonster)
{
    $firstMonsterLife = $firstMonster->life;
    $secondMonsterLife = $secondMonster->life;

    while ($firstMonsterLife > 0 && $secondMonsterLife > 0) {
        $firstMonsterLife = $firstMonsterLife - $secondMonster->strength;
        $secondMonsterLife = $secondMonsterLife - $firstMonster->strength;
    }

    if ($firstMonsterLife <= 0 && $secondMonsterLife <= 0) {
        $winner = null;
        $looser = null;
    } elseif ($firstMonsterLife <= 0) {
        $winner = $secondMonster;
        $looser = $firstMonster;
    } else {
        $winner = $firstMonster;
        $looser = $secondMonster;
    }

    return array(
        'winner' => $winner,
        'looser' => $looser,
    );
}