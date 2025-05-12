<?php
session_start();

if (isset($_POST['submit'])) {
    $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

    if (!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $message = "Bonjour, vous avez reçu un nouvel abonnement à la newsletter :\n\nAdresse mail de l'abonné : $mail";
        $headers = "From: noreply@kwiyiah.com\r\n";
        mail("Kwiyiah@gmail.com", "✅ NOUVEL ABONNEMENT À LA NEWSLETTER", $message, $headers);

        $_SESSION['newsletter_success'] = true;
    }
    header('Location: index.html');
    exit();
}
?>



<?php
session_start();
$newsletter_success = false;

if (isset($_SESSION['newsletter_success']) && $_SESSION['newsletter_success']) {
    $newsletter_success = true;
    unset($_SESSION['newsletter_success']); // Nettoyage après affichage
}
?>