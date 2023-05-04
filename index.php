<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 3,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    if(!empty($_GET['searchVote']) && !empty($_GET['searchParking'])) {
        $vote = $_GET['searchVote'];
        $parking = $_GET['searchParking'];
        $filteredHotels = [];
        foreach($hotels as $hotel){
           if($hotel['vote'] == $vote && $hotel['parking']== $parking){
            $filteredHotels[] = $hotel;
           }
        }
    }elseif (!empty($_GET['searchVote'])) {
        $vote = $_GET['searchVote'];
        $filteredHotels = [];
        foreach($hotels as $hotel){
            if($hotel['vote'] == $vote){
             $filteredHotels[] = $hotel;
            }
         }
    }elseif (!empty($_GET['searchParking'])) {
        $vote = $_GET['searchParking'];
        $filteredHotels = [];
        foreach($hotels as $hotel){
            if($hotel['parking'] == $vote){
             $filteredHotels[] = $hotel;
            }
         }
    }else {
        $filteredHotels = $hotels;
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body class="bg-primary">
    <header class="d-flex flex-column gap-2 justify-content-center align-items-center pt-5">
       <h1 class="text-white">Cerca il Tuo Hotel</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
           <select name="searchVote">
              <option value="">Seleziona Voto</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
           </select>
           <select name="searchParking">
              <option value="">Parcheggio</option>
              <option value="true">Disponibile</option>
              <option value="false">Non Disponibile</option>
           </select>
           <button>Cerca</button>
      </form>
    </header> 
    <main class="d-flex align-items-center justify-content-center" >
        <div class="container">
            
            <table class="table bg-white">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($filteredHotels as $hotel) { ?>
                        <tr>
                            <td> <?php echo $hotel['name'] ?> </td>
                            <td> <?php echo $hotel[ 'description'] ?> </td>
                            <td> <?php echo $hotel['parking'] ?> </td>
                            <td> <?php echo $hotel[ 'vote'] ?> </td>
                            <td> <?php echo $hotel[ 'distance_to_center'] ?> </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    
    </main>
    
</body>
</html>