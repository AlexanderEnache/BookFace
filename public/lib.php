<?php

function firstRow($result){
	while($current = mysqli_fetch_assoc($result)){
		return $current;
	}
	return 0;
}

?>