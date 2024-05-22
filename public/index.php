<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="css/bootstrap2.css">
    <link rel="stylesheet" href="css/bootstrap3.css">
    <link rel="stylesheet" href="css/btn1.css">

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
            background-image: url('images/s.avif');
            height: 400px;
          "
        >
          <div class="mask" >
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h3 class="mb-3 h3-responsive">REJOIGNEZ-NOUS, DEVENEZ DONNEUR</h3>
                <h5 class="mb-3 h5-responsive"><b>Offrez du sang</b>, Donnez le cadeau de la vie.</h5>
                <a data-mdb-ripple-init class="btn btn-outline-light btn-lg"
                 href="login.php" role="button">Connexion</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->
      </header>



      <section class="container-fluid">
        <main class="row">
                    <article  class="col-sm p-5">
                        <div class="text-dark rounded">
                            <h1 class="h1-responsive" id="titre">ENSEMBLE,</h1>
                            <h1 class="h1-responsive" id="titre">SAUVONS DES VIES !</h1>
                            <p>Votre don est un acte <b>citoyen, solidaire et libre</b> qui permet de répondre à des besoins quotidiens de manière bénévole. Plus vous serez nombreux et réguliers à donner, plus nous pourrons
                                 aider ensemble chaque jour les patients qui en ont besoin.</p>
                            
                           
                            <div class="pt-3">
                                <a class="btn" href="maps.php" id="button">
                                  <span class="shadow"></span>
                                  <span class="edge"></span>
                                  <span class="front text"> Faire un Don ?</span>
                                </a>
                            </div>
                          </div>
                    </article>

                    <article class="col-sm d-none d-md-block">
                        <img style="height: 450px;"
                            src="images/sang.jpg"
                            class="img-fluid "
                            alt="sang"
                        />
                    </article>
        </main>
      </section> 


      <section class="container-fluid">
        <main class="row">
          <article class="col-sm">
            <img style="height: 440px;border-radius: 6px;"
                src="images/Personne Donner du sang.jpg"
                class="img-fluid "
                alt="sang"
            />
          </article>

          <article  class="col-sm p-5">
              <div class="text-dark rounded">
                  <h2 class="text-center" style="position: relative; bottom: 30px;" id="titre">Baromètre des groupes sanguins</h2>
                  <p>On compte sur votre prochain don pour qu'elle le garde !</p>
                  <p> Votre goutte de sang peut faire toute la différence, et nous 
                    apprécions votre implication continue dans notre effort commun 
                    pour soutenir les besoins en sang.</p>
                  
                  <div style="border-radius: 6px; border: 1px solid #eee;" class="p-2">
                    <div class="d-flex justify-content-around pt-2">
                      <div>
                        <img src="images/blood.png"
                          class="img-fluid"
                          alt="blood">
                          <h5 class="text-center">O+</h5>
                      </div>
                      <div>
                        <img src="images/blood.png"
                          class="img-fluid"
                          alt="blood">
                          <h5 class="text-center">A+</h5>

                      </div>
                      <div>
                        <img src="images/blood.png"
                          class="img-fluid"
                          alt="blood">
                          <h5 class="text-center">B+</h5>

                      </div>
                      <div>
                        <img src="images/blood.png"
                          class="img-fluid"
                          alt="blood">
                          <h5 class="text-center">AB+</h5>

                      </div>
                  </div>

                  <div class="d-flex justify-content-around pt-2">
                    <div>
                      <img src="images/blood.png"
                        class="img-fluid"
                        alt="blood">
                        <h5 class="text-center">O-</h5>
                    </div>
                    <div>
                      <img src="images/blood.png"
                        class="img-fluid"
                        alt="blood">
                        <h5 class="text-center">A-</h5>

                    </div>
                    <div>
                      <img src="images/blood.png"
                        class="img-fluid"
                        alt="blood">
                        <h5 class="text-center">B-</h5>

                    </div>
                    <div>
                      <img src="images/blood.png"
                        class="img-fluid"
                        alt="blood">
                        <h5 class="text-center">AB-</h5>
                    </div>
                  </div>
                  </div>
                
                 
                </div>
          </article>
        </main>
      </section> 



      <section class="container text-center p-5">
        <div style="position: relative; bottom: 20px;">
          <h3 class="text-center" id="titre">Le don de sang</h3>
          <p>le don de sang est un acte altruiste qui sauve des vies,
             soutient le traitement médical, renforce la préparation aux urgences 
             et contribue à la recherche médicale. C'est un moyen concret pour
              les individus de faire une différence positive dans la vie d'autrui et de
               promouvoir la santé de la collectivité.
          </p>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 mb-5 mb-md-5 mb-lg-0 position-relative">
            <img class="img-fluid mb-2" src="images/don5.png" width="130px" alt="don5">
            <h5 class="fw-bold mb-3" id="titre">QUI PEUX DONNER ?</h5>
            <h6 class="fw-normal mb-0">Chaque jour, 10 000 personnes font un don de sang, de plasma ou de plaquettes alors 
              pourquoi pas vous ? Sautez-le pas et rejoignez-vous !</h6>
              <h5 class="pt-2 fw-bold"><a href="Qui_peut_donner.html"><span class="text-danger">Plus d'étais </span><img src="images/flesh.png" alt=""></a></h5>
            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
          </div>
      
          <div class=" col-md-6 mb-5 mb-md-5 mb-lg-0 position-relative">
            <img class="img-fluid mb-2" src="images/don6.svg" alt="don6">
            <h5 class="fw-bold mb-3" id="titre">COMMENT SE PASSE LE DON DE SANG ?</h5>
            <h6 class="fw-normal mb-0">Vous désirez donner du sang, mais vous vous demandez comment ça se passe ?</h6>
            <h5 class="pt-2 fw-bold"><a href="COMMENT_SE_PASSE_LE_DON_DE_SANG.html"><span class="text-danger">Les étapes du don </span><img src="images/flesh.png" alt="flesh"></a></h5>
          </div>
      
         
      
          <div class="col-md-6 mb-5 mb-md-0 position-relative ">
            <img class="img-fluid mb-2" src="images/don7.svg" alt="don7">
            <h5 class="fw-bold mb-3" id="titre">DÉLAI ENTRE 2 DONS ?</h5>
            <h6 class="fw-normal mb-0">Le laps de temps requis entre deux dons dépend du type de don que vous envisagez de réaliser.</h6>
            <h5 class="pt-2 fw-bold"><a href="Delai_Entre_Deux_Dons.html"><span class="text-danger">Plus d'informations </span><img src="images/flesh.png" alt="flesh"></a></h5>
          </div>
          
        </div>
      </section>
      
      <section class="aniss">
      
      
        <!-- Background image -->
        <div
          class="p-5 text-center bg-image"
          style="
            background-image: url('images/bg1.avif');
            height: 400px;
          "
        >
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-white">
                <h1 class="mb-3">RELEVONS LE DÉFI DES

                  <span class="num" data-val="10000">10000</span> DONS PAR JOUR !</h1>
                <h5 class="mb-3 justify-content-center">
                  <p class="text-center"><img class="img-fluid opacity-75" src="images/true.png" width="50px" alt="true">Une pause solidaire qui nous fait du bien</p>
                  <p class="text-center"><img class="img-fluid opacity-75" src="images/true.png" width="50px" alt="true">Une heure pour soi, une belle action pour eux</p>
                  <p class="text-center"><img class="img-fluid opacity-75" src="images/true.png" width="50px" alt="true">Ensemble, engageons-nous pour le don de sang !</p>
                </h5>
                
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->
      </section>
<!-- Script -->
      <script src="js/counter.js"></script>





      <section class="container text-center p-5">
        <div style="position: relative; bottom: 20px;">
          <h3 class="text-center" id="titre">Pourquoi donner son sang ?</h3>
          <p>Le don de sang change la vie d’un million de malades chaque année en Algérie. Alors ça vaut le coup, vous ne trouvez pas ? </p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5 mb-lg-0 position-relative">
            <img class="img-fluid mb-2" src="images/don1.svg" alt="don1">
            <h5 class="fw-bold mb-3" id="titre">3 VIES</h5>
            <h6 class="fw-normal mb-0">Parce qu'en 30 minutes, vous pouvez sauver  3 vies !</h6>
            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
          </div>
      
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5 mb-lg-0 position-relative">
            <img class="img-fluid mb-2" src="images/don2.svg" alt="don2">
            <h5 class="fw-bold mb-3" id="titre">500 000 POCHES</h5>
            <h6 class="fw-normal mb-0">Parce qu'en Algérie, il faut près de 500 000 poches par an pour faire face aux besoins.</h6>
            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
          </div>
      
          <div class="col-lg-3 col-md-6 mb-5 mb-md-0 position-relative">
            <img class="img-fluid mb-2" src="images/don3.svg" alt="don3">
            <h5 class="fw-bold mb-3" id="titre">1 PERSONNE SUR 7</h5>
            <h6 class="fw-normal mb-0">Parce que moins d'1 personne sur 10 donne du sang alors qu'1 personne sur 7 en aura un jour besoin.</h6>
            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
          </div>
      
          <div class="col-lg-3 col-md-6 mb-5 mb-md-0 position-relative">
            <img class="img-fluid mb-2" src="images/don4.svg" alt="don4">
            <h5 class=" fw-bold mb-3" id="titre">VITAL</h5>
            <h6 class="fw-normal mb-0">Parce qu'à l'heure actuelle, rien ne remplace le sang.</h6>
          </div>
          <div class="pt-3">
            <a class="btn" href="Pourquoi_Donner.html" id="button">
              <span class="shadow"></span>
              <span class="edge"></span>
              <span class="front text"> Plus d'informations </span>
            </a>
        </div>
        </div>
      </section>


      <div class="p-3  rounded">
        <h3 class="text-center" id="titre">NOUS POURRIONS TOUS UN JOUR EN AVOIR BESOIN !</h3>
      </div>

      <section class="container mt-2">
               <main class="row">
                     <article class="col-sm">
                            <img class="img-fluid rounded" src="images/bg3.avif" alt="amis">
                     </article>

                     <article class="col-sm text-center">
                      <div class=" p-2  text-dark rounded">
                        <h4 id="titre">"Unis pour la Vie : Ensemble pour le Don de Sang"</h4>
                        <p>Ensemble, nous formons une puissante force de bienveillance,
                           unissant nos efforts pour donner du sang et ainsi devenir les bâtisseurs
                            d'un avenir rayonnant. Chaque goutte de sang que nous offrons devient
                             une source d'espoir, capable de restaurer la santé et d'insuffler une nouvelle vie.
                              Notre acte de générosité compose une harmonie d'unité, où chaque participant 
                              joue un rôle vital dans la symphonie de la solidarité. Joignez-vous à cette 
                              cause noble, où notre collaboration crée un réseau de soutien au-delà 
                              des frontières, unissant nos cœurs pour apporter une lueur d'espoir à ceux qui en
                               ont le plus besoin. Ensemble, donnons, partageons l'amour, et devenons 
                               les héros anonymes qui transforment le destin. Notre union dans 
                               le don de sang représente une force
                           irrésistible, une promesse d'espoir et de renouveau pour notre communauté.
                            <h5><a class="text-danger" href="#">Faire un dan</a><img src="images/flesh.png" alt=""></h5>
                          </p>
                      </div>
                     </article>

                     
               </main>
      </section>



      <div class=" container p-5  text-dark rounded text-center">
        <div class="row">
        <article class="col-sm">
            <h1 id="titre">ACTIVITÉS DE GoutteVie</h1>
            <p>
                    Est un site web simplifie le processus de don de sang en permettant aux donneurs de
                s'inscrire, de gérer leurs comptes, et de rechercher des centres de don.
                Nous facilitons la coordination entre les centres de don et les hôpitaux
                grâce à des fonctionnalités de gestion des transactions. De plus,
                notre plateforme offre un système unique permettant aux hôpitaux de faire
                des demandes directes de sang ou de plasma aux centres de don.
                Ces activités visent à rendre le processus de don plus rapide,efficace et à
                favoriser la communication entre les donneurs, les centres de don et 
                les établissements de santé.
            </p>
            
        </article>
        
        <article class="col-sm">
            <img class="img-fluid rounded" src="images/bg13.jpg" alt="bg13">
        </article>
    </div>
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