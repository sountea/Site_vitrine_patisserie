<?php
 session_start();
 $db = new PDO('mysql:host=localhost;dbname=projetphp', "root", "");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="produit.css">
    

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<section class="box  h-96  flex justify-center items-center">
    <h1 class="text-black text-5xl font-bold uppercase hero">Bienvenue chez nous</h1>


</section>
    <div class=" boite">
    <?php
    foreach($db->query("SELECT * from patisseries WHERE id = $_GET[id]") as $row) {
            echo "
            <div class=' -mt-20 p-10 mr-25'>
            <img src='$row[image]' class=' image'>
            <p class='px-2 nom'> $row[nom]</p>
           
       </div>
        <div class='description  mt-4  text-2xl font-bold text-gray-600  uppercase ' ><p> $row[description]</p></div>;
                
            ";
        }
    ?>
    </div>


   
    <h2 class='text-black mt-10 text-center text-6xl font-bold'>Commentaires</h2>
    <h3 class='text-black mt-10 text-center text-4xl font-bold'>Avis</h3>
 
     <div class="formulaire">   
    <form action="patisserie.php?id=<?php echo "$GET_[id]" ?>" method="post" class='p-15 '> 
      <div class=" "> <input type="text" name="nom" placeholder="nom" class='text-center font-bold text-xl text-black p-5'><br></div> 
      <div class=" "> <input type="text" name="date" placeholder="date" class='text-center font-bold text-xl text-black p-5'><br></div>   
        <div class="  ">  <input type="text" name="content" placeholder="comment" class=' text-black text-center font-bold text-xl h-56 w-72 p-20'><br></div>
        <div class="">  <input type="text" name="image" placeholder="image" class=' text-black text-center font-bold text-xl p-5'><br></div>
      <div class="mt-2 h-96 flex justify-center items-center">  <a class=" "> <input type="submit" class="text-white bg-blue-500 p-3 m-3 bg-blue-500 text-white text-2xl font-bold rounded-xl bouton "></div>
    </form>
     </div>


    <?php 
       if (isset($_POST['nom']) && isset($_POST['date']) && isset($_POST['content']) && isset($_POST['image'])) { 
         $db->query("INSERT INTO `comments` (`id`, `nom`,`date`, `content`, `image`,`id_patisseries`) VALUES (NULL, '$_POST[nom]', '$_POST[date]', '$_POST[content]','$_POST[image]',$_GET[id]");
        }
        else{
            echo "error";
        }
    ?>      
    
   
   <?php 
foreach($db->query("SELECT * from comments WHERE id_patisseries = $_GET[id]") as $row) {
            echo "
    <ol class='timeline'>
             <li class='timeline-item'>
                 <span class='timeline-item-icon | avatar-icon'>
                     <i class='avatar'>
                         <img src='$row[image]' />
                     </i>
                 </span>
                 <div class='new-comment'>
                     <input type='text' placeholder='Add a comment...' />
                 </div>
             </li>
             <li class='timeline-item'>
                 <span class='timeline-item-icon | faded-icon'>
                     <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'>
                         <path fill='none' d='M0 0h24v24H0z' />
                         <path fill='currentColor' d='M12.9 6.858l4.242 4.243L7.242 21H3v-4.243l9.9-9.9zm1.414-1.414l2.121-2.122a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414l-2.122 2.121-4.242-4.242z' />
                     </svg>
                 </span>
                 <div class='timeline-item-description'>
                     <i class='avatar | small'>
                         <img src='https://assets.codepen.io/285131/winking-girl.png' />
                     </i>
                     <span><a href='#'>Luna Bonifacio</a> has changed <a href='#'>2 attributes</a> on <time datetime='21-01-2021'>Jan 21, 2021</time></span>
                 </div>
             </li>
             <li class='timeline-item'>
                 <span class='timeline-item-icon | faded-icon'>
                     <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'>
                         <path fill='none' d='M0 0h24v24H0z' />
                         <path fill='currentColor' d='M12 13H4v-2h8V4l8 8-8 8z' />
                     </svg>
                 </span>
                 <div class='timeline-item-description'>
                     <i class='avatar | small'>
                         <img src='https://assets.codepen.io/285131/hat-man.png' />
                     </i>
                     <span><a href='#'>Yoan Almedia</a> moved <a href='#'>Eric Lubin</a> to <a href='#'>📚 Technical Test</a> on <time datetime='20-01-2021'>Jan 20, 2021</time></span>
                 </div>
             </li>
             <li class='timeline-item | extra-space'>
                 <span class='timeline-item-icon | filled-icon'>
                     <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'>
                         <path fill='none' d='M0 0h24v24H0z' />
                         <path fill='currentColor' d='M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z' />
                     </svg>
                 </span>
                 <div class='timeline-item-wrapper'>
                     <div class='timeline-item-description'>
                         <i class='avatar | small'>
                             <img src='https://assets.codepen.io/285131/hat-man.png' />
                         </i>
                         <span><a href='#'>Yoan Almedia</a> commented on <time datetime='20-01-2021'>Jan 20, 2021</time></span>
                     </div>
                     <div class='comment'>
                         <p>I've sent him the assignment we discussed recently, he is coming back to us this week. Regarding to our last call, I really enjoyed talking to him and so far he has the profile we are looking for. Can't wait to see his technical test, I'll keep you posted and we'll debrief it all together!😊</p>
                         <button class='button'>👏 2</button>
                         <button class='button | square'>
                             <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'>
                                 <path fill='none' d='M0 0h24v24H0z' />
                                 <path fill='currentColor' d='M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zM7 12a5 5 0 0 0 10 0h-2a3 3 0 0 1-6 0H7z' />
                             </svg>
                         </button>
                     </div>
                     <button class='show-replies'>
                         <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-forward' width='44' height='44' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                             <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                             <path d='M15 11l4 4l-4 4m4 -4h-11a4 4 0 0 1 0 -8h1' />
                         </svg>
                         Show 3 replies
                         <span class='avatar-list'>
                             <i class='avatar | small'>
                                 <img src='https://assets.codepen.io/285131/hat-man.png' />
                             </i>
                             <i class='avatar | small'>
                                 <img src='https://assets.codepen.io/285131/winking-girl.png' />
                             </i> <i class='avatar | small'>
                                 <img src='https://assets.codepen.io/285131/smiling-girl.png' />
                             </i>
                         </span>
                     </button>
             </li>
         </ol>
            ";
        }
    ?>
   
  



<section class="mt-10 h-96 flex justify-center items-center">
    <a href="test.php" class="p-3 mr-30 bg-blue-500 text-white text-2xl font-bold rounded-xl bouton">Retour</a>
    </section>
</body>
</html>