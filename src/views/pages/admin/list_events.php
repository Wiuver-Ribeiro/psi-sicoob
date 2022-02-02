<?php 

require __DIR__.'../../../../../core/Database.php';
    
    
    $eventos = [];

    while($row_events = $sql->select()->execute()) {
      $id = $row_events['id'];
      $title = $row_events['title'];
      $start = $row_events['start'];
      $end = $row_events['end'];

      $eventos[] = [
        "id" => $id,
        "title" => $title,
        "start" => $start,
        "end" => $end,
      ];
    }
print_r($eventos);