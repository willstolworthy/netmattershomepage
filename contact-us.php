<?php

require __DIR__ . "/database.php";

// escapes anything typed by a visitor before it goes back into the page
function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$fields = ['name', 'company', 'email', 'telephone', 'message'];

$errors = [];
$old = array_fill_keys($fields, '');
$old['marketing'] = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // keep what was typed so the form can be filled back in if anything fails
    foreach ($fields as $field) {
        $old[$field] = trim($_POST[$field] ?? '');
    }

    // an unticked checkbox is not posted at all, so presence is the test, not the value
    $old['marketing'] = isset($_POST['marketing']);

    // the lengths match the columns, mysql rejects anything longer rather than trimming it

    if ($old['name'] === '') {
        $errors['name'] = 'Please enter your name.';
    } elseif (mb_strlen($old['name']) > 100) {
        $errors['name'] = 'Your name must be 100 characters or fewer.';
    }

    if (mb_strlen($old['company']) > 150) {
        $errors['company'] = 'Company name must be 150 characters or fewer.';
    }

    if ($old['email'] === '') {
        $errors['email'] = 'Please enter your email address.';
    } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    } elseif (mb_strlen($old['email']) > 254) {
        $errors['email'] = 'Your email address must be 254 characters or fewer.';
    }

    // same rule as the js, the formatting characters come out before the digits are checked
    if ($old['telephone'] === '') {
        $errors['telephone'] = 'Please enter your telephone number.';
    } elseif (!preg_match('/^(?:\+44|0)\d{9,10}$/', preg_replace('/[\s().-]/', '', $old['telephone']))) {
        $errors['telephone'] = 'Please enter a valid UK telephone number.';
    } elseif (mb_strlen($old['telephone']) > 30) {
        $errors['telephone'] = 'Your telephone number must be 30 characters or fewer.';
    }

    if ($old['message'] === '') {
        $errors['message'] = 'Please enter a message.';
    }

    if (!$errors) {
        $sql = "INSERT INTO contact_submissions (name, company, email, telephone, message, marketing_opt_in)
                VALUES (:name, :company, :email, :telephone, :message, :marketing)";

        $pdo->prepare($sql)->execute([
            'name' => $old['name'],
            'company' => $old['company'] !== '' ? $old['company'] : null,
            'email' => $old['email'],
            'telephone' => $old['telephone'],
            'message' => $old['message'],
            'marketing' => $old['marketing'] ? 1 : 0,
        ]);

        // redirect so refreshing the page can't send the same enquiry twice
        header('Location: /');
        exit;
    }
}

require __DIR__ . "/views/contact-us.view.php";
