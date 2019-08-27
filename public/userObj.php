<?php

	class user{
		
		private $username;
		private $name;
		private $id;
		
		public function __construct($username, $name, $id){
			$this->username = $username;
			$this->name = $name;
			$this->id = $id;
		}
		
		public function toString(){
			echo "<div class='post'>
					<h3>
						<a href='page.php?id=".$this->id."'>".$this->name."</a>
					</h3>
				</div>";
		}
	
		public function open(){
			header('Location: index.php');
		}
	
	}

?>