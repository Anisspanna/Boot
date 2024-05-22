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

#titre{
    font-family: font3;
    color: #009de0;
}


.accordion {
  background-color: #ffffff;
  color: #000;
  border-radius: 8px;
  border: 2px solid #eee;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #eee;
}

.accordion:after {
  content: '\002B';
  color: red;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

#logo{
  font-family: font3;

}

  </style>

    <header>
         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="index.php"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
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
    class="p-5 text-center bg-image"
    style="
      background-image: url('images/bg9.jpg');
      height: 500px;
    "
  >
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h6 class="mb-3">DONNER</h6>
        <h3 class="mb-3">LE DON DE SANG</h3>
        <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
        
          <h5 class="mb-3">Sans engagement, libre, ponctuel, le don de sang change la vie d'un million de personnes en Algerie chaque année :</h5>
         <h5>une femme qui accouche, une personne accidentée de la route, un malade atteint de cancer.  </h5>   
         <h5 class="mb-3">Chacun de vos dons compte</h5>
         
        <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
      </div>
    </div>
  </div>
  </div>
  <!-- Background image -->
        
    </header>



    <section class="container-fluid p-5">

      <div>
        <h1 class="m-2 p-2 text-center" id="titre">TYPES DE DON</h1>
      </div>
      <div class="p-3 text-dark rounded text-center" id="titre">
        <div style="gap: 15px;" class="d-flex justify-content-center ">
          <img style="position: relative; bottom: 10px; left: 10px;" class="img-fluid" src="images/goutte_sang.png" width="50px" alt="goutte_sang"> <h2 id="titre">Don de sang</h2>
          <img style="position: relative; bottom: 5px;" class="img-fluid" src="images/time.png" width="45px" alt="time"><span style="font-size: large; position: relative; top: 5px;">10 min</span>
        </div>
        <p>Le don de sang permet de prélever en même temps et en 10 minutes seulement,
           tous les composants du sang. Il répond aux besoins les plus courants en transfusion,
            qu'ils soient réguliers comme pour les malades souffrant de cancer,
           ou ponctuels comme les hémorragies lors d'un accouchement...</p>
      </div>
              <main class="row">
                    <article class="col-md-6">
                      <div class=" p-5  text-dark rounded">
                        <h2 id="titre">Pourquoi donner son sang ?</h2>
                        <hr>
                        <p>Parce qu’à l’heure actuelle, aucun médicament ne peut se substituer
                           au sang humain ou à ses composants. Le sang humain est donc toujours
                            un produit irremplaçable. Or chaque jour, des centaines de malades ou 
                            accidentés ont besoin d’une transfusion pour survivre et guérir.
                             C’est pour cela que nous avons besoin de votre 
                          générosité et de vos dons au quotidien !
                        </p>
                      </div>
                    </article>

                    <article class="col-sm">
                      <img class="img-fluid rounded" src="images/sacher_sang.jpg" alt="sacher_sang">
                    </article>
              </main>
     </section>



     <section  class="container-fluid p-5">
      <div style="position: relative; bottom: 30px;" class="text-dark rounded text-center" id="titre">
        <div style="gap: 15px;" class="d-flex justify-content-center ">
          <img style="position: relative; bottom: 10px; left: 10px;" class="img-fluid" src="images/goutte_plasma.png" width="50px" alt="goutte_plasma"><h2 id="titre">Don de plasma</h2>
          <img style="position: relative; bottom: 5px;" class="img-fluid" src="images/time.png" width="45px" alt="time"><span style="font-size: large; position: relative; top: 5px;">45 min</span>
        </div>
        <p>Le don de plasma dure en moyenne 45 minutes. Votre plasma est en grande majorité 
          utilisé pour les soins réguliers de 800 000 malades par an en Algerie,
           traités grâce aux médicaments dérivés du plasma :
           <p>les hémophiles,les immunodéprimés, les personnes souffrant de maladies chroniques graves...</p>   </p>
      </div>
              <main class="row justify-content-center">
                
                <article class="col-sm">
                  <img class="img-fluid rounded" src="images/sacher_plaquette.jpg"  alt="sacher_plaquette">
                </article>

                <article class="col-md-6">
                  <div class=" p-4 text-dark rounded">
                    <h2 id="titre">Pourquoi donner du plasma ?</h2>
                    <hr>
                    <h5>Le don de plasma est essentiel pour plusieurs raisons médicales, notamment :</h5>
                    <ul>
                      <li>Traitements des déficits immunitaires : Le plasma contient des immunoglobulines qui renforcent le système immunitaire, aidant ainsi les personnes atteintes de déficits immunitaires à lutter contre les infections.</li>
                      <li>Soutien pendant des interventions chirurgicales : Le plasma est nécessaire pour compenser les pertes sanguines importantes et maintenir l'équilibre hémodynamique lors d'opérations chirurgicales majeures...</li>
                    </ul>
                    <p>Le don de plasma par des donneurs volontaires est crucial pour répondre à la demande constante de ces composants sanguins, permettant ainsi de traiter un large éventail de conditions médicales et d'améliorer la santé des patients.</p>
                  </div>
                </article>

              </main>
     </section>


     <section  class="container-fluid p-5">
      <div style="position: relative; bottom: 30px;" class="p-1 text-dark rounded text-center" id="titre">
        <div style="gap: 15px;" class="d-flex justify-content-center ">
          <img style="position: relative; bottom: 10px; left: 10px;" class="img-fluid" src="images/goutte_plaquette.png" width="50px" alt="goutte_plaquette"><h2 id="titre">Don de plaquettes</h2>
          <img style="position: relative; bottom: 5px;" class="img-fluid" src="images/time.png" width="45px" alt="time"><span style="font-size: large; position: relative; top: 5px;">90 min</span>
        </div>
        <p>Le don de plaquettes dure en moyenne 90 minutes. Les plaquettes se conservent
           pendant 7 jours seulement. Elles sont généralement utilisées pour soigner les
            maladies du sang mais aussi sauver la vie de patients victimes
             d'une hémorragie soudaine et sévère.</p>
      </div>
      <main class="row justify-content-center">
            <article  class="col-md-6">
              <div class=" p-4 text-dark rounded">
                <h2 id="titre">Pourquoi donner des plaquettes ?</h2>
                <hr>
                <p>Le don de plaquettes est vital pour plusieurs raisons médicales,
                   notamment pour assurer la coagulation sanguine, traiter les troubles 
                   de la coagulation, aider les patients atteints de cancers ou subissant
                    des traitements agressifs, prévenir les saignements excessifs 
                    lors de chirurgies ou traumatismes, et traiter certaines maladies
                     hématologiques. Les donneurs de plaquettes jouent un rôle 
                     essentiel en fournissant ce composant sanguin nécessaire,
                      contribuant ainsi à sauver des vies et à traiter diverses conditions médicales.
                </p>
              </div>
            </article>

            <article class="col-sm">
              <img class="img-fluid rounded" src="images/sacher_plaquettee.jpg" alt="sacher_plaquettee">
            </article>
      </main>
     </section>

     <section class="container bg-light text-center text-dark pt-4">
      <div class="text-center pb-3">
        <h2 id="titre">VOS QUESTIONS, NOS RÉPONSES.</h2>
      </div>
      <main class="row">
            <article class="col-sm">
             
              <button class="accordion"><b>Pourquoi est-il important de donner du sang ?</b> </button>
              <div class="panel">
                <p> Le don de sang est crucial car il sauve des vies. Les transfusions 
                  sanguines sont nécessaires dans divers scénarios tels que les interventions 
                  chirurgicales, les traitements du cancer, les accidents graves
                   et les maladies chroniques. Votre don peut faire
                   la différence entre la vie et la mort pour quelqu'un dans le besoin .
                </p>
              </div>
              
              <button class="accordion"><b>Quelle est l'importance du don de sang régulier ?</b> </button>
              <div class="panel">
                <p>
                  Le don régulier est essentiel pour maintenir un approvisionnement 
                  constant en sang. Les besoins médicaux sont continus, et les dons fréquents
                  garantissent que les banques de sang peuvent répondre aux demandes,
                  en particulier en cas d'urgence.
                </p>
              </div>
              
              <button class="accordion"> <b> Comment puis-je contribuer en tant que donneur de sang ?</b></button>
              <div class="panel">
                <p>
                  En donnant du sang, vous offrez un cadeau précieux qui peut sauver des vies.
                  Vous pouvez contribuer en participant aux séances de don organisées par
                  les centres de collecte de sang, en encourageant d'autres à donner et en
                  sensibilisant à l'importance du don de sang.
                </p>
              </div>
              <button class="accordion"><b>Y a-t-il des avantages pour le donneur de sang ?</b> </button>
              <div class="panel">
                <p>
                  Oui, le don de sang peut avoir des avantages pour la santé du donneur.
                  Il stimule la production de nouveaux globules rouges et peut réduire
                  le risque de certaines maladies cardiovasculaires. De plus
                  , c'est une occasion de contribuer positivement à la communauté.
                </p>
              </div>
            </article>


            <article class="col-sm">
             
              <button class="accordion"> <b>Combien de temps dure le processus de don de sang ?</b> </button>
              <div class="panel">
                <p>
                  Le processus de don de sang, de l'inscription au don réel, prend généralement environ 30 à 45 minutes. Le prélèvement lui-même ne dure que quelques minutes.
                   Après le don, on recommande généralement un court temps de repos et une collation.
                </p>
              </div>
              
              <button class="accordion"><b>Puis-je donner du sang si je ne suis pas en parfaite santé ?</b></button>
              <div class="panel">
                <p>La santé est un facteur crucial. Les donneurs doivent être en bonne santé au moment
                   du don. Certaines conditions médicales ou prises de médicaments peuvent affecter
                    l'admissibilité. Il est important
                   d'informer le personnel médical de tout problème de santé lors de l'inscription .
                </p>
              </div>
              
              <button class="accordion"><b>Comment puis-je me préparer avant de donner du sang ?</b></button>
              <div class="panel">
                <p>Avant le don, assurez-vous de bien vous hydrater en buvant beaucoup d'eau.
                   Mangez une collation légère et nutritive pour maintenir vos niveaux d'énergie.
                    Portez des vêtements confortables à manches courtes pour faciliter l'accès 
                    à votre bras.
                </p>
              </div>

              <button class="accordion"><b> Mon groupe sanguin est-il important ?</b></button>
              <div class="panel">
                <p>Tous les groupes sanguins sont importants. Cependant, certains groupes,
                   comme O négatif, sont des donneurs universels et sont particulièrement
                    précieux en cas d'urgence
                   lorsque le groupe sanguin d'un patient n'est pas immédiatement connu.
                </p>
              </div>
              
              
            </article>
      </main>
      </section>
     


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

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;
  
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
  }
  </script>
    
</body>
</html>