<?php
	// Message Vars
$msg = '';
$msgClass = '';

	// Check For Submit
if (filter_has_var(INPUT_POST, 'submit')) {
		// Get Form Data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $telepon = htmlspecialchars($_POST['telepon']);

		// Check Required Fields
    if (!empty($email) && !empty($name) && !empty($message) && !empty($telepon)) {
			// Passed
			// Check Email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				// Failed
            $msg = 'Please use a valid email';
            $msgClass = 'alert-danger';
        } else {
				// Passed
            $toEmail = 'contact.satujiwa@gmail.com';
            $subject = 'Contact Request From ' . $name;
            $body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>' . $name . '</p>
                    <h4>Email</h4><p>' . $email . '</p>
                    <h4>Telephone</h4><p>' . $telepon . '</p>
					<h4>Message</h4><p>' . $message . '</p>
				';

				// Email Headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
            $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

            if (mail($toEmail, $subject, $body, $headers)) {
					// Email Sent
                $msg = 'Your email has been sent';
                $msgClass = 'alert-success';
            } else {
					// Failed
                $msg = 'Your email was not sent';
                $msgClass = 'alert-danger';
            }
        }
    } else {
			// Failed
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="description" content="Julian Anderson is a front end web developer based in Bandung, Indonesia. I create amazing and effective website for small businesses. Let's Work Together">
    <meta name="keywords" content="website, design, buat website, website design, build website, making website">
    <meta name="author" content="Julian Anderson">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="vendors/css/fontawesome-all.min.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Julian Anderson - Front End Web Developer</title>
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css/style.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:100,200,300,400,500,600,700,900" rel="stylesheet">

</head>

<body>
    <section class="section-1">
        <div class="container-nav">
            <div class="logo">
                <a href=" /index ">
                    <img src="resources/img/logo-julian-anderson.png " alt="Logo Julian Anderson ">
                </a>
            </div>
            <div class="nav-menu ">
            <ul>
                    <li>
                        <a href="http://juliananderson.xyz" class="menu-text ">HOME</a>
                    </li>
                    <li>
                        <a href="/blog" class="menu-text ">BLOG</a>
                    </li>
                    <li>
                        <a href="/about" class="menu-text ">ABOUT</a>
                    </li>
                    <li>
                        <a href="/resume" class="menu-text ">RESUME</a>
                    </li>
                    <li>
                        <a href="/contactme.php" class="menu-text ">CONTACT ME</a>
                    </li>

                </ul>
            </div>
        </div>
        

    </section>

    <section class="section-about">
    <div class="discover">
            <h2>Hit me up through my email.</h2>
        </div>
        <div class="letscreate ">
            <h1>LET'S TALK</h1>
        </div>
    </section>

<section class="kontak">
<h1 class="hubungi-kami">HIT ME UP</h1>
    <div class="container-2">	
    	<?php if ($msg != '') : ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label class="nama">Full Name</label>
          </div>
          <div class="input-bar">
          <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
          </div>
	      <div class="form-group">
	      	<label class="email">Email</label>	
          </div>
          <div class="input-bar">
          <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">          </div>
	      <div class="form-group">
	      	<label class="message">Message</label>
	      	
          </div>
          <div class="input-bar">
          <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
          </div>
	      <br>
	      <input type="submit" name="SUBMIT" class="btn btn-primary"></input>
      </form>
    </div>
</section>

</body>

<footer id="footer">
    <div class="build-footer ">
        <h1>Let's build an amazing website together.</h1>
    </div>
    <div class="build-footer2 ">
        <h2>I AM HERE TO HELP.</h2>
    </div>
    <div class="nav-menu2 ">
    <ul>
                    <li>
                        <a href="http://juliananderson.xyz" class="menu-text ">HOME</a>
                    </li>
                    <li>
                        <a href="/blog" class="menu-text ">BLOG</a>
                    </li>
                    <li>
                        <a href="/about" class="menu-text ">ABOUT</a>
                    </li>
                    <li>
                        <a href="/resume" class="menu-text ">RESUME</a>
                    </li>
                    <li>
                        <a href="/contactme.php" class="menu-text ">CONTACT ME</a>
                    </li>

                </ul>
    </div>
    <div class="copyright">
        <h3>&copy; 2018 Julian Anderson. All rights reserved.</h3>
    </div>
    <div class="social-media">
        <ul>
            <li>
                <i class="fab fa-instagram"></i>
            </li>
            <li>
                <i class="far fa-envelope"></i>
            </li>
            <li>
                <i class="fab fa-linkedin"></i>
            </li>
            <li>
                <i class="fab fa-facebook-square"></i>
            </li>
        </ul>
    </div>

</footer>

</html>