<?php

/* Template Name: Contact */

get_header();
?>

<?php
// Form Process
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if (trim($_POST['subject']) === '') {
        $subjectError = 'Please enter subject.';
        $hasError = true;
    } else {
        $subject = trim($_POST['subject']);
    }

    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
            //print_r($emailTo);
        }
        $subject = '[WatanSerb] From ' . $name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
        if ($emailSent) {
            $mailSuccessMsg = "<p class='text-success'>Email sent successfully!</p>";
        } else {
            $mailErrorMsg = "<p class='text-success'>Something wrong! Email not sent!</p>";
        }

        $_POST = array(); // reset form data after submit

    }
} ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <h2>About Us</h2>
                <p>Watan Newspaper is the largest Arab American Newspaper. Stablished 1991 in Washington DC.<br />
                    Watan Newspaper Published by Watan News LLC registered in State of California<br />
                    Editor-in-Chive: Nezam Mahdawi</p>

                <div class="row">
                    <div class="col-md-6">
                        <h2>Contact Info</h2>
                        <p><strong>Phone:</strong> <a href="phone:1.202.730.5901">1.202.730.5901</a></p>
                        <p><strong>Email:</strong> <a href="mailto:mailto@watan.com">editor@watan.com</a></p>
                        <p><strong>Web:</strong> <a href="https://watanserb.com">watanserb.com</a></p>
                    </div>
                    <div class="col-md-6">
                        <h2>Address</h2>
                        <p>10231 Brookhurst ST<br />Anaheim, CA 92804</p>
                    </div>
                </div>

                <h2>Send a message</h2>
                <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="contactName">Name</label>
                            <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName'])) echo $_POST['contactName']; ?>" class="required requiredField form-control" placeholder="Your name" />
                            <?php if ($nameError != '') { ?>
                                <span class="text-danger"><?= $nameError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" class="required requiredField email form-control" placeholder="Your email" />
                            <?php if ($emailError != '') { ?>
                                <span class="text-danger"><?= $emailError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" value="<?php if (isset($_POST['subject']))  echo $_POST['subject']; ?>" class="required requiredField subject form-control" placeholder="Subject" />
                            <?php if ($subjectError != '') { ?>
                                <span class="text-danger"><?= $subjectError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="commentsText">Message</label>
                            <textarea name="comments" id="commentsText" rows="5" cols="30" class="required requiredField form-control"><?php if (isset($_POST['comments'])) {
                                                                                                                                            if (function_exists('stripslashes')) {
                                                                                                                                                echo stripslashes($_POST['comments']);
                                                                                                                                            } else {
                                                                                                                                                echo $_POST['comments'];
                                                                                                                                            }
                                                                                                                                        } ?></textarea>
                            <?php if ($commentError != '') { ?>
                                <span class="text-danger"><?= $commentError; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <input type="submit" value="Send">
                        </div>
                    </div>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                </form>
                <?php
                if ($mailSuccessMsg) {
                    echo $mailSuccessMsg;
                } else {
                    echo $mailErrorMsg;
                }

                ?>
            </div>

            <div class="col-md-4">
                <h2>Stay with us</h2>
                <div class="row">
                    <div class="col-md-3 social-icons">
                        <a href="https://www.facebook.com/watanusa">
                            <img src="/wp-content/uploads/2021/08/facebook.png" alt="Facebook">
                            <h4 class="aligncenter">Facebook</h4>
                        </a>
                    </div>
                    <div class="col-md-3 social-icons">
                        <a href="https://twitter.com/watan_usa">
                            <img src="/wp-content/uploads/2021/08/twitter.png" alt="Twitter">
                            <h4 class="aligncenter">Twitter</h4>
                        </a>
                    </div>
                    <div class="col-md-3 social-icons">
                        <a href="https://youtube.com/channel/UCuioSm-SG28IHcy8muZn2wg">
                            <img src="/wp-content/uploads/2021/08/youtube.png" alt="Youtube">
                            <h4 class="aligncenter">Youtube</h4>
                        </a>
                    </div>
                    <div class="col-md-3 social-icons">
                        <a href="https://t.me/watanserb">
                            <img src="/wp-content/uploads/2021/08/telegram.png" alt="Telegram">
                            <h4 class="aligncenter">Telegram</h4>
                        </a>
                    </div>
                    <div class="col-md-3 social-icons">
                        <a href="https://itunes.apple.com/us/app/وطن-يغرد-خارج-السرب/id1242712408?mt=8">
                            <img src="/wp-content/uploads/2021/08/apple.png" alt="Apple">
                            <h4 class="aligncenter">Apple</h4>
                        </a>
                    </div>
                    <div class="col-md-3 social-icons">
                        <a href="https://play.google.com/store/apps/details?id=com.goodbarber.watan&amp;hl=en_US">
                            <img src="/wp-content/uploads/2021/08/android.png" alt="Android">
                            <h4 class="aligncenter">Android</h4>
                        </a>
                    </div>
                    <div class="col-md-3 social-icons">
                        <a href="https://instagram.com/watanserb">
                            <img src="/wp-content/uploads/2021/08/instagram.png" alt="Instagram">
                            <h4 class="aligncenter">Instagram</h4>
                        </a>
                    </div>
                    <div class="col-md-3 social-icons">
                        <a href="https://www.linkedin.com/company/watanserb">
                            <img src="/wp-content/uploads/2021/08/linkedin.png" alt="LinkedIn">
                            <h4 class="aligncenter">LinkedIn</h4>
                        </a>
                    </div>
                </div>

                <h2>On The Map</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3314.91591707119!2d-117.96159724970597!3d33.81448288057653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd29b219435991%3A0x34a14bd12c6f0185!2s10231%20Brookhurst%20St%2C%20Anaheim%2C%20CA%2092804!5e0!3m2!1sen!2sus!4v1620618401924!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</main>
    <?php


    get_footer();
