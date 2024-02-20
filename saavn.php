<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saavn Homepage Songs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,400,500,700&amp;display=swap'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.11/mediaelementplayer.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>

<?php 

$b='blue';
$c='green';
$e='violet';
$f='cyan';
$h='magnetica';
$i='#11998E';
$j='#EA8D8D';
$k='#D8B5FF';
$l='#FF61D2';
$m='#4E65FF';
$o='#868F96';
$p='#09203F';
$q='#764BA2';
$r='#2E3192';
$char="bcefhijklmopqr";
$clr=substr(str_shuffle($char), 0, 1);
$color=$$clr;



/*$url = file_get_contents("https://saavn.me/modules?&language=telugu");
$dec = json_decode($url, true);
$data = $dec['data'];
$trend = $data['trending'];
$songs = $trend['songs'];
$albums = $data['albums'];
$charts = $data['charts'];
$playlists = $data['playlists'];
*/


if(isset($_GET['song']))
{
$song_name = urlencode($_GET['song']);
$url = "https://saavn.me/search/songs?query=$song_name";
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);
 $decod = json_decode($res, true);
 $ldat = $decod['data'];
 $sng = $ldat['results'];
 $name = $sng['0']['name'];
 $image = $sng['0']['image']['2']['link'];

 $i=0;
 foreach  ($sng['0']['downloadUrl'] as $list) {
    $i++;
 }
 $i--;
    $final = $sng['0']['downloadUrl'][$i]["link"];
 $album_id = $sng['0']['album']['id'];
 $album_name = $sng['0']['album']['name'];

/*
 echo $name.' - '.$album_name.'<br>' ;
 echo $image.'<br>';
 echo $final.'<br>';
 echo $album_name.'<br>';
 */

}
?>

<div class="main">
    <h2 class="title">Song Finder</h2>
    <form class="form">
    <center><label style="font-family: poppins; font-size: 1.1rem; font-weight:bold;">Search Your Song: </label>
        <br><br><input type="text" name="song" placeholder="Enter Song Name" required>
        <br><input type="submit" style="font-size:15px; padding: 10px; background-color: blue; color: white; border-radius: 5px; font-family:poppins;" > </center>
    </form>
    
    <?php if(isset($_GET['song'])): ?>

        <?php 
$url = "https://saavn.me/albums?id=$album_id";
//$url = "https://www.jiosaavn.com/api.php?p=1&q=Telugu&_format=json&_marker=0&api_version=4&ctx=web6dot0&n=40&__call=search.getResults";
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);   
$tren = json_decode($res, true);
$trend = $tren['data']['songs'];
?>
    <center>
<div id="root"></div>
    </center>

<br>

<?php endif; ?>

<div class="dbox">
        <h2 style="color: <?php echo $color;?>;" id="dev"><!--- Don't Act Smart To Change This ---></h2>
    </div>
    <br>
            

    <div class="box">
        hi
    </div>
    <br>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/react/16.8.6/umd/react.production.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.8.6/umd/react-dom.production.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react-router/5.0.1/react-router.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.11/mediaelement-and-player.min.js'></script><script  src="./script.js"></script>

</body>
</html>