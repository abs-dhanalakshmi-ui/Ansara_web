<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ansara - SaaS Business Solutions | Business Consulting | Web App Development</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

  <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style1.css" rel="stylesheet">
  <style>
    .form-group .checkbox label, .form-group .radio label, .form-group label {
      font-size: 16px;
      line-height: 1.42857143;
      color: #0e0e0e;
      font-weight: 400;
  }
  .form-control, .form-group .form-control {
   
    background-image: linear-gradient(#009688, #009688), linear-gradient(#545252, #D2D2D2);
    }
  .form-control {
    color:#000 !important;
  }
  .ph option {
    background: #fff!important;
  }
  .phone{
    color: #000 !important;
    background: url(assets/img/down-chevron.svg) no-repeat right #252525!important;
    border-bottom: 1px solid #fff!important;
    border-bottom: 1px solid #939292 !important;
      background-color: #ddd !important;
      width: 8% !important;
      
  }
  .phone_line {
    width: 89% !important;
    position: relative;
    left: 75px;
    top: -45px;
}
.upload_resume{
    color: #000;
    font-size: 16px;
    font-weight: 500;
    font-family: Montserrat;
}
.bg{
    background-color: #ddd;
    padding: 10%;
    border-radius: 3%;
}

  
   </style>
 
</head>

<body>

<?php 
if(!empty($_POST['send'])){

    $to = 'careers@ansara.co'; 
    $from = $_POST['email']; 
    $fromName = $_POST['full_name']; 
    $subject = 'Jobs with Attachment by '.$_POST['full_name'];  

    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['filename']['name']);
    move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
    $file_name=$_FILES['filename']['name'];
    $fileAtt = "uploads/".$file_name; 
    // Email body content 
    $htmlContent = ' 
        <p>Name:'.$_POST['full_name'].'</p>
        <p>Email ID:'.$_POST['email'].'</p>
        <p>Phone:'.$_POST['country']." ".$_POST['phone'].'</p>
        <p>Mesaage:</p>
        <p>'.$_POST['intro'].'</p>'; 
     
    // Header for sender info 
    $headers = "From: $fromName"." <".$from.">"; 
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
    if(!empty($file) > 0){ 
        if(is_file($file)){ 
            $message .= "--{$mime_boundary}\n"; 
            $fp =    @fopen($file,"rb"); 
            $data =  @fread($fp,filesize($file)); 
            @fclose($fp); 
            $data = chunk_split(base64_encode($data)); 
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
            "Content-Description: ".basename($file)."\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
        } 
    } 
    $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $from; 
    $mail = @mail($to, $subject, $message, $headers, $returnpath);  
    if($mail){
        $msg="Applied Successfully !!! ";
        unlink($fileAtt);
    }
    else{
        $msg="Email sending failed !!!"; 
        unlink($fileAtt);
    }
}
?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">
      	<img src="assets/img/logo1.png" alt="logo"/>
      </a></h1>
      

      <nav class="nav-menu d-none d-lg-block ">
        <ul>
        <li class="drop-down"><a href="">Company</a>
           <ul>
              <li class="border_line">
                <img src="assets/img/Droup_down_icons/about.png" alt="logo" class="rounded mx-auto d-block drop_img"/>
                <a href="about.html">About</a></li>



                <li>
                <img src="assets/img/Droup_down_icons/careers.png" alt="logo"  class=" rounded mx-auto d-block drop_img" />
                <a href="career.html">Careers</a></li>
             
              <!-- <li>
                <img src="assets/img/Droup_down_icons/partner.png" alt="logo"  class="rounded mx-auto d-block drop_img" style="width:45px;"/>
                <a href="#">Partners</a>
              </li> -->

             </ul>
      </li>
      <li class="drop-down"><a href="">Services</a>
           <ul>
              <li class="border_line">
                <img src="assets/img/Droup_down_icons/sap.png" alt="logo"   class="rounded mx-auto d-block drop_img"/>
                <a href="sap.html">SAP</a>
              </li>
              <li class="border_line">
               <img src="assets/img/Droup_down_icons/iot2.png" alt="logo"  class="rounded mx-auto d-block drop_img"/>
                <a href="iot.html">IoT</a>
              </li>
              <li class="border_line">
               <img src="assets/img/Droup_down_icons/webdev.png" alt="logo"  class="rounded mx-auto d-block drop_img"/>
                <a href="web_dev.html">Web <br> Development</a>
              </li>
              <li>
                <img src="assets/img/Droup_down_icons/mobiledev.png" alt="logo" class="rounded mx-auto d-block drop_img"/>
                <a href="web_dev.html">Mobile <br> Development</a>
              </li>

             </ul>
      </li>
      <li class="drop-down"><a href="">Solution</a>
        <ul>
           <li>
             <img src="assets/img/Droup_down_icons/h-logo.png" alt="logo" class="rounded mx-auto d-block drop_img" style="width: 70px;"/>
             <a href="solution.html">Hybrid <br> Ordering  system</a></li>

          </ul>
   </li>
     
          <li><a href="#">Blog</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          
         
      </nav><!-- .nav-menu -->

      <a href="index.html#enquiry" class="get-started-btn scrollto">Quick Enquiry</a>

    </div>
  </header><!-- End Header -->

  

  <main id="main">

  

    <!-- =======  Client-Section ======= -->
    <section id="abt_top">

      <div class="container">

        <form name="form1" id="form1" action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="bg">
                  <?php
                  if(!empty($msg)){
                      if($msg=='not_sent'){
                  ?>
                          <h6 style="color:#1aa960 !important;"><center><?php echo $msg; ?></center></h6>
                  <?php
                      }
                      else{
                      ?>
                          <h6 style="color:#d0040c !important;"><center><?php echo $msg; ?></center></h6>
                      <?php  
                      }
                  }
                  ?>
                  <div class="abt_section">
                    <h2>Apply Now</h2>
                  </div>
                  <div class="form-group label-floating">
                           <label class="control-label" for="name">Name</label>
                           <input class="form-control"  type="text" name="full_name" id="full_name" required >
                           
                         </div>
                         <div class="form-group label-floating">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email" required>
                            
                          </div>
    
                           <div class="form-group label-floating">
                            <label class="control-label" for="email">Phone</label>
                            
                            <select class="form-control phone" name="country" id="country" >
                             
                              <option> +91 </option>
                              <option>+966</option>
                              <option>+1</option>
                              
                            </select> 
    
    
                            <input class="form-control phone_line" id="phone" name="phone" required>
                           
                          </div>
                          <div class="form-group label-floating" style="margin-top: -15px;">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control" rows="3" id="intro" name="intro" required></textarea>
                            
                        </div>
                        
                       <div class="mt">
                        <label class="upload_resume">Upload Resume</label><br>
                        <input type="file"  name="filename" id="filename">
                    </div>
                    <br>
                  
                     <center><input type="submit" class="formbtn" style=" border: 2px solid #d00409 !important;" name="send" value="Submit"></center>
             </div>
             <div class="col-md-2"></div>
        </div>
    </div>
    </form>


       
        
      </div>
    </section>
    <!-- End Client Section -->

  
  


   

  </main><!-- End #main -->
<!-- ======= Footer ======= -->
   <footer id="footer">

   <!--  <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="footer-top" style="background-color: #fff !important;">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3 style="color:#d0040c !important;">Ansara </h3>
            <p style="color:#777777 !important;">
              Ansara Business Solutions Pvt . Ltd .<br>
              1 Saroj Square, 4th Floor, <br>
              Silver Spring Layout Road, <br>
              Kundanahalli Main Road,<br>
              Bengaluru , Karnataka 560037<br><br>
              <strong style="color:#5e5e5e !important;">Phone:</strong> +91 97518 27604<br>
              <strong style="color:#5e5e5e !important;">Email:</strong> info@ansara.co<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4 style="color:#000 !important;">Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.html" style="color:#777777 !important;">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.html" style="color:#777777 !important;">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="career.html" style="color:#777777 !important;">Careers</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#" style="color:#777777 !important;">Partners</a></li> -->
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 style="color:#000 !important;">Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="sap.html" style="color:#777777 !important;">SAP</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="iot.html" style="color:#777777 !important;">IOT</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="web_dev.html" style="color:#777777 !important;">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="web_dev.html" style="color:#777777 !important;">Mobile development</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 style="color:#000 !important;">Our Social Networks</h4>
            <p class="fp">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <center><div class="social-links mt-3">
             <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
             <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
             <!-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
             <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
             <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div></center>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Ansara</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->

         Designed by <a href="https://ansara.co/">Ansara</a>
      </div>
    </div>
  </footer>  
 

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>