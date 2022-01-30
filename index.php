<?php

/**
* function for upload 
*  @param $_FILES['inputname'] =>array
*  @return	false| string
**/
function upload($file){
	$newname=str_shuffle("inputname").$file['name'];
	$location="./".$newname;
	if(move_uploaded_file($file['tmp_name'],$location)){
		return $location;
	}else{
		return 0;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Simple Multi Uploader </title>
	<style>
	.input-div{
		padding: 5px;
		border: 1px solid;
		border-radius: 113px;
		text-align: center;
		justify-items: center;
		display: grid;
	}
	button[type="submit"]{
		font-size:16px;
		margin-top:10px;
		background-color:green;
		border-radius:10px;
	}
	form{
		text-align:center;
	}
	.error{
		color:red;
		border: 1px solid;
		padding: 6px;
		border-radius: 10px;
	}
	.text-success{
		text-align:center;
		color:green !important;
	}
	</style>
</head>
<body>
<?php

foreach($_FILES as $key=>$file){
	if($file['error']==0){
		$link=upload($file);
		if($link){ ?>
			<p class="text-success">file successfully uploaded you can see  <a href=".<?= $link?>">here</a></p>
		<?php
		}else{
			echo "<p class=\"error\">Error </p>";
		}
	}else{
			
		echo "<p style=\"text-align:center;\" ><span class=\"error\">error with $key</span></p>";
	}
}
?>

<div>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="input-div">
  Select file:   <input type="file" name="file1">
  </div>
    <div class="input-div">
  Select file:   <input type="file" name="file2">
  </div>
    <div class="input-div">
  Select file:   <input type="file" name="file3">
  </div>
    <div class="input-div">
  Select file:   <input type="file" name="file4">
</div>
  <button type="submit" name="button">save</button>
  </form>
</div>
</body>

</html>
