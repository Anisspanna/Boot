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
        class="p-5  text-center bg-image"
        style="
          background-image: url('images/pers3.avif');
          height: 500px;
        "
      >
        <div class="mask" class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h3 class="mb-3">DÉLAI ENTRE DEUX DONS</h3>
              <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
              <h5 class="mb-3">Le respect du délai entre deux dons est une mesure
                 indispensable pour préserver la santé du donneur.
               <h5>Cette période d'attente nécessaire diffère selon la nature du don effectué.</h5>   
              </h5>
              <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
            </div>
          </div>
        </div>
      </div>
      <!-- Background image -->
    </header>

    <section class="container-fluid">
      <main class="row justify-content-around">
                  <article  class="col-sm p-5">
                      <div class="text-dark rounded">
                          <h1 class="text-center" id="titre">Intervalle entre 2 dons</h1>
                          <p class="mb-3">Pour le don de sang total, la législation impose un délai minimal de 2 mois 
                            entre chaque don, bien que la Croix-Rouge recommande un délai de 3 mois.
                             Dans les deux cas, la fréquence maximale autorisée est de 4 dons au cours 
                             d'une période de 365 jours.
                          </p>

                          <p class="mb-3">En ce qui concerne le don de plasma, il peut être effectué toutes les deux semaines,
                             permettant ainsi un volume maximal de 15 litres de plasma par an.
                          </p>
                            
                          <p class="mb-3"> Pour les dons de plaquettes, la Croix-Rouge préconise un intervalle
                             d'attente d'un mois entre chaque don, avec une exception possible pour un délai 
                             de 2 semaines dans des circonstances particulières. Le nombre maximal de 
                             dons de plaquettes, y compris 
                            d'éventuels dons de sang, est fixé à 24 par an (365 jours).
                          </p>
                          
                         
                          
                        </div>
                  </article>

                  <article class="col-sm p-3">
                      <img style="height: 450px;"
                          src="images/delai-don.jpeg"
                          class="img-fluid "
                          alt="sang"
                      />
                  </article>
      </main>
    </section> 


    <section class="container bg-light text-center text-dark pt-4">
      <div class="text-center pb-3">
        <h2 id="titre">VOS QUESTIONS, NOS RÉPONSES.</h2>
      </div>
      <main class="row">
            <article class="col-sm">
             
              <button class="accordion"><b>Qui est éligible pour donner du sang ?</b> </button>
              <div class="panel">
                <p> 
                  Les critères d'admissibilité varient légèrement d'un pays à l'autre, mais en général, les personnes en bonne santé âgées de 18 à 65 ans (parfois jusqu'à 70 ans) peuvent être éligibles. Certaines conditions médicales,
                   voyages récents, ou prises de médicaments peuvent affecter l'admissibilité.
                </p>
              </div>
              
              <button class="accordion"><b> Quels sont les critères de santé pour les donneurs ?</b> </button>
              <div class="panel">
                <p>
                  Les donneurs doivent être en bonne santé générale. Certaines affections médicales, infections, ou traitements médicamenteux peuvent rendre temporairement ou définitivement un individu inéligible.
                   Le personnel médical effectuera une évaluation détaillée avant le don.
                </p>
              </div>
              
             
              <button class="accordion"><b>Les personnes âgées peuvent-elles donner du sang ?</b> </button>
              <div class="panel">
                <p>
                  Oui, dans de nombreux cas, les personnes âgées sont éligibles pour donner
                   du sang tant qu'elles sont en bonne santé. Les critères peuvent varier,
                    mais beaucoup de centres acceptent
                   les donneurs jusqu'à un certain âge, par exemple, 65 ans ou plus.
                </p>
              </div>


              <button class="accordion"><b>Puis-je donner du sang si je prends des médicaments ?</b> </button>
              <div class="panel">
                <p>
                  La prise de médicaments peut affecter l'admissibilité au don.
                   Certains médicaments peuvent rendre temporairement ou définitivement
                    un individu inéligible. Il est important de divulguer toutes les informations 
                  médicales lors de l'inscription pour une évaluation appropriée.
                </p>
              </div>
            </article>
    
    
            <article class="col-sm">
             
    
              
              <button class="accordion"><b>Les personnes vaccinées peuvent-elles donner du sang ?</b></button>
              <div class="panel">
                <p>En général, les personnes vaccinées peuvent être éligibles pour donner du sang.
                   La plupart des vaccins, y compris ceux contre la COVID-19,
                    n'impactent pas l'admissibilité au don de sang.
                     Cependant, les politiques peuvent varier,
                   et il est recommandé de consulter les directives locales.
                </p>
              </div>
              
              <button class="accordion"><b>  Les personnes ayant voyagé récemment peuvent-elles donner du sang ?</b></button>
              <div class="panel">
                <p> 
                  Les voyages récents peuvent affecter l'admissibilité au don en raison
                   de risques liés à certaines régions. Les critères peuvent varier,
                    mais il est généralement recommandé
                   d'attendre une période spécifique après un voyage avant de donner du sang.
                </p>
              </div>
    
              <button class="accordion"><b>  Les femmes enceintes peuvent-elles donner du sang ?</b></button>
              <div class="panel">
                <p>
                  En général, les femmes enceintes ne sont pas éligibles pour donner du sang.
                   Cependant, il peut y avoir des délais spécifiques après l'accouchement
                    avant qu'elles ne soient autorisées à donner. Les politiques peuvent varier,
                   et il est recommandé de consulter les directives locales.
                </p>
              </div>


              <button class="accordion"><b> Les personnes LGBTQ+ peuvent-elles donner du sang ?</b></button>
              <div class="panel">
                <p>
                  Les politiques d'admissibilité varient, mais de nombreux pays ont assoupli
                   les restrictions pour les donneurs LGBTQ+.
                    Certains centres n'ont plus de restrictions basées sur l'orientation sexuelle,
                     tandis que d'autres peuvent avoir des exigences spécifiques.
                   Il est conseillé de vérifier les politiques locales.
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