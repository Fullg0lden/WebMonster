<?php
require __DIR__ . '/Monster.php';
function getMonsters()
{
	
		$listMonsters = file_get_contents('resources/monsters.json');
		$json = json_decode($listMonsters);
		
		$tab= array();
		$arrayObj = new ArrayObject($tab);
		foreach($json as $monster){
			$monsterOb= new Monster($monster->name, $monster->strength, $monster->type, $monster->life);
			
			$arrayObj->offsetSet($monsterOb->name, $monsterOb);
			
		}
		return $arrayObj;
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