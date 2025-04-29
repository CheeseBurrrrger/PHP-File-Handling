<?php
// echo "<= ini pake readfile ".readfile('testing.txt'); // ini disamping buat baca konten dari file dan ada jumlah karakter

// $tess = fopen('testing.txt','r');
// echo "<br>";
// $filesize = filesize('testing.txt');
// echo "ini coba pake fread => ". fread($tess,$filesize)."<br>";
// fclose($tess);

//coba search

// $search = 'bmw';
// $file = fopen('testing.txt','r');
// $filesize = filesize('testing.txt');
// $text = fread($file,$filesize);
// echo $text;

// echo "<br>ini nyoba count = ".substr_count($text,'bmw')."<br><br>";
// if (str_contains($text,$search)){
//     $newstring = str_replace($search,'<em>mercedes</em>',$text." ini setelahnya ");
// };
// echo "<br><br>!!".$newstring;
// echo "<br><br>coba substring ".substr_count($text,'coba');
// echo fread($file,$filesize);
// file_put_contents('testing.txt',$newstring);
// echo "<br><br>ini read setelah edit ".fread($file,$filesize);
// echo "<br><br>".$text;


//•To write data to a file, use fwrite()

// $file_handle = fopen('article.txt', 'r+');
// fwrite($file_handle, 'A string data');

// file_put_contents(filename, data, mode, context) //source w3schools

// lets make it more clean

$search = 'bmw';
$replace = 'bmw m-series';
$fileread = fopen('testing.txt','r+');
$size = filesize('testing.txt');
$text = fread($fileread,$size);
echo $text.'<br>';
$newstring = str_replace($search,$search.' terus kuganti <em>'.$replace.'</em>',$text);
$finalstring = str_replace('awalnya '.$search,'jadi <em>'.$replace.'</em>',$text);
echo $newstring.'<br>';
echo $finalstring.'<br>';

file_put_contents('testing.txt',$finalstring);

echo 'ini print filenya => '.$text;

    function readOnly(){
        $file = fopen('testing.txt','r');
        $text = file_get_contents('testing.txt');
        return $text;
    }

echo readOnly();