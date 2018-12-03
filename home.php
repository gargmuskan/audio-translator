<html>
<head>
<h2 align="center"> ENGLISH TEXT TO PUNJABI TEXT </h2>
</head>
<body>
</br>
<h4> The corresponding punjabi text is :  </h4>
</br>
</body>
</html>
<?php
require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;
$var = $_POST['variable'];
$source = 'en';
$target = 'pa';
$text = 'name';
 
$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $var);

echo $result;

?>
</br>
<form name="myform" action="testaudio.php" method="post">
<input type="hidden" name="result" value="<?php echo $result ?>">
<input type="submit" name="submit" value="submit">
</form>