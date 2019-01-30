<?php
	
		class Monster{
			public $name;
			public $strength;
			public $type;
			public $life;
			
			public function __construct(string $_name,int $_strength, String $_type, int $_life){
				$this->name = $_name;
				$this->strength=$_strength;
				$this->type = $_type;
				$this->life = $_life;
			}
			
		}
		
?>