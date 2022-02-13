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
<html lang="en">

<head>
  <link rel="icon" href="logoBCNCookingExperience.png">
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bcn Cooking Experience is a cooking workshop based in Barcelona, specialized in Spanish and Catalan cuisine for foodies.">
  <meta name="author" content="SSC Studio ssc.cat">
  <meta name="keywords" content="Barcelona, cooking, experience, food, Spain, traditional, workshop, Catalan, BCN">

  <title>Home workshops - BCN Cooking Experience</title>

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
            <a class="nav-link js-scroll-trigger" href="talleres.php">Cooking Workshops</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="tallerencasa.php">At home workshops</a>
          </li>
          <select class="bg-light language-selector" onchange="if (this.value) window.location.href=this.value">
            <option value="/en/tallerencasa.php" id="en">EN</option>
            <option value="/cat/tallerencasa.php" id="ca">CAT</option>
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
          <h1>Cooking workshops </br> in your own home.</h1>
          <p class="pt-5 descripcion-header">
            We teach you from the comfort of your home. <br> Share the workshop with your closest friends in a unique
            experience!
          </p>
        </div>
        <div class="foto-header-encasa foto-header">
          <img src="../img/cocina-en-casa.PNG" alt="A cook frying some vegetables">
        </div>
      </div>
    </header>

    <div class="text-white text-center">
      <div class="talleres-info">
        <div class="informational-text text-left">
          <p class="slogan">Traditional cooking workshops.</p>
          <h6>Enjoy authentic cuisine like never before.</h6>
          <div class="fl" id="informational-text-paragrafos">
            <h6 class="pt-5">
              Rice, tapas and stew workshops.
            </h6>
            <h6 class="pt-5 px-5">
              For approximately 3 hours we will cook hand by hand the dishes of your choice from your own home. Invite
              your family or friends to learn together. <br> <br> We take care of cleaning the utensils used.
            </h6>
            <p class="pt-5 pr-5 caracteristicas-taller">
              Length: 3h
              <br>
              <br>
              Capacity: 15 people
              <br>
              <br>
              3 dishes
              <br>
              <br>
              <span class="precio">38€</span>
            </p>
          </div>
          <div class="fl" id="informational-text-paragrafos-menosw">
            <h6 class="pt-5 pr-5">
              For approximately 3 hours we will cook hand by hand the dishes of your choice from your own home. Invite
              your family or friends to learn together.
            </h6>
            <h6 class="pt-3 pr-5 descripcion-taller">
              We take care of cleaning the utensils used.</h6>
            <div class="fl pt-5" id="caracteristicas-taller-div-es">
              <p class="pr-5 caracteristicas-taller">
                Length: 3h
              </p>
              <p class="pr-5">
                Capacity: 15 people
              </p>
              <p class="caracteristicas-taller">
                <span class="precio" id="precio-talleres-es">38€</span>
              </p>
            </div>
          </div>
        </div>
        <div class="foto-header-encasa foto-header">
          <img src="../img/entucasa.PNG" alt="A group of friends enjoying a salad">
        </div>
      </div>
    </div>
  </div>
  <div class="mobile-first px-4">
    <h1 class="mb-5">Cooking workshops in your own home.</h1>
    <h4 class="mb-5">
      We teach you from the comfort of your home. Share the workshop with your closest friends in a unique
      experience!
    </h4>
    <div class="mb-4">
      <h5>Traditional cooking workshops.</h5>
      <h6>Enjoy authentic cuisine like never before.</h6>
    </div>
    <h6 class="mb-5">
      Rice, tapas and stew workshops.
    </h6>
    <h6 class="mb-5">
      For approximately 3 hours we will cook hand by hand the dishes of your choice from your own home. Invite
      your family or friends to learn together.
    </h6>
    <h6 class="mb-5">
      We take care of cleaning the utensils used.
    </h6>
    <div class="mb-5">
      <p class="">
        Length: 3h
      </p>
      <p class="">
        Capacity: 15 people
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
            <img src="../img/pulpo-2.PNG" class="img-fluid carta-tapas mx-0 img-border-20" alt="Octopus">
            <p class="text-left mt-3 mx-3">Tapas</h3>
            <p class="lead text-justify mb-2 mx-3">If you are a tapas gourmet, this workshop is for you!
            </p>
            <a class="lead text-right text-warning card-link" href="tapas.php">See more...</a>
          </div>
        </div>
        <div class="col-lg-0 col-sm-0">
        </div>
        <div class="mx-auto carta mb-5">
          <div class="features-icons-item mx-auto">
            <img class="img-fluid mx-0 carta-tapas img-border-20" src="../img\garbanzosconbacalao2.PNG" alt="Chickpeas with cod">
            <p class="text-left mt-3 mx-3">Stews</h3>
            <p class="lead text-justify mb-2 mx-3">Discover traditional Catalan cuisine with these three famous dishes.
            </p>
            <a class="lead text-right text-warning card-link" href="guisos.php">See more...</a>
          </div>
        </div>
        <div class="col-lg-0 col-sm-0">
        </div>
        <div class="mx-auto carta mb-5">
          <div class="features-icons-item mx-auto">
            <img src="../img/IMG_20201216_200424_956.jpg" class="img-fluid mx-0 carta-tapas img-border-20" alt="Paella">
            <p class="text-left mt-3 mx-3">Paellas</h3>
            <p class="lead text-justify mb-2 mx-3">Learn to cook rice with different types of grain.
            </p>
            <a class="lead text-right text-warning card-link" href="paella.php">See more...</a>
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
          <h2 class="mb-2 text-left mx-5">Get in touch!</h2>
          <p class="mb-4 text-left mx-5">Send me an email or WhatsApp indicating which workshop of ours you are interested in and in the shortest time we will get in touch.</p>
          <div class="col mx-auto text-left">
            <form method="POST">
              <label class="email-label" for="name">Name: <br>
                <input class="email-input" placeholder="Name" type="text" name="name" id="name" required>
              </label><br>
              <label class="email-label" for="email">Email address: <br>
                <input class="email-input" placeholder="Email" type="email" name="email" id="email" required>
              </label><br>
              <label class="email-label" for="subject">Subject: <br>
                <input class="email-input" placeholder="Subject" name="subject" id="subject" rows="8" cols="20" required>
              </label><br>
              <label class="email-label" for="message">Message: <br>
                <textarea class="email-input email-message" placeholder="Message" name="message" id="message" rows="8" cols="20" required></textarea>
              </label><br>
              <input class="email-submit" type="submit" name="submit" value="Send">
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
                <a href="#">About Us</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Términos de uso</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; BCN Cooking Experience 2020. All Rights Reserved.</p>
            <p class="text-muted small mb-4 mb-lg-0">Designed by <a target="_blank" href="https://ssc.cat/">Salvador
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