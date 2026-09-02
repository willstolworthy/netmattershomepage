<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Full Service Digital Agency | Cambridgeshire & Norfolk | Netmatters</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="js/slick/slick.css">
    <link rel="stylesheet" href="js/slick/slick-theme.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require('partials/header.php'); ?>
    <div class="location-bar">
        <div class="container">
            <div class="location-bar-content">
                <a href="index.php">Home</a>
                <p>/ Our Offices</p>
            </div>
        </div>
    </div>
    <div class="offices">
        <div class="section-gap"></div>
        <div class="container">
            <div class="offices-title">
                <h1>Our Offices</h1>
            </div>
            <div class="office">
                <div class="row">
                    <div class="office-card">
                        <div class="office-img">
                            <a href="#">
                                <img src="img/cambridge.jpg" alt="Netmatters Cambridge office">
                            </a>
                        </div>
                        <div class="office-text">
                            <h2>
                                <a href="#">Cambridge Office</a>
                            </h2>
                            <p>Unit 1.31,<br>
                                St John's Innovation Centre,<br>
                                Cowley Road, Milton,<br>
                                Cambridge,<br>
                                CB4 0WS</p>
                            <div class="phone">
                                <a href="tel:01223375772" class="office-phone-number">01223 37 57 72</a>
                            </div>
                            <a class="btn btn-purple" href="#">View More</a>
                        </div>
                    </div>
                    <div class="office-card">
                        <div class="office-img">
                            <a href="#">
                                <img src="img/wymondham.jpg" alt="Netmatters Wymondham office">
                            </a>
                        </div>
                        <div class="office-text">
                            <h2>
                                <a href="#">Wymondham Office</a>
                            </h2>
                            <p>Unit 15,<br>
                                Penfold Drive,<br>
                                Gateway 11 Business Park,<br>
                                Wymondham, Norfolk,<br>
                                NR18 0WZ</p>
                            <div class="phone">
                                <a href="tel:01603704020" class="office-phone-number">01603 70 40 20</a>
                            </div>
                            <a class="btn btn-purple" href="#">View More</a>
                        </div>
                    </div>
                    <div class="office-card">
                        <div class="office-img">
                            <a href="#">
                                <img src="img/yarmouth.jpg" alt="Netmatters Great Yarmouth office">
                            </a>
                        </div>
                        <div class="office-text">
                            <h2>
                                <a href="#">Great Yarmouth Office</a>
                            </h2>
                            <p>Suite F23,<br>
                                Beacon Innovation Centre,<br>
                                Beacon Park, Gorleston,<br>
                                Great Yarmouth, Norfolk,<br>
                                NR31 7RA</p>
                            <div class="phone">
                                <a href="tel:01493603204" class="office-phone-number">01493 60 32 04</a>
                            </div>
                            <a class="btn btn-purple" href="#">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="contact-form">
                    <?php if ($sent): ?>
                        <p class="form-success">Thanks for getting in touch. We'll be in contact shortly.</p>
                    <?php endif; ?>
                    <form action="/contact-us" method="post" novalidate>
                        <div class="form-row">
                            <div class="form-field">
                                <label for="name">Your Name <span class="required">*</span></label>
                                <input type="text" id="name" name="name" value="<?= e($old['name']) ?>" class="<?= isset($errors['name']) ? 'form-field-invalid' : '' ?>" required>
                                <?php if (isset($errors['name'])): ?>
                                    <span class="form-error"><?= e($errors['name']) ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-field">
                                <label for="company">Company Name</label>
                                <input type="text" id="company" name="company" value="<?= e($old['company']) ?>" class="<?= isset($errors['company']) ? 'form-field-invalid' : '' ?>">
                                <?php if (isset($errors['company'])): ?>
                                    <span class="form-error"><?= e($errors['company']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-field">
                                <label for="email">Your Email <span class="required">*</span></label>
                                <input type="email" id="email" name="email" value="<?= e($old['email']) ?>" class="<?= isset($errors['email']) ? 'form-field-invalid' : '' ?>" required>
                                <?php if (isset($errors['email'])): ?>
                                    <span class="form-error"><?= e($errors['email']) ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-field">
                                <label for="telephone">Your Telephone Number <span class="required">*</span></label>
                                <input type="tel" id="telephone" name="telephone" value="<?= e($old['telephone']) ?>" class="<?= isset($errors['telephone']) ? 'form-field-invalid' : '' ?>" required>
                                <?php if (isset($errors['telephone'])): ?>
                                    <span class="form-error"><?= e($errors['telephone']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-field">
                                <label for="message">Message <span class="required">*</span></label>
                                <textarea id="message" name="message" class="<?= isset($errors['message']) ? 'form-field-invalid' : '' ?>" required><?= e($old['message']) ?></textarea>
                                <?php if (isset($errors['message'])): ?>
                                    <span class="form-error"><?= e($errors['message']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-consent">
                            <input type="checkbox" id="marketing" name="marketing" <?= $old['marketing'] ? 'checked' : '' ?>>
                            <label for="marketing">Please tick this box if you wish to receive marketing information from us.
                                Please see our <a href="#">Privacy Policy</a> for more information on how we keep your data
                                safe.</label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn submit-btn">Send Enquiry</button>
                            <p class="fields-required"><span class="required">*</span> Fields Required</p>
                        </div>
                    </form>
                </div>
                <div class="contact-details">
                    <p>Email us on:</p>
                    <a class="contact-details-link" href="mailto:sales@netmatters.com">sales@netmatters.com</a>
                    <p>Speak to Sales on:</p>
                    <a class="contact-details-link" href="tel:01603515007">01603 515007</a>
                    <p>Business hours:</p>
                    <p>Monday - Friday 07:00 - 18:00</p>
                    <a class="out-of-hours" href="#" aria-expanded="false" aria-controls="out-of-hours-panel">Out of Hours IT Support
                        <span class="icon-chevron-down"></span>
                    </a>
                    <div class="out-of-hours-panel" id="out-of-hours-panel">
                        <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>
                        <p class="out-of-hours-times">Monday - Friday 18:00 - 22:00 Saturday 08:00 - 16:00<br>
                            Sunday 10:00 - 18:00</p>
                        <p>To log a critical task, you will need to call our main line number and select Option 2 to
                            leave an Out of Hours voicemail. A technician will contact you on the number provided
                            within 45 minutes of your call.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    require('partials/cookies.php');
    require('partials/footer.php');
    require('partials/sidebar.php') ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/slick/slick.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>