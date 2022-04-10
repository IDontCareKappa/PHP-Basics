<?php
session_start();
echo 'ID: ' . session_id() . '<br />';
if (isset($_GET['PHPSESSID']))
    echo 'PHPSESSID: ' . $_GET['PHPSESSID'] . '<br />';
