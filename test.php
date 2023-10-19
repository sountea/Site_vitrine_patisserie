<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="patisserie.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<section >
        <nav class="nav-bar">
            <div class="container">
                <input type="checkbox" id="drop-down-cbox"/>
                <label for="drop-down-cbox">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
        
                <h1 class="site-logo">Deyane-world</h1>
        
                <ul class="main-nav small-caps">
                    <li><a href="#" class="font-bold text-blue-500 text-xl">ACCEUIL</a></li>
                    <li><a href="#" class="font-bold text-blue-500 text-xl"> NOUS</a></li>
                    <li><span class="font-bold text-blue-500 text-xl">NOS SERVICES</span>
                        <ul>
                            <li><a href="#">Gâteau</a></li>
                            <li><a href="">Cupcake</a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </li>
                   
                    <li><a href="#" class="font-bold text-blue-500 text-xl">Contact</a></li>
                </ul>
                
            </div>
        </nav>
    

</section>



<section class="margin2 ">

    <h2 class="text-center font-bold text-6xl uppercase ">Les pâtisseries</h2>

<div class="container ">
<?php
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=projetphp', "root", "");
        foreach($dbh->query('SELECT * from patisseries') as $row) {
            echo "
          <div class='block m-6'> 
          <a class='p-4 rounded   hover:bg-gray-100 block' href='patisserie.php?id=$row[id]'>
          <img src='$row[image]' class='Boximage'>
          <p class='text-center nom'> $row[nom]</p>
          
         
      </a></div>

            
              
            "
            ;
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    ?></div>
    <div>
</section>

<section class="mt-10 h-96 flex justify-center items-center">
    <a href="index.html" class="p-3 mr-30 bg-blue-500 text-white text-2xl font-bold rounded-xl bouton">Retour</a>
    </section>
<script>
    var options = {
        strings: ['', '<b>La patisserie dans un tout autre genre !</b>'],
        typeSpeed: 70
    };

    var typed = new Typed('.texte', options);
</script>
</body>
</html>