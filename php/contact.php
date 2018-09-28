<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_POST['Nombre']) && isset($_POST['correo']) && isset($_POST['Asunto']) && isset($_POST['Mensaje']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
 
  // detect & prevent header injections
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_POST as $key => $val ) {
    if ( preg_match( $test, $val ) ) {
      exit;
    }
  }

$headers = 'From: ' . $_POST["Nombre"] . '<' . $_POST["correo"] . '>' . "\r\n" .
    'Reply-To: ' . $_POST["andresfhb22@gmail.com"] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  //
  mail( "andresfhb22@gmail.com", $_POST['Asunto'], $_POST['Mensaje'], $headers );
 
  //      ^
  //  Replace with your email 
}
?>