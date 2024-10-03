<?php
    require "./modules/ftp_modules";

    $FTP = new FTP("10.10.160.69");
    $FTP->conn_ftp("test1","dbt99c2229");
?>