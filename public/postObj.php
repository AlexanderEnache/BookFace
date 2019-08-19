
<?php include 'connection.php'?>
<?php include 'lib.php'?>

<?php

	class post{
		
		private $text;
		private $date;
		private $id;
		private $imgid;
		private $img;
		
		public function __construct($text, $date, $id, $imgid = NULL){
			$this->text = $text;
			$this->date = $this->DateDiff($date);
			$this->id   = $id;
			$this->imgid = $imgid;
		}
		
		public function listItem(){
			
			if($this->imgid){
				echo "<div class='post'>
					<h3><a href='showpost.php?id=".$this->id."'>".$this->text."</a></h3>
					<img height='40px' src='images/".$this->imgid.".jpg'>
					<p>".$this->date."</p>
				</div>";
			}else{
				echo "<div class='post'>
					<h3><a href='showpost.php?id=".$this->id."'>".$this->text."</a></h3>
					<p>".$this->date."</p>
				</div>";
			}
			
		}
		
		/*public function showPost(){
			if($this->img){
				echo "<div>
					<img class='postimg' src='"."images/".(firstRow($result))['image']."'>
					<h3>".$this->text."</h3>
					<p>".$this->date."</p>
				</div>";
			}else{
				echo "<div>
					<h3>".$this->text."</h3>
					<p>".$this->date."</p>
				</div>";
			}
		}*/
		
		public function DateDiff($epoch){
			$diff = time() - $epoch;
			if($diff > 86400){
				return (new DateTime("@$diff"))->format('Y-m-d');
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







