<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->title; ?></title>
		<meta charset = "<?php echo $this->charset; ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
if($this->seo != null)
{
foreach($this->seo->meta as $meta => $data)
{
?>
		<meta name="<?php echo $meta; ?>" content = "<?php echo $data; ?>">
<?php
}

foreach($this->seo->og as $og => $data)
{
?>
		<meta property="og:<?php echo $og; ?>" content = "<?php echo $data; ?>"/>
<?php
}
}
?>

<?php
if($this->cssdata != null)
{
foreach($this->cssdata as $cssdata)
{
?>
		<link type="text/css" rel="stylesheet" href = "<?php echo "../../".$cssdata ?>">
<?php
}
}
?>
	</head>
	<body>
