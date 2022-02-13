<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
  //Server settings
  /* $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output */
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = 'mail.ssc.cat';                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'info@ssc.cat';                     // SMTP username
  $mail->Password   = '91842Sc%%';                               // SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

  //Recipients

  //Quien lo ENVIA
  $mail->setFrom('info@ssc.cat');

  //Quien lo RECIBE
  $mail->addAddress('info@bcncookingexperience.com'/* , 'SSC STUDIOS' */);     // Add a recipient

  // Se puede mandar el correo a mas de una persona a la vez
  $mail->addAddress($_POST['email'], $_POST['name']);   // Name is optional


  // Content

  //Para permitir que el correo envie HTML.
  $mail->isHTML(false);                                  // Set email format to HTML
  //$mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Form Submission: ' . $_POST['subject']; //Asunto
  $mail->Body    = '<h1>Nombre: ' . $_POST['name'] . '</h1>' . '<h2>Correo electronico: ' . $_POST['email'] . '</h2><br><p>Mensaje:' . $_POST['message'] . '</p>'; //Cuerpo o mensaje del correo en caso de aceptar HTML.
  $mail->AltBody = 'Nombre: ' . $_POST['name'] . ' Correo electronico: ' . $_POST['email'] . ' Mensaje: ' . $_POST['message']; //Cuerpo o mensaje del correo en caso de NO aceptar HTML.

  $mail->send();
  if ($mail->send()) {
    echo 'El mensaje se ha enviado correctamente.';
  } else {
    echo "Ha habido un error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
  <link rel="icon" href="logoBCNCookingExperience.png">
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bcn Cooking Experience és un taller de cuina amb seu a Barcelona, especialitzat en cuina espanyola i catalana.">
  <meta name="author" content="SSC Studio ssc.cat">
  <meta name="keywords" content="Barcelona, cuina, experience, experiència, menjar, Espanya, tradicional, taller, català, Catalunya, BCN">

  <title>Tapes - BCN Cooking Experience</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/landing-page.min.css" rel="stylesheet">
  <link href="../css/talleres.css" rel="stylesheet">
  <link href="../css/tapas.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <div class="container-nav ">
      <a class="navbar-brand js-scroll-trigger logo-nav" href="index.php"><img src="../img/bcncookingexperience-horizontal.png" alt="Logo bcncookingexperience"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="talleres.php">Tallers de cuina</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about.php">Qui som</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacta'ns</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="tallerencasa.php">Tallers a casa</a>
          </li>
          <select class="bg-light language-selector" onchange="if (this.value) window.location.href=this.value">
            <option value="/cat/tapas.php" id="ca">CAT</option>
            <option value="/en/tapas.php" id="en">EN</option>
            <option value="/tapas.php" id="es">ESP</option>
          </select>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <div class="fl mobile-second">
    <div>
      <header class="text-white text-center">
        <div class="header-info">
          <div class="informational-text text-left">
            <h1>Tapes tradicionals</h1>
            <h4 class="pb-5 pt-3 pr-5 descripcion-header">
              Si ets un gurmet de les tapes, aquest taller és per a tu!</h4>
          </div>
        </div>
      </header>
      <div class="text-white text-center">
        <div class="talleres-info">
          <div class="informational-text text-left">
            <h5>Tallers de cuina de tapes tradicionals</h5>
            <h6>Gaudeix de la cuina casolana com mai.</h6>
            <div class="fl pb-5" id="informational-text-paragrafos">
              <h6 class="pt-5 pb-5">
                Amb aquestes tapes podràs tastar el millor d'una tapa, amb el mateix
                sabor com sempre.
              </h6>
              <!-- <p class="pt-5 px-5">
                Dijous de 18h a 21h <br>
                -Mandonguilles casolanes<br>
                -Truita de patates<br>
                -Calamars a la romana frescos<br>
              </p>
              <p class="pt-5 px-5 pb-3">
                Divendres de 18h a 21h<br>
                -Calls picants <br>
                -Popets en salsa<br>
                -Calamars a la romana frescos.<br>
              </p> -->
              <p class="pl-5 pt-5">
                Capacitat: 15 persones
              </p>
              <p class="pt-4 caracteristicas-taller">
                <br><span class="precio pr-5 "></span>
              </p>
            </div>
            <div class="fl" id="informational-text-paragrafos-menosw">
              <h6 class="pt-5 pb-5">
                Amb aquestes tapes podràs tastar el millor d'una tapa, <br> amb el mateix
                sabor com sempre.
              </h6>
              <!-- <h6 class="pt-5 pr-5 descripcion-taller">
                Dijous de 18h a 21h <br>
                -Mandonguilles casolanes<br>
                -Truita de patates<br>
                -Calamares a la romana frescos<br>
              </h6>
              <h6 class="pt-5 pr-5 descripcion-taller">
                Divendres de 18h a 21h<br>
                -Calls picants <br>
                -Popets en salsa<br>
                -Calamares a la romana frescos.<br>
              </h6> -->
              <div class="fl pb-4" id="caracteristicas-taller-div-es">
                <p class="pr-5 pb-5">
                  Capacitat: 15 persones
                </p>
                <p class="caracteristicas-taller">
                  <span class="precio pr-5" id="precio-talleres-es"></span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fotoGrande fl">

      <img src="../img/pizza.jpg" alt="Pinchos">
    </div>
  </div>
  <!-- <div class="mobile-second">
    <header class="text-white text-center">
      <div class="header-info">
        <div class="informational-text text-left">
          <h1>Tapes tradicionals</h1>
          <h4 class="pt-5 descripcion-header">
            Si ets un gurmet de les tapes, aquest taller és per a tu!</h4>
        </div>
        <div class="foto-header-w foto-header">
          <img src="../img/pizza.jpg" alt="Pizza">
        </div>
      </div>
    </header>

    <div class="text-white text-center">
      <div class="talleres-info">
        <div class="informational-text text-left">
          <h5>Tallers de cuina de tapes tradicionals</h5>
          <h6>Gaudeix de la cuina casolana com mai.</h6>
          <div class="fl w-100" id="informational-text-paragrafos">
            <h6 class="pt-5 pr-5">
              Amb aquestes tapes podràs tastar el millor d'una tapa, <br> amb el mateix
              sabor com sempre.
            </h6>

          </div>
          <div class="fl" id="informational-text-paragrafos-menosw">
            <h5 class=" pr-5">
              Amb aquestes tapes <br> podràs tastar el millor <br> d'una tapa, <br> amb el mateix
              sabor com sempre.
            </h5>

            <div class="fl pt-5" id="caracteristicas-taller-div-es">
              <p class="pr-5 caracteristicas-taller">
                Duració: 3h
              </p>
              <p class="pr-5">
                Capacitat: 15 persones
              </p>
              <p class="caracteristicas-taller">
                <span class="precio pr-5" id="precio-talleres-es">58€</span>
              </p>
            </div>
          </div>
        </div>
        <div class="foto-header foto-header-w">
          <img src="../img/niscalos.jpg" alt="Rovellons a la platxa">
        </div>
      </div>
    </div>
  </div> -->
  <div class="mobile-first px-4">
    <h1 class="mb-5">Tapes tradicionals</h1>
    <h4 class="mb-5">
      Si ets un gurmet de les tapes, aquest taller és per a tu!<br>
    </h4>
    <div class="mb-5">
      <h5>Tallers de cuina de tapes tradicionals</h5>
      <h6>Gaudeix de la cuina casolana com mai.</h6>
    </div>
    <h6 class="mb-5">
      Amb aquestes tapes podràs tastar el millor d'una tapa, amb el mateix
      sabor com sempre.
    </h6>
    <!-- <p class="">
      Dijous de 18h a 21h <br>
      -Mandonguilles casolanes<br>
      -Truita de patates<br>
      -Calamars a la romana frescos<br>
    </p>
    <p class="">
      Divendres de 18h a 21h<br>
      -Calls picants <br>
      -Popets en salsa<br>
      -Calamars a la romana frescos.<br>
    </p> -->
    <div class="mb-5">
      <p class="">
        Durada: 3h
      </p>
      <p class="">
        Capacitat: 15 persones
      </p>
      <!-- <p class="">
        58€
      </p> -->
    </div>
  </div>
  </section>

  <!-- Horarios -->
  <section class="features-icons text-center container-horario">
    <div class="container-dias">
      <div class="row row-dias">
        <div class="col-12 mb-5 mx-auto">
          <div class="bg-light text-left p-4 container-horarios">
            <p class="mb-0">De <b> dimecres </b> a <b> divendres </b> l'horari serà de 18 a 21 h. <br>
              <b> Dissabtes </b> i <b> diumenges </b> l'horari serà de 12 a 15 h. <br> <br>
            </p>
            <p class="m-0">Tot serà degustat amb cava brut Nature ben fred, vi i aigua.</p>
          </div>
        </div>
        <div class="col-auto me-auto mb-5 mx-auto">
          <div class="carta-dias fl">
            <div class="dia-carta-dia">
              <h5 class="pb-1">Dimecres</h5>
              <p>Guisats
                <!--  de 18 a 21 h -->
              </p>
              <hr>
            </div>
            <p class="text-left px-3">
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
              Cigrons amb Bacallà <br>
              Fideus a la cassola <br>
              Llenties estofades<br>
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
            </p>
            <div class="precio-carta-dia">
              <hr>
              <p class="precio-carta">40€</p>
            </div>
          </div>
        </div>
        <div class="col-auto me-auto mb-5 mx-auto">
          <div class="carta-dias fl">
            <div class="dia-carta-dia">
              <h5 class="pb-1">Jueves</h5>
              <p>Assortiment de Bacallà
                <!--  de 18 a 21 h -->
              </p>
              <hr>
            </div>
            <p class="text-left px-3">
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
              Bacallà en samfaina <br>
              Bacallà en pil pil <br>
              Musselina d'all <br>
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
            </p>
            <div class="precio-carta-dia">
              <hr>
              <p class="precio-carta">55€</p>
            </div>
          </div>
        </div>
        <div class="col-auto me-auto mb-5 mx-auto ">
          <div class="carta-dias fl">
            <div class="dia-carta-dia">
              <h5 class="pb-1">Viernes</h5>
              <p>Tapeo
                <!--  de 18 a 21 h -->
              </p>
              <hr>
            </div>
            <p class="text-left px-3">
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
              Calls picants<br>
              Pops en salsa <br>
              Truita de patates <br>
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
            </p>
            <div class="precio-carta-dia">
              <hr>
              <p class="precio-carta">55€</p>
            </div>
          </div>
        </div>
        <div class="col-auto me-auto mb-5 mx-auto">
          <div class="carta-dias fl">
            <div class="dia-carta-dia">
              <h5 class="pb-1">Sábado</h5>
              <p>Peixos
                <!--  de 12 a 15 h -->
              </p>
              <hr>
            </div>
            <p class="text-left px-3">
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
              Escamarlans saltejades <br> al Tio Pepe <br>
              Calamars a la Romana <br>
              frescs i autèntics<br>
              Suquet de peix<br>
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
            </p>
            <div class="precio-carta-dia">
              <hr>
              <p class="precio-carta">60€</p>
            </div>
          </div>
        </div>
        <div class="col-auto me-auto mx-auto mb-5">
          <div class="carta-dias fl">
            <div class="dia-carta-dia">
              <h5 class="pb-1">Domingo</h5>
              <p>Arroces
                <!--  de 12 a 15 h -->
              </p>
              <hr>
            </div>
            <p class="text-left px-3">
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
              Paella marinera <br>
              Arròs negre <br>
              Fideuà <br>
              <span class="width-carta-dias">Garbanzos con Bacalao </span><br>
            </p>
            <div class="precio-carta-dia">
              <hr>
              <p class="precio-carta">60€</p>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
  </section>

  <!-- Talleres -->
  <section class="features-icons text-center container-talleres">
    <div class="container">
      <div class="row">
        <div class="mx-auto carta mb-5">
          <div class="features-icons-item mx-auto mb-3 ">
            <img src="../img/pulpo-2.PNG" class="img-fluid carta-tapas mx-0 img-border-20" alt="Pop">
            <p class="text-left mt-3 mx-3">Tapes</h3>
            <p class="lead text-justify mb-2 mx-3">Si ets un gurmet de les tapes, aquest taller és per a tu!
            </p>
            <a class="lead text-right text-warning card-link" href="tapas.php">Veure més...</a>
          </div>
        </div>
        <div class="col-lg-0 col-sm-0">
        </div>
        <div class="mx-auto carta mb-5">
          <div class="features-icons-item mx-auto">
            <img class="img-fluid mx-0 carta-tapas img-border-20" src="../img\garbanzosconbacalao2.PNG" alt="Cigrons amb bacallà">
            <p class="text-left mt-3 mx-3">Guisats</h3>
            <p class="lead text-justify mb-2 mx-3">Descobriu la cuina tradicional catalana amb aquests tres famosos
              plats.
            </p>
            <a class="lead text-right text-warning card-link" href="guisos.php">Veure més...</a>
          </div>
        </div>
        <div class="col-lg-0 col-sm-0">
        </div>
        <div class="mx-auto carta mb-5">
          <div class="features-icons-item mx-auto">
            <img src="../img/IMG_20201216_200424_956.jpg" class="img-fluid mx-0 carta-tapas img-border-20" alt="Paella">
            <p class="text-left mt-3 mx-3">Paelles</h3>
            <p class="lead text-justify mb-2 mx-3">Aprèn a cuinar arrossos amb diferents tipus de gra i tècniques de
              cocció per a sibarites.
            </p>
            <a class="lead text-right text-warning card-link" href="paella.php">Veure més...</a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Call to Action -->
  <section class="call-to-action text-white text-center" id="contact">
    <div class="overlay"></div>
    <div class="container mb-5">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-2 text-left mx-5">Posa't en contacte!</h2>
          <p class="mb-4 text-left mx-5">Envia'm un correu o un WhatsApp indicant quin taller t'interessa i en la major
            brevetat ens posarem en contacte.</p>
          <div class="col mx-auto text-left">
            <form method="POST">
              <label class="email-label" for="name">Nom: <br>
                <input class="email-input" placeholder="Nom" type="text" name="name" id="name" required>
              </label><br>
              <label class="email-label" for="email">Correu electrònic: <br>
                <input class="email-input" placeholder="Correu electrònic" type="email" name="email" id="email" required>
              </label><br>
              <label class="email-label" for="subject">Assumpte: <br>
                <input class="email-input" placeholder="Assumpte" name="subject" id="subject" rows="8" cols="20" required>
              </label><br>
              <label class="email-label" for="message">Missatge: <br>
                <textarea class="email-input email-message" placeholder="Missatge" name="message" id="message" rows="8" cols="20" required></textarea>
              </label><br>
              <input class="email-submit" type="submit" name="submit" value="Enviar">
              <label class="email-label" for="antibot">
                <input type="hidden" name="antibot" value="" />
              </label><br>
            </form>
          </div>
          <a class="mailto" href="mailto:info@bcncookingexperience.com" target="_blank">
            info@bcncookingexperience.com
          </a>


        </div>
      </div>
    </div>
    </div>
    <footer class="footer bg-halfdark">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="about.php">Qui som</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contacta'ns</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Termes d'ús</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacitat</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; BCN Cooking Experience 2020. All Rights Reserved.</p>
            <p class="text-muted small mb-4 mb-lg-0">Dissenyat per <a target="_blank" href="https://ssc.cat/">Salvador
                Sànchez</a>.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="https://www.facebook.com/Bcncookingexperience-105824354825733/" target="_blank">
                  <i class="fab fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/bcncookingexperince/" target="_blank">
                  <i class="fab fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://twitter.com/QtaMiguel" target="_blank">
                  <i class="fab fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>