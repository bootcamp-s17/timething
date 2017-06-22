<?php

 function getCategories($id) {

    return [
      [
        'id' => 1,
        'name' => 'Web development',
        'client_id' => $id,
        'rate' => 75
      ],
      [
        'id' => 2,
        'name' => 'Design services',
        'client_id' => $id,
        'rate' => 60
      ],
      [
        'id' => 3,
        'name' => 'Oreo quality control',
        'client_id' => $id,
        'rate' => 25
      ]
    ];

  };  



?>