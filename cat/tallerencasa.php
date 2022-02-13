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

  //Parte "innecesaria".
  //$mail->addReplyTo($_POST['email'], $_POST['name']);
  //$mail->addCC($_POST['email']);
  // $mail->addBCC('bcc@example.com');

  // Attachments (Para enviar archivos y imagenes)
  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

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

  <title>Tallers a casa - BCN Cooking Experience</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/landing-page.min.css" rel="stylesheet">
  <link href="../css/talleres.css" rel="stylesheet">
  <link href="../css/encasa.css" rel="stylesheet">

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
            <option value="/cat/tallerencasa.php" id="ca">CAT</option>
            <option value="/en/tallerencasa.php" id="en">EN</option>
            <option value="/tallerencasa.php" id="es">ESP</option>
          </select>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Masthead -->
  <div class="mobile-second">
    <header class="text-white text-center">
      <div class="header-info">
        <div class="informational-text text-left">
          <h1>Tallers de cuina <br> a casa teva.</h1>
          <p class="pt-5 descripcion-header">
            T'ensenyem des de la comoditat de la teva casa. <br>
            Comparteix el taller amb els teus en una experiència única!
          </p>
        </div>
        <div class="foto-header-encasa foto-header">
          <img src="../img/cocina-en-casa.PNG" alt="Cuinera saltejant unes verdures">
        </div>
      </div>
    </header>

    <div class="text-white text-center">
      <div class="talleres-info">
        <div class="informational-text text-left">
          <p class="slogan">Tallers de cuina tradicional espanyola.</p>
          <h6>Gaudeix de la cuina casolana com mai.</h6>
          <div class="fl" id="informational-text-paragrafos">
            <h6 class="pt-5">
              Tallers d'arrossos, tapes i guisats.
            </h6>
            <h6 class="pt-5 px-5">
              Durant aproximadament 3 hores cuinarem mà a mà els plats de la teva elecció des de la teva pròpia casa.
              Convida als teus familiars o amics per a aprendre tots junts.
              <br>
              <br>
              Nosaltres ens encarreguem de la neteja dels utensilis utilitzats.
            </h6>
            <p class="pt-5 pr-5">
              Durada: 3h
              <br>
              <br>
              Capacitat: 15 persones
              <br>
              <br><span class="precio">38€</span>
            </p>
          </div>
          <div class="fl" id="informational-text-paragrafos-menosw">
            <h6 class="pt-5 pr-5">
              Durant aproximadament 3 hores cuinarem mà a mà els plats de la teva elecció des de la teva pròpia casa.
              Convida als teus familiars o amics per a aprendre tots junts.
            </h6>
            <h6 class="pt-3 pr-5 descripcion-taller">
              Nosaltres ens encarreguem de la neteja dels utensilis utilitzats.</h6>
            <div class="fl pt-5" id="caracteristicas-taller-div-es">
              <p class="pr-5 caracteristicas-taller">
                Durada: 3h
              </p>
              <p class="pr-5">
                Capacitat: 15 persones
              </p>
              <p class="caracteristicas-taller">
                <span class="precio" id="precio-talleres-es">38€</span>
              </p>
            </div>
          </div>

        </div>
        <div class="foto-header-encasa foto-header">
          <img src="../img/entucasa.PNG" alt="Grup d'amics gaudint d'una ensalada">
        </div>
      </div>
    </div>
  </div>
  <div class="mobile-first px-4">
    <h1 class="mb-5">Tallers de cuina a casa teva.</h1>
    <h4 class="mb-5">
      T'ensenyem des de la comoditat de la teva casa.
      Comparteix el taller amb els teus en una experiència única!
    </h4>
    <div class="mb-5">
      <h5>Tallers de cuina tradicional espanyola.</h5>
      <h6>Gaudeix de la cuina casolana com mai.</h6>
    </div>
    <h6 class="mb-5">
      Tallers d'arrossos, tapes i guisats.
    </h6>
    <h6 class="mb-5">
      Durant aproximadament 3 hores cuinarem mà a mà els plats de la teva elecció des de la teva pròpia casa.
      Convida als teus familiars o amics per a aprendre tots junts.
    </h6>
    <h6 class="mb-5">
      Nosaltres ens encarreguem de la neteja dels utensilis utilitzats.
    </h6>
    <div class="mb-5">
      <p class="">
        Durada: 3h
      </p>
      <p class="">
        Capacitat: 15 persones
      </p>
      <p class="">
        38€
      </p>
    </div>
  </div>
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
          <p class="mb-4 text-left mx-5">Envia'm un correu o un WhatsApp indicant quin taller t'interessa i en la major brevetat ens posarem en contacte.</p>
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