<?php
if (isset($_POST['email'])) {

  // EDIT THE 2 LINES BELOW AS REQUIRED
  $email_to = "info@dft.com.sa";
  $email_subject = "Finekube IT Solutions";

  function died($error)
  {
    // your error code can go here
    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error . "<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
    die();
  }


  // validation expected data exists
  if (
    !isset($_POST['first_name']) ||
    //  !isset($_POST['last_name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['telephone']) ||
    !isset($_POST['jobtitle']) ||
    !isset($_POST['comments'])
  ) {
    died('We are sorry, but there appears to be a problem with the form you submitted.');
  }



  $first_name = $_POST['first_name']; // required
  // $last_name = $_POST['last_name']; // required
  $email_from = $_POST['email']; // required
  $telephone = $_POST['telephone']; // not required
  $jobtitle = $_POST['jobtitle']; // not required
  $comments = $_POST['comments']; // required

  $error_message = "";
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if (!preg_match($email_exp, $email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

  $string_exp = "/^[A-Za-z0-9 .'-]+$/";

  if (!preg_match($string_exp, $first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }



  if (strlen($comments) < 0) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if (strlen($error_message) > 0) {
    died($error_message);
  }

  $email_message = "Form Details Below.\n\n";


  function clean_string($string)
  {
    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
    return str_replace($bad, "", $string);
  }



  $email_message .= "First Name: " . clean_string($first_name) . "\n";
  //$email_message .= "Last Name: ".clean_string($last_name)."\n";
  $email_message .= "Email: " . clean_string($email_from) . "\n";
  $email_message .= "Telephone: " . clean_string($telephone) . "\n";
  $email_message .= "Job Title: " . clean_string($jobtitle) . "\n";
  $email_message .= "Comments: " . clean_string($comments) . "\n";

  // create email headers
  $headers = 'From: ' . $email_from . "\r\n" .
    'Reply-To: ' . $email_from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <!-- Meta Pixel Code -->
    <script>
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '485379993662920');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=485379993662920&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Finekube IT Solutions</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    
    <style>
      .thankyou-content {
        width: 100%;
        height: 100vh;
        display: grid;
        justify-content: center;
        align-content: center;
        text-align: center;
        background-color: #040707;
        color: #fff;
      }

      .thankyou-content i {
        font-size: 60px;
        color: #35e200;
      }

      .thankyou-content h2 {
        font-size: 45px;
        color:#fff
      }

      .thankyou-content h3 {
        font-size: 30px;
        color:#fff;
      }
    </style>
  </head>

  <body>

    <div class="thankyou-content">
      <i class="fa-solid fa-face-smile mb-4"></i>
      <h2 class="mb-4"><b>Thank You!</b></h2>
      <h3 class="mb-4">We will be in touch with you very soon.</h3>
      <div class="w-100 float-start mt-4">
        <a href="index.php" class="text-white inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 enquire-now text-decoration-none">
          Back to Home
        </a>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/theme.js"></script>
  </body>

  </html>


<?php

}
?>