<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Company | Home</title>
      <link rel="stylesheet" href="com_home.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      
      <nav class="topnav">
         <div class="topnav-left">
            <img src="images/SRKR Ready.png">
         </div>
         <div class="topnav-right">
            <ul>
               <li><a class="active">Home</a></li>
               <li><a href="com_filter.php">Filter</a></li>
               <li><a href="com_leaderboard.php">Leaderboard</a></li>
               <li><a href="com_about.php">About</a></li>
               <li><?php session_start(); error_reporting(0); echo "<a href='com_settings.php'>{$_SESSION['username']}</a>"; ?></li>
            </ul>
         </div>
      </nav>

      <div class="content">
         <div class="image">
            <img src="images/SRKR Header Image.png">
         </div>
         <div class="section">
            <div class="left">
               <p>The Training & Placement (T&P) Cell at the institution was established in 1995 with the primary objective of providing career opportunities to students in reputed corporate companies. It is headed by Dr. K. R. Satyanarayana, Dean Training & Placements and is responsible for various activities to cater to the needs of the students. The T&P Cell plays a crucial role in securing job opportunities for students by staying in constant touch with reputed firms and industrial establishments. The Cell also facilitates qualitative training that complements the academic excellence of the students.</p>
               <br>
               <p>The T&P Cell provides campus recruitment training (CRT) that focuses on two components, namely soft skills and technical skills. Soft skills training includes verbal and quantitative aptitude, logical reasoning, interview skills, resume writing, and group discussion, which are imparted to the students in a systematic way. Technical training includes training for service-based, product-based, and core companies. The T&P Cell conducts timely pre-placement sessions and invites experienced industry leaders to interact with the students through seminars, workshops, and guest lectures. The Cell also organizes various career guidance programs for all the students and encourages them to visit and interact with the faculty.</p>
            </div>
            <div class="right">
                  <div class="mySlides">
                     <div class="numbertext"></div>
                     <img src="images/slide1.png">
                  </div>

                  <div class="mySlides">
                     <div class="numbertext"></div>
                     <img src="images/slide2.png">
                  </div>

                  <div class="mySlides">
                     <div class="numbertext"></div>
                     <img src="images/slide3.png">
                  </div>

                  <div class="mySlides">
                     <div class="numbertext"></div>
                     <img src="images/slide4.png">
                  </div>
                        
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span>        
           </div>
         </div>
      </div>
   </body>
   <script>
      let slideIndex = 0;
      showSlides();
                  
      function showSlides() {
         let i;
         let slides = document.getElementsByClassName("mySlides");
         let dots = document.getElementsByClassName("dot");
         for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
         }
         slideIndex++;
         if (slideIndex > slides.length){
            slideIndex = 1;
         }    
         for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace("active", "");
         }
         slides[slideIndex-1].style.display = "block";  
         dots[slideIndex-1].className += " active";
         setTimeout(showSlides, 5000); // Change image every 5 seconds
      }
   </script>
</html>