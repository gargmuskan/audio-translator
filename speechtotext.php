<!DOCTYPE html>
<html>
<head>
<title>ENGLISH TO PUNJABI AUDIO CONVERTER</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css" />
<style type="text/css">
body{
font-family: verdana;
}
#result{
height: 200px;
border: 1px solid #ccc;
padding: 10px;
box-shadow: 0 0 10px 0 #bbb;
margin-bottom: 30px;
}
button{
font-size; 20px;
position: absolute;
top: 240px;
left: 50%;
}
</style>
</head>
<body>
<h2 align="center">SPEECH TO TEXT CONVERTER</h2>
<div id="result"></div>
<button onclick="startConverting();"><i class="fa fa-microphone"></i></button>

<form  name="myform" method="POST" action="home.php">
   <input type="hidden" name="variable" id="variable" value="">
    <input type="submit">
</form>

<script type="text/javascript">
 var r = document.getElementById('result');
  var text='';
 function startConverting () {
 if('webkitSpeechRecognition' in window)
 {
 var speechrecognizer = new webkitSpeechRecognition();
 speechrecognizer.continuous=false;
 speechrecognizer.interimResults=false;
 speechrecognizer.lang = 'en-IN';
 speechrecognizer.start();
 finaltranscripts='';
 speechrecognizer.onresult =  function(event){
 var interimtranscipt='';
 for(var i=event.resultIndex; i<event.results.length;i++)
 {
 var transcript =  event.results[i][0].transcript;
 if(event.results[i].isFinal)
 {
 finaltranscripts += transcript;
document.myform.variable.value=finaltranscripts;
 }
 else
 {
 interimtranscipt += transcript;
 }
 }
 r.innerHTML =  finaltranscripts + '<span style="color:#999>' + interimtranscipt  
 + '</span>';
 };
 speechrecognizer.onerror= function(event){
 };
 }
 else{
 r.innerHTML= ' your browser is not supported';
 }
 }
 </script>

</body>
</html>