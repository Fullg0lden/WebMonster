<?php
require __DIR__ . '/Monster.php';
function getMonsters()
{
    return 
	[
		new Monster('Domovoa', 30,'water',300),
		new Monster('Wendigo',100,'earth',450),
		new Monster('Thunderbird', 400,'air',500),
		new Monster('Sirrush',250,'fire',1500),
        /*[
            'name' => 'Domovoï',
            'strength' => 30,
            'life' => 300,
            'type' => 'water'
        ],
        [
            'name' => 'Wendigos',
            'strength' => 100,
            'life' => 450,
            'type' => 'earth'
        ],
        [
            'name' => 'Thunderbird',
            'strength' => 400,
            'life' => 500,
            'type' => 'air'
        ],
        [
            'name' => 'Sirrush',
            'strength' => 250,
            'life' => 1500,
            'type' => 'fire'
        ],*/
    ];
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