<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $_POST["percorso"]!="" and isset($_POST['up'])){
$q = $_POST['indice'];
$percorso1=$_POST["percorso"];
$percorso1=str_replace(" ", "", $percorso1);
$percorso1=str_replace("/", "", $percorso1);
$percorso1=str_replace(".", "", $percorso1);
mkdir($percorso1, 0755, true);


for ($i=1; $i<=$q; $i++)
{
	$idd="up".$i;
	$corpo.=upload($percorso1, $idd);
}

$pr=$percorso1."/index.html";
$fp = fopen($pr, 'w');
fclose($fp);

file_put_contents($pr, $corpo);
header("Location: /$percorso1");
}

function upload($percorso, $id){
$testo="";
if(!isset($_FILES[$id]['error']) || is_array($_FILES[$id]['error'] || $_FILES[$id]["name"]=="")){}else{
$cartella_upload = $percorso."/";  
//exit($cartella_upload);
      
    // 2) settiamo un array in cui indichiamo il tipo di file che consentiamo l'upload  
    // in questo esempio solo immagini      
        
    // 3) settiamo la dimensione massima del file (1048576 byte = 1Gb)  
    $max_byte = 1073741824;  
    // se il form è stato inviato 
	$url=$_FILES[$id]["name"];
    if(1==1)  
       {
       // verifichiamo che l'utente abbia selezionato un file  
       if(trim($_FILES[$id]["name"]) == '')  
          {  
          return(""); exit('Non hai selezionato nessun file!');  
          }  
      
       // verifichiamo che il file è stato caricato  
       else if(!is_uploaded_file($_FILES[$id]["tmp_name"]) or $_FILES[$id]["error"]>0)  
          {  
         return(""); exit('Si sono verificati problemi nella procedura di upload!');  
          }
      
       /* // verifichiamo che il tipo è fra quelli consentiti  
       else if(!in_array(strtolower(end(explode('.', $nome_vecchio))),$tipi_consentiti))  
          {  
			header('Location: /docup.php');
          exit ('Puoi caricare soltanto file in formato PDF!');
          } 	   */
       // verifichiamo che la dimensione del file non eccede quella massima  
       else if($_FILES[$id]["size"] > $max_byte)  
          {  
        return("");  exit('Il file che si desidera uplodare eccede la dimensione massima!');  
          }  
          
        // verifichiamo che la cartella di destinazione settata esista  
        else if(!is_dir($cartella_upload))  
            {  
		exit("a");
            echo 'La cartella in cui si desidera salvare il file non esiste!';  
            }  
          
        // verifichiamo che la cartella di destinazione abbia i permessi di scrittura  
        else if(!is_writable($cartella_upload))  
            {  
		exit("b");
            echo "La cartella in cui fare l'upload non ha i permessi!";  
            }  
       // verifichiamo il successo della procedura di upload nella cartella settata  
       else if(!move_uploaded_file($_FILES[$id]["tmp_name"], $cartella_upload.$_FILES[$id]["name"]))  
          {  
      return("");    exit('Ops qualcosa è andato storto nella procedura di upload!');  
          }  
      
       // altrimenti significa che è andato tutto ok  
       else  
          {  
          //echo $_FILES[$id]["name"];
		  //exit("ok");
		  $testo="<a href='$url'>$url</a><br><br>";
          }  
       }  
	   else{
		   //exit("NON ESISTE");
	   }
}	 

return $testo;
}
?>
<html>
<head>
<style>
.invio {
	-moz-box-shadow: 0px 1px 0px 0px #fff6af;
	-webkit-box-shadow: 0px 1px 0px 0px #fff6af;
	box-shadow: 0px 1px 0px 0px #fff6af;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
	background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
	background-color:#ffec64;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #ffaa22;
	display:inline-block;
	cursor:pointer;
	color:#333333;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffee66;
}
.invio:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffab23), color-stop(1, #ffec64));
	background:-moz-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-webkit-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-o-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-ms-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffab23', endColorstr='#ffec64',GradientType=0);
	background-color:#ffab23;
}
.invio:active {
	position:relative;
	top:1px;
}

.testo {
  display: inline-block;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  padding: 10px 20px;
  border-top: 4px solid rgba(90,90,90,1);
  border-right: 9px solid rgba(90,90,90,1);
  border-bottom: 4px solid rgba(90,90,90,1);
  border-left: 9px solid rgba(90,90,90,1);
  -webkit-border-radius: 3px;
  border-radius: 3px;
  font: normal normal bold 16px/normal Verdana, Geneva, sans-serif;
  color: rgba(0,0,0,1);
  -o-text-overflow: clip;
  text-overflow: clip;
  background: -webkit-linear-gradient(-90deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%), #ffffff;
  background: -moz-linear-gradient(180deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%), #ffffff;
  background: linear-gradient(180deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%), #ffffff;
  background-position: 50% 50%;
  -webkit-background-origin: padding-box;
  background-origin: padding-box;
  -webkit-background-clip: border-box;
  background-clip: border-box;
  -webkit-background-size: auto auto;
  background-size: auto auto;
  text-shadow: 1px 1px 0 rgba(255,255,255,0.66) ;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
}

body{
background-color:#ffd700;
}

.sfoglia {
  display: inline-block;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  padding: 10px 20px;
  border: 1px solid #b7b7b7;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  font: normal 16px/normal "Comic Sans MS", cursive, sans-serif;
  color: rgba(0,0,0,1);
  -o-text-overflow: clip;
  text-overflow: clip;
  background: -webkit-linear-gradient(0deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
  background: -moz-linear-gradient(90deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
  background: linear-gradient(90deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
  background-position: 50% 50%;
  -webkit-background-origin: padding-box;
  background-origin: padding-box;
  -webkit-background-clip: border-box;
  background-clip: border-box;
  -webkit-background-size: auto auto;
  background-size: auto auto;
  -webkit-box-shadow: 2px 2px 2px 0 rgba(0,0,0,1) ;
  box-shadow: 2px 2px 2px 0 rgba(0,0,0,1) ;
  text-shadow: 1px 1px 0 rgba(255,255,255,0.66) ;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
}

.segno {
  display: inline-block;
  -webkit-box-sizing: class="support css-value">content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  cursor: pointer;
  padding: 10px 20px;
  border: 1px solid #018dc4;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  font: normal 16px/normal "Comic Sans MS", cursive, sans-serif;
  color: rgba(0,0,0,1);
  -o-text-overflow: clip;
  text-overflow: clip;
  background: -webkit-linear-gradient(0deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%), #0199d9;
  background: -moz-linear-gradient(90deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%), #0199d9;
  background: linear-gradient(90deg, rgba(252,234,187,1) 0, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%), #0199d9;
  background-position: 50% 50%;
  -webkit-background-origin: padding-box;
  background-origin: padding-box;
  -webkit-background-clip: border-box;
  background-clip: border-box;
  -webkit-background-size: auto auto;
  background-size: auto auto;
  -webkit-box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
  box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
  -webkit-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
}

#titolo {
color: #bc2e1e;
background: #edde9c;
text-shadow: 0 1px 0px #378ab4, 1px 0 0px #5dabcd, 1px 2px 1px #378ab4, 2px 1px 1px #5dabcd, 2px 3px 2px #378ab4, 3px 2px 2px #5dabcd, 3px 4px 2px #378ab4, 4px 3px 3px #5dabcd, 4px 5px 3px #378ab4, 5px 4px 2px #5dabcd, 5px 6px 2px #378ab4, 6px 5px 2px #5dabcd, 6px 7px 1px #378ab4, 7px 6px 1px #5dabcd, 7px 8px 0px #378ab4, 8px 7px 0px #5dabcd;
color: #bc2e1e;
background: #edde9c;
font-size:46;
}
</style>
<script language="javascript">
//alert("a");
	function add(id){
		
		var n = parseInt(id.replace("b",""))+1;
		var m = n-1;
		var c = "c"+m;
		document.getElementById("list").innerHTML=document.getElementById("list").innerHTML+'<div id="'+n+'"><input class="sfoglia" name="up'+n+'" id="up'+n+'" type="file"/><div id="c'+n+'"  style="display:inline;"><button class="segno" id="b'+n+'" onclick="add(this.id)"/>+</button></div></div>';
		//document.getElementById("list").innerHTML=document.getElementById("list").innerHTML+'aaaa';
		document.getElementById(c).innerHTML='<button class="segno" id="'+id+'" onclick="remove(this.id)"/>-</button>';
		document.getElementById("indice").value=parseInt(document.getElementById("indice").value)+1;
	}
	
	function remove(id){
		var n = parseInt(id.replace("b",""));
		document.getElementById(n).remove();
	}
</script>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<div id="titolo" name="titolo">CONDIVIDI I TUOI AVERI CON I TUOI COMPARI!</div>
di <b>Mike Peres<b><br>
<input name="percorso" type="text" placeholder="Nome..." class="testo"></input>

<div id="list">
	<div id="1"><input class="sfoglia" name="up1" id="up1" type="file"/><div id="c1" style="display:inline;"><button class="segno" id="b1" onclick="add(this.id)"/>+</button></div></div>
</div>

<input type="hidden" name="indice" id="indice" value="1"/>
<br>
<input type="submit" name="up" class="invio"/>
</form>
</body>
</html>