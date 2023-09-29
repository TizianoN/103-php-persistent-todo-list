<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

// LEGGO IL JSON
$json_todolist = file_get_contents('../data/todolist.json');

// LO TRASFORMO IN ARRAY
$todolist = json_decode($json_todolist);

// AVVISO IL BROWSER CHE STO INVIANDO DEL CONTENUTO DI TIPO JSON
header('Content-Type: application/json');

// LO STAMPO
echo json_encode($todolist);