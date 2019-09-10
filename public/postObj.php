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
					<p><a href='showpost.php?id=".$this->id."'>".$this->text."</a></p>
					<img height='40px' src='images/".$this->imgid.".jpg'>
					<p>".$this->date."</p>
				</div>";
			}else{
				echo "<div class='post'>
					<h3>".$this->title."</h3>
					<p><a href='showpost.php?id=".$this->id."'>".$this->text."</a></p>
					<p>".$this->date."</p>
				</div>";
			}
			
		}
		
		
		public function showPost(){
			
			if($this->imgid){
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
			}
			
		}
		
		/* public function showPost(){
			if($this->imgid){
				echo "<div>
					<img class='postimg' src='"."images/".(firstRow($result))['image']."'>
					<h1>".(firstRow($result))['image']."AAA</h1>
					<p>".$this->date."</p>
				</div>";
			}else{
				echo "<div>
					
					<p>".$this->date."</p>
				</div>";
			}
		} */
		
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
		
		/*static function Post(){
			
			if(!empty($_FILES['image']['name'])){
				
				$target = "images/".basename($_FILES['image']['name']);
				
				$image = $_FILES['image']['name'];
				
				$result = mysqli_query($connection, "insert into image(image) values('$image');");
				
				$id = mysqli_insert_id($connection);
				$imgid = firstRow(mysqli_query($connection, "select * from image where id = '".$id."';"));
				//echo $imgid['image'];
				
				if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
					//echo '<h1>Wirked</h1>';
				}else{
					//echo '<h1>Didnt wirk</h1>';
				}

			}
		
		}*/
		
	}

?>