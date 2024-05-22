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

#clikk{
  color: red;
}

#clikk:hover{
  cursor: pointer;
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
    class="p-5  text-center bg-image"
    style="
      background-image: url('images/bg8.avif');
      height: 500px;
    "
  >
    <div class="mask" class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h6 class="mb-3">DONNER</h6>
          <h3 class="mb-3">LE DON DE SANG</h3>
          <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
          
          <h5 class="mb-3">À l’heure actuelle, aucun médicament de synthèse ni de traitement n'est capable de substituer le sang</h5>
          <h5>humain ni ses produits sanguins labiles. Le sang est donc un produit irremplaçable.</h5>   
            
          <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>


<div style="position: relative;" class="container p-5  text-dark rounded justify-content-center">
  <h3 id="titre">Qui peut donner du sang ?</h3>
  <hr>
  <div>
    <h6>Toute personne :</h6>
    <ul>
        <li>En bonne santé </li>
        <li>Age entre 18 et 70 ans </li>
        <li>Pesant au moins 50 kg </li>
        <li>Ne présentant pas de risque de transmettre des maladies infectieuses. </li>
        <li>Vous pouvez donner jusqu’à 6 fois par an pour les hommes et jusqu’à 4 fois pour les femmes. </li>
    </ul>
    <p>En plus de ces critères de base, il existe toute une série de <b><a href="#contre-indication" class="text-danger">contre-indications</a></b>  qui pourraient vous écarter temporairement voire, dans certains cas, définitivement du don de sang.</p>
    
  </div>
  
</div>


<div style="position: relative; " class="container p-5  text-dark rounded justify-content-center">
  <h3 id="titre">Qui peut donner du plasma ?</h3>
  <hr >
  <div>
    <h6>Toute personne :</h6>
    <ul>
        <li>En bonne santé </li>
        <li>Age plus de 18 ans et moins de 66 ans.</li>
        <li>Pesant au moins 50 kg </li>
        <li>Ne présentant pas de risque de transmettre des maladies par le sang. </li>
        <li>Le don de plasma sert à la transfusion ou à la fabrication de médicaments. Le don dure 1h au maximum et il peut être effectué jusqu’à 24 fois par an.  </li>
    </ul>
    <p>Tous les groupes sanguins peuvent donner leur plasma.</p>
    <p>Outre ces critères essentiels, il existe diverses <a href="#contre-indication" class="text-danger">contre-indications</a>  qui pourraient temporairement ou, dans certains cas, de manière permanente, vous empêcher de participer au don de plasma.</p>
    
  </div>
  
</div>


<div style="position: relative;" class="container p-5  text-dark rounded justify-content-center">
  <h3 id="titre">Qui peut donner des plaquettes ?</h3>
  <hr >
  <div>
    <h6>Toute personne :</h6>
    <ul>
        <li>En bonne santé </li>
        <li>Age de minimum 18 ans</li>
        <li>Pesant au moins 50 kg </li>
        <li>Ne présentant pas de risque de transmettre des maladies par le sang.</li>
    </ul>
    <p>Les plaquettes sont prélevées préférentiellement chez les donneurs des groupes O et A.</p>
    <p>Un seul don de plaquettes par aphérèse permet de transfuser 1 ou 2 adultes et jusqu’à 3 enfants !</p>
    <p>Chaque journée, la nécessité de 500 dons de plaquettes se fait sentir,
       une contribution cruciale pour sauver des vies. Ces plaquettes jouent un rôle
        vital dans le traitement des patients confrontés à des maladies sanguines
         et suivant des thérapies intensives. Leur présence est essentielle pour
          prévenir tout risque d'hémorragie, 
      offrant ainsi une bouée de sauvetage aux personnes malades dont la vie est en jeu.</p>
    <p>En plus de ces critères de base, il existe toute une série de <a href="#contre-indication" class="text-danger">contre-indications</a> vous écartant temporairement voire, dans certains cas, définitivement, du don de plaquettes.</p>
    
  </div>
  
</div>


<header>


  <!-- Background image -->
  <div 
  class="p-5  text-center bg-image"
  style="
    background-image: url('images/bg14.avif');
    height: 400px;
  "
>
  <div class="mask" class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
        <h3 class="mb-3">CONTRE-INDICATIONS</h3>
        <h5 class="mb-3">Voyages, médicaments, maladies ou encore tatouage sont quelques-unes des contre-indications temporaires</h5>
        <h5>ou définitives au don de sang, de plasma ou de plaquettes. Découvrez les principales ci-dessous.</h5>   
        <hr style="border: 2px solid; border-radius: 10px; color: #ffffff;">
      </div>
    </div>
  </div>
</div>
  <!-- Background image -->
</header>

<div id="contre-indication">
<div class="container p-5  text-dark rounded">
  <h2 id="titre">Contre-indications</h2>
  <p>Voici une liste de critères reprenant certaines contre-indications. Attention, cette liste est indicative et non exhaustive. Seul l’entretien médical avant le don ainsi que le questionnaire médical comptent. Dès lors, il se peut que le médecin ne vous autorise pas à donner du sang pour assurer votre sécurité 
    ou celle du receveur. Cette sécurité est la priorité du Service du Sang.</p>
</div>




<section class="container p-5">
  <div class="col-sm text-center pb-3" id="buttons">
    <a id="clikk" onclick="previousParagraph()" class="mx-3"><img class="img-fluid pb-2" src="images/Précédent.png" alt="Précédent" width="30px"><span style="font-size: x-large;">Précédent</span> </a>
    <a id="clikk" onclick="nextParagraph()" class="mx-3"><span style="font-size: x-large;">Suivant</span> <img class="img-fluid text-danger pb-2" src="images/Suivant.png" alt="suivant"> </a>
  </div>
        <main class="row">
               <article class="col-sm icon-container">
                <div id="container">
                  <div>

                   

                      <!--paragraph 1 -->
                      <div class="container p-3 text-center" id="paragraph1">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Grossesse</h3>
                            <p class="card-text">Par précaution pour le bébé et pour vous-même,
                               vous ne pouvez pas faire de don pendant votre 
                              grossesse ni pendant <b>les 6 mois </b>qui suivent l’accouchement.
                               Après une fausse-couche ou un avortement, le délai est également de <b>6 mois</b>.
                                L’allaitement n’est pas une contre-indication au don de sang .</p>
                          </div>
                          <img src="images/grossesse.avif" class="card-img-bottom" alt="..." height="300px" width="300px">
                        </div>
                      </div>

                      <!--paragraph 2 -->

                      <div class="container p-3 text-center" id="paragraph2" style="display: none;">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Poids</h3>
                            <p class="card-text">Pour pouvoir donner du sang, du plasma ou des plaquettes,
                               vous devez peser 
                              au minimum <b>50 kg</b> voire un peu plus si vous mesurez moins d’<b>1,56m</b> .</p>
                          </div>
                          <img src="images/poid.avif" class="card-img-bottom" alt="poid" height="300px" width="300px">
                        </div>
                      </div>

                      <!--paragraph 3 -->
                      <div class="container p-3 text-center" id="paragraph3" style="display: none;">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Covid 19</h3>
                            <h4 class="card-text">COVID CONFIRMÉ OU POSSIBLE :</h4>
                            <ul class="card-text">
                              <p >Délai de <b>15 jours</b> après la fin des symptômes.</p>
                              <p> Délai de <b>15 jours</b> après la date du test si absence de symptômes.</p>
                              <p><b>Symptômes compatibles avec un Covid</b> sans avoir effectué de test : attendez au minimum la disparition des symptômes. </p>
                              <p>Le délai peut cependant être plus important selon le cas.</p>
                            </ul>
                          </div>
                          <img src="images/covid.avif" class="card-img-bottom" alt="covid" height="300px" width="300px">
                        </div>
                      </div>
                      
                       <!--paragraph 4 -->
                      <div class="p-3 text-center" id="paragraph4" style="display: none;">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Usage de drogues intraveineuses</h3>
                            <p class="card-text"> Les personnes ayant utilisé des drogues intraveineuses peuvent être exclues du don de sang en raison du risque accru d'infections transmissibles par le sang, telles que le VIH, l'hépatite B et C, entre autres. Cette exclusion est mise en place pour garantir la sécurité du donneur et la sécurité du sang transfusé aux patients. Les infections transmissibles par le sang peuvent compromettre la santé du receveur, et les critères d'exclusion sont conçus pour minimiser ce risque. Il est essentiel que les donneurs potentiels fournissent des informations précises sur leur historique médical et leurs comportements afin d'assurer la sécurité des produits sanguins .</p>
                          </div>
                          <img src="images/Usage de drogues intraveineuses.avif" class="card-img-bottom" alt="Usage de drogues intraveineuses" height="300px" width="300px">
                        </div>
                      </div>

                        <!--paragraph 5 -->
                      <div class="p-3 text-center" id="paragraph5" style="display: none;">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Maladie</h3>
                            <ul>
                              <p>Si vous avez un rhume et que vous n’avez pas eu de fièvre, vous pouvez donner .</p>
                              <p>Si vous avez de la fièvre (>/=38°C), attendez 2 semaines après guérison ou plus selon la maladie .</p>
                            </ul>
                            <h6>Certaines maladies contre-indiquent définitivement le don de sang :</h6>
                            <p>cancer, AVC (Accident Vasculaire Cérébral), infarctus, diabète traité par insuline...</p>
                          </div>
                          <img src="images/grippe.jpg" class="card-img-bottom" alt="grippe" height="300px" width="300px">
                        </div>
                      </div>

                        <!--paragraph 6 -->

                      <div class="p-3 text-center" id="paragraph6" style="display: none;">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Habitudes de voyage</h3>
                           <p>
                            Les habitudes de voyage peuvent affecter l'admissibilité au don de sang
                             en raison des risques 
                            potentiels de transmission de maladies infectieuses.
                            </p>
                            <p>
                              Les donneurs ayant voyagé dans des zones à risque élevé peuvent être soumis
                               à des restrictions temporaires afin de minimiser ces risques.
                                Il est crucial pour les donneurs potentiels de divulguer leurs destinations 
                                de voyage récentes lors des évaluations préalables au don. Ces mesures visent
                                 à garantir la sécurité des produits sanguins et à protéger la santé des 
                                 receveurs de transfusions .
                            </p>
                            <p>
                              Les critères spécifiques peuvent varier selon les organismes de collecte de sang,
                               et les donneurs sont encouragés
                               à fournir des informations précises pour une évaluation appropriée
                                de leur éligibilité au don de sang.
                            </p>
                          </div>
                          <img src="images/Habitudes de voyage.avif" class="card-img-bottom" alt="Habitudes de voyage" height="300px" width="300px">
                        </div>
                      </div>

                        <!--paragraph 7 -->

                      <div class="p-3 text-center" id="paragraph7" style="display: none;">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Piercing et tatouage</h3>
                            <p class="card-text">Vous devez attendre 4 mois après avoir fait un tatouage,
                               un piercing (y compris des boucles d’oreilles) ou du maquillage permanent 
                               avant de pouvoir faire un don.

                            </p>
                          </div>
                          <img src="images/Piercing et tatouage.jpg" class="card-img-bottom" alt="Piercing et tatouage" height="300px" width="300px">
                        </div>
                        
                      </div>

                       <!--paragraph 8 -->
                      <div class="p-3 text-center" id="paragraph8" style="display: none;">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title" id="titre">Vaccins</h3>
                           <p>
                            Les restrictions de don de sang liées aux voyages et aux vaccins varient
                             selon les autorités sanitaires locales et les organismes de collecte de sang.
                            </p>
                            <p> En général, les personnes ayant voyagé dans des zones à risque élevé de maladies
                              transmissibles peuvent faire l'objet de restrictions temporaires.
                               En ce qui concerne les vaccins, la plupart des vaccins courants
                                ne devraient pas empêcher les donneurs de sang, mais des directives
                                 spécifiques peuvent s'appliquer, notamment en cas de réception de vaccins
                                  contenant des agents pathogènes vivants affaiblis.
                            </p>
                            <p> Il est recommandé
                              de vérifier les directives spécifiques de l'organisme
                       de collecte de sang local avant de donner du sang après un voyage ou une vaccination.</p>
                          </div>
                          <img src="images/vaccin.jpg" class="card-img-bottom" alt="vaccin" height="300px" width="300px">
                        </div>
                      </div>
                      
                     
                  </div>
              </div>

               </article>
              
        </main>
</section>

</div>





<section class="container bg-light text-center text-dark pt-4">
  <div class="text-center pb-3">
    <h2 id="titre">VOS QUESTIONS, NOS RÉPONSES.</h2>
  </div>
  <main class="row">
        <article class="col-sm">
         
          <button class="accordion"><b>Y a-t-il un délai spécifique entre deux dons de sang ?</b> </button>
          <div class="panel">
            <p> 
              Oui, il existe un délai recommandé entre deux dons de sang.
              En général, la plupart des pays recommandent un intervalle de 8 semaines
              (56 jours) entre chaque don. Cela permet au donneur de récupérer
              complètement et de garantir la sécurité du processus.
            </p>
          </div>
          
          <button class="accordion"><b> Pourquoi y a-t-il un délai entre les dons de sang ?</b> </button>
          <div class="panel">
            <p>
              Le délai entre les dons est essentiel pour permettre au donneur de récupérer
               les niveaux de globules rouges, de plaquettes et de plasma. Cela garantit
                également la santé à long terme du donneur
               en évitant une diminution excessive des réserves de fer.
            </p>
          </div>
          
         
          <button class="accordion"><b>Comment puis-je savoir quand je suis prêt à faire un autre don ?</b> </button>
          <div class="panel">
            <p>
              Les centres de collecte de sang tiennent généralement un registre
               des dons précédents et vous informeront du moment où vous êtes
                éligible pour un nouveau don. Certains centres ont également
                 des applications ou des services
               en ligne pour suivre votre historique de dons.
            </p>
          </div>
        </article>


        <article class="col-sm">
         

          
          <button class="accordion"><b>Puis-je donner du sang si je ne suis pas en parfaite santé ?</b></button>
          <div class="panel">
            <p>La santé est un facteur crucial. Les donneurs doivent être en bonne santé au moment
               du don. Certaines conditions médicales ou prises de médicaments peuvent affecter
                l'admissibilité. Il est important
               d'informer le personnel médical de tout problème de santé lors de l'inscription .
            </p>
          </div>
          
          <button class="accordion"><b> Les donneurs réguliers ont-ils des délais différents ?</b></button>
          <div class="panel">
            <p> 
              En général, les donneurs réguliers ont souvent des délais plus courts 
              entre les dons, car leur corps s'est adapté au processus. Cependant, 
              il est toujours essentiel de respecter les recommandations du centre
               de collecte de sang pour assurer la sécurité et le bien-être du donneur.
            </p>
          </div>

          <button class="accordion"><b>  Puis-je donner du sang plus fréquemment en cas d'urgence ?</b></button>
          <div class="panel">
            <p>
              En cas d'urgence ou de besoins critiques, les centres de collecte de sang
              peuvent ajuster les délais entre les dons. Cependant,
              cela dépend des politiques spécifiques du centre et des circonstances de l'urgence.
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


<!--FAQ-->

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



<!--scrole paragraphe-->

<script>
  let currentParagraph = 1;

  function nextParagraph() {
      const current = document.getElementById(`paragraph${currentParagraph}`);
      current.style.display = "none";

      currentParagraph++;
      if (currentParagraph > 8) {
          currentParagraph = 1;
      }

      const next = document.getElementById(`paragraph${currentParagraph}`);
      next.style.display = "block";
  }

  function previousParagraph() {
      const current = document.getElementById(`paragraph${currentParagraph}`);
      current.style.display = "none";

      currentParagraph--;
      if (currentParagraph < 1) {
          currentParagraph = 8;
      }

      const previous = document.getElementById(`paragraph${currentParagraph}`);
      previous.style.display = "block";
  }
</script>
    
</body>
</html>