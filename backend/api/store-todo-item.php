<?php

// CONTROLLO SE C'è UN ITEM IN POST
if (isset($_POST['item'])) {

  // LEGGO IL JSON
  $json_todolist = file_get_contents('../data/todolist.json');

  // LO TRASFORMO IN ARRAY
  $todolist = json_decode($json_todolist);

  // AGGIUNGO L'ITEM POSTATO A QUESTA API
  $todolist[] = $_POST['item'];

  // TRASFORMO L'ARRAY AGGIORNATO IN JSON
  $json_todolist = json_encode($todolist);

  // METTO IL NUOVO CONTENUTO JSON NEL FILE 
  file_put_contents('../data/todolist.json', $json_todolist);

  // AVVISO IL BROWSER CHE STO INVIANDO DEL CONTENUTO DI TIPO JSON
  header('Content-Type: application/json');

  // LO STAMPO
  echo $json_todolist;

}