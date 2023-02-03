<?php
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
    session_start();
    include '../groups-6dcc69.php';
    function checkAccess($groups) {
        if(isset($_SESSION['user_groups'])) {
            return count(array_intersect($groups, $_SESSION['user_groups'])) > 0;
        }
        return FALSE;
    }
    if(isset($_SESSION['user_logged']) && 8 > 0) {
        $now = new DateTime();
        $fmt = "Y-m-d\TH:i:sP"; // ATOM
        $end = DateTime::createFromFormat($fmt, $_SESSION['user_logged']->format($fmt));
        $end->add(new DateInterval("PT8H"));
        $diff = $now->diff($end);
        if($diff->invert) {
            unset($_SESSION['session_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_surname']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_info']);
            unset($_SESSION['user_groups']);
            unset($_SESSION['user_logged']);
            unset($_SESSION['user_redirect']);
            unset($_SESSION['user_redirect_attempt']);
            $redirect = 'espace-admin.php';
            if(strlen($redirect) > 0) {
                $_SESSION['user_redirect'] = $redirect;
            }
            header('Location: ../connexion-utilisateur.html');
            exit;
        }
    }
    $acg = array('0');
    if(!isset($_SESSION['session_id']) || $_SESSION['session_id'] !== '57F84E95-373D-451D-947E-9A6E0EAE0C00' || !isset($_SESSION['user_id']) || !isset($_SESSION['user_logged']) || $acg === NULL || !checkAccess($acg)) {
        $redirect = 'espace-admin.php';
        if(strlen($redirect) > 0) {
            $_SESSION['user_redirect'] = $redirect;
        }
        header('Location: ../connexion-utilisateur.html');
        exit;
    }
    unset($_SESSION['user_redirect']);
    unset($_SESSION['user_redirect_attempt']);

    header('Content-Type: text/css');
    header('Content-Length: 261');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('Ym9keXstLWY6MTstLXN3OjBweDttaW4td2lkdGg6MTkyMHB4fUBtZWRpYSAobWF4LXdpZHRoOjE5MTlweCl7Ym9keXttaW4td2lkdGg6OTYwcHh9fUBmb250LWZhY2V7Zm9udC1kaXNwbGF5OmJsb2NrO2ZvbnQtZmFtaWx5OiJBYnJpbCBGYXRmYWNlIjtzcmM6dXJsKCdBYnJpbEZhdGZhY2UtUmVndWxhci53b2ZmMicpIGZvcm1hdCgnd29mZjInKSx1cmwoJ0FicmlsRmF0ZmFjZS1SZWd1bGFyLndvZmYnKSBmb3JtYXQoJ3dvZmYnKTtmb250LXdlaWdodDo0MDB9');
