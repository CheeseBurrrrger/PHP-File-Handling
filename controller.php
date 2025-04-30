<?php
class controller{
    function refinedCase2(){
        $namafile = $_POST['namafile'];
        $keyword = $_POST['keyword'];
        $operasi = $_POST['operasi'];
        $output = $_POST['output'];
        $modewrite = ($output=='N'||$output=='n')? $modewrite='w': $modewrite='r+';
        ($modewrite=='w')? $newnamafile = str_replace('.txt','',$namafile).'-new.txt':$newnamafile=$namafile;
        $readFile = (file_exists($namafile))?fopen($namafile,'r'):die('unfortunately we cannot find the file:(');
        echo '<br>isi konten dalam file => '.file_get_contents($namafile).'<br>';
        $content = file_get_contents($namafile);
        $found = array();
        $baris = 1;
        if ($readFile){
            while (!feof($readFile)){
                $temp = fgets($readFile);
                if(strpos($temp,$keyword)!==false){
                    if($operasi=='redact'){
                        $found[$baris] = str_replace($keyword,str_repeat('*', strlen($keyword)),$temp); 
                    }
                    else{
                        $found[$baris] = str_replace($keyword,'<em>'.$keyword.'</em>',$temp);
                    }
                }
                $baris++;
            }          
        }
        fclose($readFile);
        foreach ($found as $index => $line) {
            echo '<br>kata '.$keyword.' ditemukan pada baris ke-'.($index) . " " . $line ;
        }
        $content = ($operasi=='redact')? $content = str_replace($keyword,str_repeat('*', strlen($keyword)),$content) : $content = str_replace($keyword,'<em>'.$keyword.'</em>',$content);
        file_put_contents($newnamafile,$content);
        return '<br><br>isi konten setelah di edit sebagai berikut: <br>'.file_get_contents($newnamafile);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $case2 = new controller();
    echo $case2->refinedCase2();
}
