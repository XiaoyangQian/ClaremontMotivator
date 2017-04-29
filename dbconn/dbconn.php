<?php

function connect_to_db()
{
    $db_config = [];
    require_once "db.config.php";
    // Usage: host, login, pass, db name
    // Change the host, login, and db information as appropriate
    $dbc = @mysqli_connect($db_config["host"], $db_config["login"], $db_config["pass"], $db_config["db_name"]) or
    die("Connect failed: " . mysqli_connect_error());

    return $dbc;
}


function disconnect_from_db($dbc, $result)
{
    mysqli_free_result($result);
    mysqli_close($dbc);
}


function perform_query($dbc, $query)
{

    $result = mysqli_query($dbc, $query) or
    die("bad query" . mysqli_error($dbc));

    return $result;
}

// sets the global variable $dbc
$dbc = connect_to_db();

// usage:
// ```php
// global $dbc;
// ```