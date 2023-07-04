<?php

      require_once 'dbConn.php';
      $conn = new mysqli($hn, $un, $pw, $db); // Using database connection file here
      if ($conn->connect_error)
      die("Fatal Error");
      else
      {
      echo "";
      }