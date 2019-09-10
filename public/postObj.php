<?php 
include 'connection.php';
include 'lib.php';

	class post{
		
		private $title;
		private $text;
		private $date;
		private $id;
		private $imgid;
		private $img;
		
		public function __construct($title, $text, $date, $id, $imgid = NULL){
			$this->title = $title;
			$this->text = $text;
			$this->date = $this->DateDiff($date);
			$this->id   = $id;
			$this->imgid = $imgid;
		}
		
		public function listItem(){
			
			if($this->imgid){
				echo "<div class='post'>
					<h3>".$this->title."</h3>
					<p class='listItem-text'><a href='showpost.php?id=".$this->id."'>".$this->text."</a></p>
					<img height='40px' src='images/".$this->imgid.".jpg'>
					<p>".$this->date."</p>
				</div>";
			}else{
				echo "<div class='post'>
					<h3>".$this->title."</h3>
					<p class='listItem-text'><a href='showpost.php?id=".$this->id."'>".$this->text."</a></p>
					<p>".$this->date."</p>
				</div>";
			}
			
		}
		
		
		public function showPost(){
			
			if($this->imgid){
				echo "<div>
					<h1>".$this->title."</h1>
					<p class='listItem-text'>".$this->text."</p>
					<img class='showPost-image' src='images/".$this->imgid.".jpg'>
					<p>".$this->date."</p>
				</div>";
			}else{
				echo "<div>
					<h3>".$this->title."</h3>
					<p class='listItem-text'><a href='showpost.php?id=".$this->id."'>".$this->text."</a></p>
					<p>".$this->date."</p>
				</div>";
			}
			
			/* if($this->imgid){
				echo "<div class='show-post'>
					<h2>".$this->title."</h2>
					<p>".$this->text."</p>
					<img src='images/".$this->imgid.".jpg'>
					<p>".$this->date."</p>
				</div>";
			}else{
				echo "<div class='show-post'>
					<h2>".$this->title."</h2>
					<p>".$this->text."</p>
					<p>".$this->date."</p>
				</div>";
			} */
			
		}
		
		public function DateDiff($epoch){
			$time = (int)time();
			$diff = $time - (int)$epoch;
			$time = $time - $diff;
			if($diff > 86400){
				return (new DateTime("@$time"))->format('Y-m-d');
			}else{
				if($diff > 3600){
					return (string)((int)((new DateTime("@$diff"))->format('H')))." hours ago";
				}else{
					return (string)((int)((new DateTime("@$diff"))->format('i')))." minutes ago";
				}
			}
		}
		
	}

?>