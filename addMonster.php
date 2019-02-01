<?php

require __DIR__ . '/functions.php';



$monsterName = isset($_POST['monsterName']) ? $_POST['monsterName'] : null;
$monsterStrength = isset($_POST['monsterStrength']) ? $_POST['monsterStrength'] : null;
$monsterLife = isset($_POST['monsterLife']) ? $_POST['monsterLife'] : null;
$monsterType = isset($_POST['monsterType']) ? $_POST['monsterType'] : null;

if (!is_null($monsterName) && !is_null($monsterStrength)&&!is_null($monsterType) && !is_null($monsterLife)) {
    setMonster($monsterName, $monsterStrength, $monsterLife, $monsterType);
}
$monsters = getMonsters();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monsters League</title>

        <!-- CSS files -->
        <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Monsters League</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

       <div class="jumbotron jumbotron-fluid">
		  <div class="container">
			<h1 class="display-4">Please add a Monster !</h1>
			<p class="lead">Make the best one !</p>
		  </div>
		</div>
		
			<div class="row justify-content-md-center m-4">
			  <form method="POST" action="addMonster.php">
				<div class="form-row">
					<div class="form-group m-1">
						<label for="MonsterName">Enter a Monster Name</label>
						<input type="text" class="form-control" id="MonsterName" placeholder="exampleMonster" name="monsterName">
					</div>
					<div class="form-group m-1">
						<label for="Strength">Enter your Monster's strength</label>
						<input type="number" class="form-control" id="Strength" placeholder="ex: 150" name="monsterStrength">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group m-1">
						<label for="Life">Enter your Monster'life</label>
						<input type="number" class="form-control" id="Life" placeholder="ex : 250" name="monsterLife">
					</div>
						<div class="form-group m-1">
							<label for="exampleFormControlSelect1">Choose your Monster's type</label>
								<select class="form-control" id="exampleFormControlSelect1" name="monsterType">
								  <option value="air">air</option>
								  <option value="earth">earth</option>
								  <option value="water">water</option>
								  <option value="fire">fire</option>
							</select>
					 </div>
				</div>
				<div class="row justify-content-md-center">
					<button class="btn btn-success" type="submit">Add !</button>
				</div>
			</form>
			</div>

        <div class="container">
            <table class="table table-hover">
                <caption><i class="fas fa-info"></i> Members of the monster league</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Strength</th>
                        <th>Life</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					foreach ($monsters as $monster) { ?>
                        <tr>
                            <td><?php echo $monster->name; ?></td>
                            <td><?php echo $monster->strength; ?></td>
                            <td><?php echo $monster->life; ?></td>
                            <td><?php echo $monster->type; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <footer>
            <div class="container">
                <p>Copyright © 2019 Monsters League</p>
            </div>
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    </body>
</html>