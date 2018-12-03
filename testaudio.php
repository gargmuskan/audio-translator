<?php
require_once("config.php");
?>
<head>
<h2 align="center"> PUNJABI TEXT TO AUDIO CONVERTER </h2>
<meta charset="UTF-8">
</head> 
</body>
<h4> The corresponding punjabi audio is : </h4>
<body>
<?php
$result=$_POST['result'];

$l=1;

$arr=array('ਾ','ਿ','ੀ','ੋ','ੌ','ੁ','ੂ','ੇ','ੈ','ੰ','ਂ');
$except="ੱ ";
$res=array();
//echo $word;
$j=0;
function str_split_unicode($str, $length = 1) {
    $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
    if ($length > 1) {
        $chunks = array_chunk($tmp, $length);
        foreach ($chunks as $i => $chunk) {
            $chunks[$i] = join('', (array) $chunk);
        }
        $tmp = $res;
    }
    return $tmp;
}

$res= str_split_unicode($result,$l);
$final=array();
$j=0;
foreach ($res as $i => $word)
{
	$m=0;
	foreach ($arr as $x) {
		if($x==$word)
		{
			$final[$j-1]=$final[$j-1].$word;
			$m=1;
		}
	}
	if($word=='ੱ ')
	{
		continue;
	}
	else if($m==0)
     {
     	$final[$j++]=$word;
     }
}
//$audioarray=array();
$fp=fopen("empty.mp3","r+");
ftruncate($fp,0);
foreach ($final as $i=> $syl) 
{
	//echo $syl." ";
$query="select url from table2 where punjabi like '" .$syl. "'";
//$query="select url from table2 where punjabi='$syl'";
mysqli_set_charset($con,'utf8');
$res=mysqli_query($con,$query);
//echo mysqli_num_rows($res);
while($row=mysqli_fetch_array($res))
{
	//echo $row['url'];
	//$audioarray[$i++]=$row['url'];
    $file=$row['url'].".mp3";
	file_put_contents('empty.mp3',file_get_contents('audios\\'.$file),FILE_APPEND);
	
?>
 
<?php

}
}
?>
	<audio controls autoplay="true">
	<source src="empty" type="audio/mp3">
	</source>
	</audio>
