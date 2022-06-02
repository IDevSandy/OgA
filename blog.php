<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
</head>
<?php include('header.php');?>
<body>
<?php 
	$where= array(
                "status" => 1
                );

	$c=$obj->select_record('blogs',$where);

    
			
?>
<?php echo $c['content']
?>

    
</body>

<?php include('footer.php');?>
</html>