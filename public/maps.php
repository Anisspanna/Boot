<?php
require_once "../core/sessionprotection.php";
require_once "../core/autoloading.php";

session_start();






?>


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

.service-block4 {
    position: relative;
    border: 1px solid #f7f7f7;
    background: #fff;
    box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
    border-radius: 5px;
    overflow: hidden;
    padding: 30px
}

.service-block4:before {
    position: absolute;
    top: -42px;
    right: -100px;
    z-index: 0;
    content: " ";
    width: 250px;
    height: 120px;
    background: #f7f7f7;
    border-bottom-left-radius: 0;
    transition: all 0.4s ease-in-out;
    transform: rotate(45deg);
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out
}

.service-block4:hover:before {
    background: red
}

.service-block4 .service-icon {
    position: absolute;
    top: 18px;
    right: 18px;
    z-index: 1;
    text-align: center
}

.service-block4 i {
    color: #2b84d6;
    font-size: 38px;
    line-height: normal;
    transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    margin-bottom: 0
}

.service-block4:hover i {
    color: #fff
}

.service-block4 .service-desc {
    position: relative
}

.service-block4 .service-desc h4 {
    margin-bottom: 8px;
    font-size: 18px;
    font-weight: 600
}

.service-block4 .service-desc h5 {
    margin-bottom: 5px;
    font-size: 12px;
    font-weight: 500
}

.service-block4 .service-desc h5:after {
    content: '';
    display: block;
    width: 80px;
    height: 2px;
    background: #2b84d6;
    margin-top: 10px;
    margin-bottom: 15px;
    -moz-transition-duration: .4s;
    -ms-transition-duration: .4s;
    -webkit-transition-duration: .4s;
    -o-transition-duration: .4s;
    transition-duration: .4s
}

.service-block4 p {
    margin-top: 25px;
    padding-right: 50px;
    margin-bottom: 0
}

@media screen and (max-width: 1199px) {
    .service-block4:before {
        right: -110px
    }
    .service-block4 .service-desc h4 {
        font-size: 16px;
        margin-bottom: 5px
    }
    .service-block4 p {
        padding-right: 40px;
        margin-top: 20px
    }
    .service-block4 i {
        font-size: 34px
    }
}

@media screen and (max-width: 991px) {
    .service-block4 {
        padding: 25px
    }
    .service-block4 .service-desc h4 {
        font-size: 15px
    }
    .service-block4 i {
        font-size: 32px
    }
    .service-block4 p {
        margin-top: 15px;
        padding-right: 30px
    }
}

@media screen and (max-width: 767px) {
    .service-block4 {
        padding: 20px
    }
    .service-block4:before {
        right: -130px
    }
    .service-block4 i {
        font-size: 28px
    }
    .service-block4 .service-icon {
        top: 13px;
        right: 12px
    }
}

.margin-30px-bottom {
    margin-bottom: 30px;
}
  </style>


<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
</style>

    <!-- navbar -->
      <header>
            <!-- Navbar -->
            <?php if(!isset($_SESSION['y3adi']))
				{

				echo'
				<nav class="navbar navbar-expand-lg bg-body-tertiary">
				<div class="container">
				  <a class="navbar-brand" href="index.php"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
				  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
					 
					 
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
			</nav>';
				}?>


			<?php if(isset($_SESSION['y3adi']))
			{

			echo '
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container">
			  <a class="navbar-brand" href="index.html"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
				 
				 
				 
				  
				  
				</ul>
				<div  class="d-flex" >
				<a href="hopitale.php" class="btn btn-outline-danger">Dashboard</a> &nbsp;
					
					<a href="logout.php" class="btn btn-outline-danger">Déconnecter</a>
				</div>
			  </div>
			</div>
		</nav>';
	
		
	}?>
    <!-- Navbar -->
      
      
      </header>


      <div class="pt-3  rounded">
        <h3 class="text-center" id="titre">Centre du Don !</h3>
      </div>


      <div class="container p-3">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
        
        <div class="row justify-content-center">
          
          <div class="col-md-4 p-3">
          <select name="ville" class="form-select">
              <option value="" selected disabled>Ville</option>
              <option value="Adrar">Adrar</option>
              <option value="Chlef">Chlef </option>
              <option value="Laghouat">Laghouat</option>
              <option value="Oum El Bouaghi">Oum El Bouaghi</option>
              <option value="Batna">Batna</option>               
              <option value="Bejaia">Bejaia</option>
              <option value="Biskra">Biskra</option>
              <option value="Bechar">Béchar </option>
              <option value="Blida">Blida </option>
              <option value="Bouira">Bouira </option>
              <option value="Tamanrasset">Tamanrasset </option>
              <option value="Tebessa">Tébessa </option>
              <option value="Tlemcen">Tlemcen </option>
              <option value="Tiaret">Tiaret </option>
              <option value="Tizi Ouzou">Tizi Ouzou</option>
              <option value="Alger">Alger </option>
              <option value="Djelfa">Djelfa </option>
              <option value="Jijel">Jijel </option>
              <option value="Setif">Sétif </option>
              <option value="Saida">Saida </option>
              <option value="Skikda">Skikda </option>
              <option value="Sidi Bel Abbes">Sidi Bel Abbes</option>
              <option value="Annaba">Annaba</option>
              <option value="Guelma">Guelma </option>
              <option value="Constantine">Constantine </option>
              <option value="Medea">Médéa </option>
              <option value="Mostaganem">Mostaganem </option>
              <option value="MSila">M'Sila </option>
              <option value="Mascara">Mascara</option>
              <option value="Ouargla">Ouargla </option>
              <option value="Oran">Oran </option>
              <option value="El Bayadh">El Bayadh</option>
              <option value="Illizi">Illizi </option>
              <option value="Bordj Bou Arreridj">Bordj Bou Arréridj</option>
              <option value="Boumerdes">Boumerdès </option>
              <option value="El Taref">El Taref </option>
              <option value="Tindouf">Tindouf </option>
              <option value="Tissemsilt">Tissemsilt </option>
              <option value="El Oued">El Oued</option>
              <option value="Khenchela">Khenchela </option>
              <option value="Souk Ahras">Souk Ahras</option>
              <option value="Tipaza">Tipaza </option>
              <option value="Mila">Mila </option>
              <option value="Ain Defla">Aïn Defla </option>
              <option value="Naama">Naâma </option>
              <option value="Aïn Témouchent">Aïn Témouchent</option>
              <option value="Ghardaia">Ghardaïa </option>
              <option value="Relizane">Relizane </option>
              <option value="Timimoun">Timimoun </option>
              <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar</option>
              <option value="Ouled Djellal">Ouled Djellal</option>
              <option value="Beni Abbes">Béni Abbès</option>
              <option value="In Salah">In Salah</option>
              <option value="In Guezzam">In Guezzam </option>
              <option value="Touggourt">Touggourt</option>
              <option value="Djanet">Djanet</option>
              <option value="El Meghaier">El Meghaier</option>
              <option value="El Menia">El Menia</option>
                            </select>
          </div>
          <div class="col-md-4">
            <div class="input-group text-center p-3 mb-3">
              <button style="background-color: green;color: #fff; width: 250px; height: 40px;" class="btn" type="submit" name="search" id="basic-addon2">Rechercher</button>
            </div>
          </div>
        </div>
    </form>
      </div>

      <section class="container mt-2">
               <main class="row">
                     
                        <article class="col-sm">
                                
                        <?php  
                        $error=0;
                        $ville="";
                    if(isset($_POST['search']))
                    {
                      if(isset($_POST['ville']) && !empty($_POST['ville']))
                      {
                        $ville= filtring(mysqli_real_escape_string($connection,$_POST['ville']));
                        if (!in_array($ville, ['Adrar', 'Chlef', 'Laghouat', 'Oum El Bouaghi', 'Batna', 'Bejaia', 'Biskra', 'Bechar', 'Blida', 'Bouira', 'Tamanrasset', 'Tebessa', 'Tlemcen', 'Tiaret', 'Tizi Ouzou', 'Alger', 'Djelfa', 'Jijel', 'Setif', 'Saida', 'Skikda', 'Sidi Bel Abbes', 'Annaba', 'Guelma', 'Constantine', 'Medea', 'Mostaganem', 'MSila', 'Mascara', 'Ouargla', 'Oran', 'El Bayadh', 'Illizi', 'Bordj Bou Arreridj', 'Boumerdes', 'El Taref', 'Tindouf', 'Tissemsilt', 'El Oued', 'Khenchela', 'Souk Ahras', 'Tipaza', 'Mila', 'Ain Defla', 'Naama', 'Ain Témouchent', 'Ghardaia', 'Relizane', 'Timimoun', 'Bordj Badji Mokhtar', 'Ouled Djellal', 'Beni Abbes', 'In Salah', 'In Guezzam', 'Touggourt', 'Djanet', 'El Meghaier', 'El Menia'])) {
                          $error = 1;
                          $_SESSION['e_ville'] = "La ville n'est pas dans la liste des villes autorisées!";
                      }
                      
                    
                      }else
                      {
                        $error =1;
                         $_SESSION["e_ville"] = "Obligatoire!";
                      }
                    
                      if($error==0)
                      {
                          $stmt=$connection->prepare("SELECT * FROM `bnadms` WHERE (`blastek`='h_bancsang_d' OR `blastek`='h_bancsang_maalem_d') AND `ville_donneur_s`=?");
                          $stmt->bind_param("s",$ville);
                          $stmt->execute();
                          $result1=$stmt->get_result();

                          if($result1->num_rows > 0)
                          {
                            while($data = $result1->fetch_assoc())
                            {
                               echo'
                               <div  class="row mt-60">
                               <div class=" margin-30px-bottom xs-margin-20px-bottom">
                                   <div class="service-block4 h-100">
                                       <div class="service-icon">
                                           <i class="icon-tools"></i>
                                       </div>
                                       <div class="service-desc">
                                           <h4>'.$data['nom_donneur_s'].' ('.$data['nom_donneur_s'].' Maison du don - 13200)</h4>
                                           <h5> <img src="images/position.png" alt="position" width="30px"  /> <span></span> Banc du Sang</h5>
										   <article class="d-flex justify-content-evenly pt-3">
											   <div>
													<h6><img src="images/goutte_sang.png" alt="goutte_sang" width="22px"/>Sang<span></span> </h6>
											   </div>
											   <div>
													<h6><img src="images/goutte_plasma.png" alt="goutte_plasma" width="22px"/>Plasma<span></span> </h6>
											   </div>
											   <div>
													<h6><img src="images/goutte_plaquette.png" alt="goutte_plaquette" width="22px"/>Plaquette<span></span> </h6>
											   </div>
											  </article>
										   <div class="pt-3 text-center">
										   		<h6>Numéro téléphone :'.$data['telephone_donneur_s'].'</h6>
										   </div>




                                       </div>
                   
                                   </div>
                               </div>
                                   
                           </div>
                               ';
                            }
                          }else
                          {
                              echo'<div class="row mt-60">
                              <div class=" margin-30px-bottom xs-margin-20px-bottom">
                                  <div class="service-block4 h-100">
                                      <div class="service-icon">
                                          <i class="icon-tools"></i>
                                      </div>
                                      <div class="service-desc">
                                      <h4>Aucun Résultat</h4>
                                      <h5>Banc Sang</h5>
                                            <article class="d-flex justify-content-evenly pt-3">
                                            <div>
                                              <h6><img src="images/goutte_sang.png" alt="goutte_sang" width="22px"/>Sang<span></span></h6>
                                            </div>
                                            <div>
                                              <h6><img src="images/goutte_plasma.png" alt="goutte_plasma" width="22px"/>Plasma<span></span> </h6>
                                            </div>
                                            <div>
                                              <h6><img src="images/goutte_plaquette.png" alt="goutte_plaquette" width="22px"/>Plaquette<span></span> </h6>
                                            </div>
                                          </article>
                                      </div>
                  
                                  </div>
                              </div>
                                  
                          </div>';
                          }
                      }
                    
                    }
                    
                  ?>
       
                      
                        </article>

                     <article class="col-sm">
                            <div id="map"></div>
                     </article>

                     
               </main>
      </section>

      <script>
    var customLabel = {
        banc: {
            label: 'B'
        },
    };

    function initMap() {
        var ville = '<?php echo $ville; ?>'; 

        var map = new google.maps.Map(document.getElementById('map'), {
            center: getCityCenter(ville),
            zoom: setZoomLevel(ville),
        });

        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('http://localhost/Boot/public/xml.php', function (data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function (markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);
                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                });
                marker.addListener('click', function () {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
    

    function getCityCenter(ville) {
        switch (ville) {
            case 'Annaba':
                return new google.maps.LatLng(36.864235, 7.742628);
            
            default:
                return new google.maps.LatLng(30.0339, 1.6596); 
        }
    }

	function setZoomLevel(ville) {
    var zoomLevel;
    switch (ville) {
        case 'Annaba':
            zoomLevel = 12; 
            break;
        default:
            zoomLevel = 4.5; 
    }
    return zoomLevel;
}
	
</script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_2D9yfXeN4mq-IU49Gf6JFnoDhtgdAcs&callback=initMap" ></script>
      
 


      <section class="container-fluid">
    <main class="row">
    

      <article  class="col-sm p-5">
          <div class="text-dark rounded">
              <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='O+'"); 
              $a=mysqli_num_rows($sqll);

              ?>
              
              <div style="border-radius: 6px; border: 1px solid #eee;" class="p-2">
                <div class="d-flex justify-content-around pt-2">
                  <div>
                    <img src="images/blood.png"
                      class="img-fluid"
                      alt="blood">
                      <b><span><?php echo $a; ?></span></b>
                      <h4 class="text-center">O+</h4> 
                  </div>
                  <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='A+'"); 
              $b=mysqli_num_rows($sqll);

              ?>
                  <div>
                    <img src="images/blood.png"
                      class="img-fluid"
                      alt="blood">
                      <b><span><?php echo $b; ?></span></b>

                      <h4 class="text-center">A+</h4>

                  </div>
                  <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='B+'"); 
              $c=mysqli_num_rows($sqll);

              ?>
                  <div>
                    <img src="images/blood.png"
                      class="img-fluid"
                      alt="blood">
                      <b><span><?php echo $c; ?></span></b>


                      <h4 class="text-center">B+</h4>

                  </div>
                  <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='AB+'"); 
              $ab=mysqli_num_rows($sqll);

              ?>
                  <div>
                    <img src="images/blood.png"
                      class="img-fluid"
                      alt="blood">
                      <b><span><?php echo $ab; ?></span></b>


                      <h4 class="text-center">AB+</h4>

                  </div>
              </div>

              <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='O-'"); 
              $o=mysqli_num_rows($sqll);

              ?>

              <div class="d-flex justify-content-around pt-2">
                <div>
                  <img src="images/blood.png"
                    class="img-fluid"
                    alt="blood">
                    <b><span><?php echo $o; ?></span></b>


                    <h4 class="text-center">O-</h4>
                </div>
                <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='A-'"); 
              $f=mysqli_num_rows($sqll);

              ?>
                <div>
                  <img src="images/blood.png"
                    class="img-fluid"
                    alt="blood">
                    <b><span><?php echo $f; ?></span></b>


                      <h4 class="text-center">A-</h4>


                </div>
                <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='B-'"); 
              $v=mysqli_num_rows($sqll);

              ?>
                <div>
                  <img src="images/blood.png"
                    class="img-fluid"
                    alt="blood">
                    <b><span><?php echo $v; ?></span></b>
                    
                    <h4 class="text-center">B-</h4>

                </div>
                <?php $sqll=mysqli_query($connection,"SELECT * FROM bnadms WHERE blastek='h_b_donneurs' AND groupage_donneur_s='AB-'"); 
              $n=mysqli_num_rows($sqll);

              ?>
                <div>
                  <img src="images/blood.png"
                    class="img-fluid"
                    alt="blood">
                    <b><span><?php echo $n; ?></span></b>
                    
                    <h4 class="text-center">AB-</h4>
                </div>
              </div>
              </div>
            
             
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