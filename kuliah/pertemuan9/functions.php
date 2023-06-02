<?php
$Conn = mysqli_connect("localhost:3306", "root", "", "pw2023_223040056");

function query($query)
{
    global $Conn;
    $result = mysqli_query($Conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
