<?php
session_start();
    session_destory();
    if(!empty($_SESSION['username'])){
        session_destroy();
        echo"<script>window.location='../sign-in';</script";
    }else if(empty($_SESSION['username'])) {
        echo "<script> window.location='../sign-in';</script>";
    }
    ?>