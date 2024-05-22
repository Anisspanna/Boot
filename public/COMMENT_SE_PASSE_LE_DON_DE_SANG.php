<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="css/bootstrap2.css">
    <link rel="stylesheet" href="css/bootstrap3.css">

    <!-- java script -->
    <script src="js/bootstrap.js"></script>
    <script src="js/j.js"></script>
    <script src="js/fontowsem.js"></script>
</head>
<body>

  <style>
    @font-face {
    font-family: "font1" ;
    src: url("fonts/Afacad-Regular.ttf");
}
@font-face {
    font-family: "font2" ;
    src: url("fonts/Kanit-Regular.ttf");
}

@font-face {
    font-family: "font3" ;
    src: url("fonts/ProtestRiot-Regular.ttf");
}

@font-face {
    font-family: "font4" ;
    src: url("fonts/ProtestStrike-Regular.ttf");
}


#titre{
    font-family: font3;
    color: #009de0;
}

#logo{
  font-family: font3;

}
  </style>
  
    <!-- navbar -->
    <header>
           <!-- Navbar -->
           <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="index.html"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                  
                  <li class="nav-item">
                    <a class="nav-link"  href="chercher_donneur.php">Chercher Donneurs ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="Pourquoi_Donner.php">Pourquoi Donner ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Qui_peut_donner.php">Qui peut donner ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="COMMENT_SE_PASSE_LE_DON_DE_SANG.php">Comment ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Delai_Entre_Deux_Dons.php">Délai Entre Deux Dons ?</a>
                  </li>
                  
                </ul>
                <div  class="d-flex" >
                    <a href="inscription.php" class="btn btn-outline-danger me-3">Inscrire</a>
                    <a href="login.php" class="btn btn-outline-danger">Connexion</a>
                </div>
              </div>
            </div>
        </nav>
        <!-- Navbar -->
    
      <!-- Background image -->
      <div 
        class="p-5  text-center bg-image"
        style="
          background-image: url('images/bg10.jpg');
          height: 500px;
        "
      >
        <div class="mask" class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <p>DONNER</p>
              <h3 class="mb-3">LE DON DE SANG</h3>
              <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
              <h5 class="mb-3">À l’heure actuelle, aucun médicament de synthèse ni de 
                traitement n'est capable de substituer le sang
               <h5>humain ni ses produits sanguins labiles. Le sang est donc un produit irremplaçable.</h5>   
              </h5>
              <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
            </div>
          </div>
        </div>
      </div>
      <!-- Background image -->
    </header>

    <div class=" container p-5  text-dark rounded">
        <h1 id="titre">Pourquoi donner son sang ?</h1>
        <p>En raison de l'absence actuelle de médicaments capables de reproduire
            les propriétés du sang humain ou de ses constituants, ce dernier 
            demeure un élément irremplaçable. Chaque jour, de nombreux patients ou victimes
            d'accidents dépendent de transfusions sanguines pour leur survie et leur
            rétablissement. C'est pourquoi nous sollicitons votre générosité et vos
            dons réguliers,car votre contribution quotidienne est cruciale dans
            cette démarche vitale.</p>
    </div>



    <div class=" container p-5  text-dark rounded">
        <div class="row">
        <article class="col-sm">
            <h1 id="titre">À quoi sert le don de sang ?</h1>
            <p>Une fois le sang prélevé chez un donneur, les différents constituants du sang,
                 à savoir les globules rouges, le plasma et les plaquettes sont séparés, 
                traités et préparés pour être transportés vers les hôpitaux, selon les besoins.
            </p>
            <p>
                "Votre engagement à donner régulièrement peut faire la différence,
                 car chaque don compte, et un intervalle de quelques mois entre chaque
                 contribution peut contribuer significativement à sauver des vies.
                  <p>
                    <a href="Delai_Entre_Deux_Dons.html">Délai Entre Deux Dons</a>
                  </p> 
            </p>
        </article>
        
        <article class="col-sm">
            <img class="img-fluid rounded" src="images/bg12.jpg" alt="bg12">
        </article>
    </div>
    </div>


    <div class=" container p-5  text-dark rounded">
        <h1 id="titre">Dans quelles situations transfuse-t-on des globules rouges ?</h1>
        <h5>
            Les transfusions de globules rouges sont souvent nécessaires dans diverses
             situations médicales, notamment :
        </h5>
        <ul>
            <li class="p-2"> <b>Anémie sévère :</b> Les globules rouges transportent l'oxygène vers les tissus du corps. En cas d'anémie sévère, où la quantité d'hémoglobine est significativement réduite, une transfusion de globules rouges peut être 
                nécessaire pour augmenter la capacité de transport d'oxygène du sang.</li>
            <li class="p-2"> <b>Chirurgie majeure :</b> Les patients subissant des interventions chirurgicales importantes peuvent nécessiter des transfusions de globules rouges pour compenser les pertes
                 sanguines pendant l'opération.</li>
            <li class="p-2"> <b>Traumatismes et blessures graves : </b>Les accidents, les blessures graves ou les traumatismes peuvent entraîner une perte importante de sang, nécessitant une transfusion de globules rouges pour restaurer le 
                volume sanguin et maintenir la pression artérielle.</li>
            <li class="p-2"> <b>Maladies hématologiques : </b> Certains troubles du sang, tels que la drépanocytose ou la thalassémie, peuvent entraîner une production insuffisante ou une destruction accélérée des globules rouges, 
                nécessitant des transfusions pour maintenir des niveaux adéquats.</li>
            <li class="p-2"> <b>Cancers et traitements associés :</b> Certains types de cancers, ainsi que les traitements comme la chimiothérapie, peuvent entraîner une anémie,
                 justifiant parfois des transfusions de globules rouges pour soutenir le patient.</li>
            <li class="p-2"> <b>Maladies chroniques : </b>Certaines maladies chroniques, telles que l'insuffisance rénale chronique, peuvent entraîner une anémie
                 nécessitant des transfusions régulières de globules rouges.</li>
        </ul>
        
    </div>

    <div class=" container p-5  text-dark rounded">
        <h1 id="titre">Des instructions claires sur le processus de don de sang</h1>
        <ul>
            <!--1-->

            <div class="p-2">
                <h5>Admissibilité au don :</h5>
                <li>Le donneur doit être en bonne santé et ne pas avoir de maladies transmissibles par le sang.</li>
                <li>L'âge du donneur doit se situer dans la fourchette autorisée pour le don.</li>
            </div>

            <!--2-->

            <div  class="p-2"> 
                <h5>Préparation avant le don :</h5>
                <li>Prendre un repas léger et nutritif avant le don.</li>
                <li>Boire suffisamment de liquides pour maintenir une bonne hydratation.</li>
            </div>

            <!--3-->
            
            <div  class="p-2"> 
                <h5>Enregistrement et évaluation :</h5>
                <li>Le donneur doit fournir des informations personnelles et médicales de base.</li>
                <li>Une évaluation est effectuée pour garantir l'admissibilité et la sécurité du donneur.</li>
            </div>

            <!--4-->

            <div  class="p-2"> 
                <h5>Examen avant le don :</h5>
                <li>Mesure de la pression artérielle et du taux d'hémoglobine pour vérifier la santé du donneur.</li>
                <li>Vérification de la température corporelle pour s'assurer qu'il n'y a pas de fièvre.</li>
            </div>

             <!--5-->

             <div  class="p-2"> 
                <h5>Processus de don :</h5>
                <li>Prélèvement d'une petite quantité de sang d'une veine du bras.</li>
                <li>Le processus prend généralement quelques minutes seulement .</li>
            </div>

               <!--6-->

            <div  class="p-2"> 
                <h5>Repos après le don :</h5>
                <li>Temps de repos et possibilité de prendre une collation légère après le don.</li>
                <li>Il est recommandé d'éviter les activités physiques intensives pendant une courte période.</li>
            </div>

                  <!--7-->

                <div  class="p-2"> 
                    <h5>Directives post-don :</h5>
                    <li>Éviter de fumer ou de consommer de l'alcool dans les heures suivant le don.</li>
                    <li>Encouragement à signaler tout effet indésirable ou symptôme inhabituel.</li>
                </div>


            
        </ul>
    </div>

    



<!-- Footer -->
<footer style="border: 1px solid #eee; background-image: url('images/bg15.jpg'); background-size: cover; background-repeat: no-repeat;" class="text-center text-lg-start bg-body-tertiary text-muted mt-3">
 

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div style="border: 1px solid #eee;border-radius: 10px; width: 200px; background-color: #ffffff;" class=" p-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <div>
            <a href="index.html"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 25px; color: black;" id="logo">GoutteVie</span></a>
          </div>
          <hr>
          <div  class="text-dark">
            <p>LE SERVICE DU SANG</p>
          </div>
          <hr>
          <p class="text-dark text-center">
            <i class="fas fa-home me-2"></i>Annaba, Algérie
          </p>
          <p class="text-dark">
            <span>goutteviedz@gmail.com</span>
          </p>
          <hr>
          <p class="text-dark">
            <i class="fas fa-phone me-2"></i> +213 7 95 33 75 74
          </p>
          
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4 text-center text-white">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            LE DON DE SANG 
          </h6>
          <p>
            <a href="#!" class="text-reset">Annonces</a>
          </p>

          <p>
            <a href="#!" class="text-reset">Faire un Don</a>
          </p>
          
          <p>
            <a href="#!" class="text-reset">Pourquoi Donner</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Qui peut Donner</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Délai Entre Deux Dons</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Comment se passe le don de Sang  </a>
          </p>
          
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4 text-center text-white">
          <!-- Links -->
          <h6 class="text-white fw-bold mb-4">
            CONTACT
          </h6>
          <p>
            <a href="#!" class="text-reset">FAQ</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Connexion</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Contacter Nous</a>
          </p>
         
          <!-- Section: Social media -->
          <div class="d-flex justify-content-center p-4 ">
    

  <!-- Right -->
  <div class="text-center">
    <a href="" class="me-4 text-reset">
      <img src="images/fb.png" alt="Facebook" width="40">
    </a>
   
   
    <a href="" class="me-4 text-reset">
      <img src="images/ins.png" alt="Instagram" width="40">

    </a>
    <a href="" class="me-4 text-reset">
      <img src="images/lin.png" alt="Linkedin" width="40">

    </a>
   
  </div>
  <!-- Right -->
          </div>
          <!-- Section: Social media -->
        </div>
        <!-- Grid column -->

       
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

 


  <!-- Copyright -->
  <div class="text-center p-4 text-white" >
    © 2024 Copyright :
    <span class="text-white fw-bold"> GoutteVie.com</span>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
  

</body>
</html>