<?php
  //check if user is coming from a request
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Assign variables
    $fuser = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    $luser = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);


    //Creating array of errors
    $formErrors = array();
    if(strlen($phone) > 11){
      $formErrors[] = 'Phone number can not be more than 11 numbers';
    }

    //If no errors send the email [ mail(to, subject, Message, headers, parameters)]
    $headers = 'From: ' . $mail . "\r\n";
    $myEmail = 'ahmedov.samyvic@gmail.com';
    $subject = 'Contact Form';
    if (empty ($formErrors)){
      mail($myEmail, $subject , $msg, $headers,$fname,$lname,$phone);
      $fuser ='';
      $luser ='';
      $mail ='';
      $phone ='';
      $msg ='';
      $success =" <div class=''>We Have Recieved Your Message!</div>";


    }

  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>
  <body>
    <!-- Start Navbar -->
    <div class="nav">
      <div class="container">
        <span><a href="index.html">Home</a></span>
        <span><a href="about.html" >About</a></span>
        <span><a href="work.html">Work</a></span>
        <span class="active"><a href="contact.html">Contact</a></span>
      </div>
    </div>
    <!-- End Navbar -->

    <!-- Start Cover -->
    <div class="cover">
      <div class="container">
        <div class="img-overlay">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.39338752566!2d31.24679776408559!3d30.111554869440774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458401df0ea7edb%3A0x714cd8101cfc4604!2sKoleyet%20Al%20Zeraa%2C%20Shubra%20Al%20Kheimah%2C%20Awal%20Shubra%20Al%20Kheimah%2C%20Al%20Qalyubia%20Governorate!5e0!3m2!1sen!2seg!4v1619540595337!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
    <!-- End Cover -->

    <!-- Start section1 -->
    <div class="sec1">
      <div class="container">
        <h1>Contact Us</h1>
        <p>We love to hear from both new clients and people we already work with!</p>
      </div>
    </div>
    <!-- End section1 -->

    <!-- Start section2 -->
    <div class="sec2 sec">
      <div class="container">
        <div class="box-6 content office">
          <h2>Our Office</h2>
          <p>Center Elsafwa - Koliet Elzeraa,<br>Shoubra Elkheima,<br>Cairo, Egypt.</p>
          <h2>Call Us</h2>
          <p>Phone: <span>(+20) 100 941 4874</span> <br> Phone: <span>(+20) 101 538 3330</span></p>
          <h2>Email</h2>
          <p>Email: <span>starcooling30@gmail.com</span></p>
        </div>
        <div class="box-6 content">
          <div class="message">
          <h2> Drop Us A Message</h2>
          <div class="errors">
            <?php
              if (isset($formErrors)){
                foreach ($formErrors as $error) {
                  echo $error . '<br>';
                }
              }
            ?>
            <?php if (isset($success)) {echo $success;} ?>


          </div>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mess-name">
              <div class="lhs">

                <input type="text" name="fname" placeholder="First Name*" value="First Name" onfocus="if(this.value==this.defaultValue)this.value=''"
                onblur="if(this.value=='')this.value=this.defaultValue">
              </div>
              <div class="rhs">

                <input type="text" name="lname" value="Last Name" onfocus="if(this.value==this.defaultValue)this.value=''"
                onblur="if(this.value=='')this.value=this.defaultValue">
              </div>
            </div>


            <input type="email" name="email" value="Email Address" onfocus="if(this.value==this.defaultValue)this.value=''"
            onblur="if(this.value=='')this.value=this.defaultValue">

            <input type="text" name="phone" value="Contact Telephone" onfocus="if(this.value==this.defaultValue)this.value=''"
            onblur="if(this.value=='')this.value=this.defaultValue">

              <div class="message-box-area">
                <textarea id="usermsg" name="message" rows="8" cols="70" onfocus="if(this.value == 'Write your message here') this.value='';" onblur="if(this.value == '') this.value='Write your message here';" >Write your message here</textarea>
              </div>

            <input class="button" type="submit" value="SEND" name="SEND">
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End section2 -->

    <!-- Start Footer -->
    <div class="footer">
      <div class="container">
        <h1>Get In Touch</h1>
        <h4>Follow us on our social media accounts and contact us on whatsapp!</h4>
        <a href="https://www.facebook.com/Star-CoolinG-1148831051938206/" target="_blank" class="face"><i class="fab fa-facebook-f"></i></a>
        <a href="https://api.whatsapp.com/send?phone=201009414874&text=&source=&data=&app_absent=" target="_blank" class="whats"><i class="fab fa-whatsapp"></i></a>
        <a href="https://youtube.com/" target="_blank" class="utube"><i class="fab fa-youtube"></i></a>
        <hr>
        <p>Copyrights &copy; 2021</p>
      </div>
    </div>
    <!-- End Footer -->

  </body>
</html>
