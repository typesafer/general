<?php
$url = 'http://www.example.com/api/json_endpoint/method1';

/**
Http Endpoint

----------------------------------------------------------------------------------------------------
$str = file_get_contents($url);
----------------------------------------------------------------------------------------------------
*/

$str = '{
"email": "some@email.com",
"product": {
"title": "The Art of War",
"slug": "art-of-war",
"author": [
"Sun Tzu"
],
"description": "Some chinese book about war and stuff.",
"isbn": "9780141023816",
"publisher": "      Penguin",
"images": [
"https://someplace.com/media/products/images/9780141023816_1.jpg"
]
}
}';

/**
Json Decode
*/
$json = json_decode($str);

/**
Flatten Decoded Json
*/
$output = iterator_to_array(new RecursiveIteratorIterator(
    new RecursiveArrayIterator($json)), FALSE);


/**
Check If Image Exists Using Curl: Literal true if exists and false if not. 
*/
function imageCheck($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(curl_exec($ch)!==FALSE)
    {
        echo 'true';
		 mail('youremail@example.com.com', 'the subject', 'image does not exist', null,
   '-webmaster@example.com');
    }
    else
    {
        echo 'false';
		 mail('youremail@example.com.com', 'the subject', 'image exists', null,
   '-webmaster@example.com');
    }
}

echo '<pre>';
print_r($output);
echo '<pre>';

//trim($output['6']); - remove white spaces
echo $output['6'];

$d = $output['6'];
$x = trim($d);

//check is value is empty
if (empty($d)){
        echo "value is empty";
		}
		else{
		echo "value is not empty";
		 mail('youremail@example.com.com', 'the subject', 'value is empty', null,
   '-webmaster@example.com');
		}
		
//check for whitespace
if(count(explode(' ', $x)) > 1) {
  echo 'has white space'.'<br/>';
  mail('youremail@example.com.com', 'the subject', 'white space exists', null,
   '-webmaster@example.com');
}
else{
echo 'no white space'.'<br/>';
}
$source = 'http://qubitsmith.com/mpesa/MPESA.fw.png';
imageCheck($source);

/**
Emailing stuff

mail('youremail@example.com.com', 'the subject', 'the message', null,
   '-webmaster@example.com');
   
*/
?>
