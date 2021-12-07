<?php
    $str = "Belajar PHP ternyata menyenangkan";
    echo strtolower($str);  //ubah huruf ke kecil semua
    echo "<br>";
    echo strtolower($str);  //ubah huruf ke besar semua
    echo "<br>";
    echo str_replace("Menyenangkan","mudah lho",$str);
    //Menganti string
?>