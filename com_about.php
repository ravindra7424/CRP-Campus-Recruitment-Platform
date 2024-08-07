<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Company | About</title>
      <link rel="stylesheet" href="com_about.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      
      <nav class="topnav">
         <div class="topnav-left">
               <img src="images/SRKR Ready.png">
         </div>
         <div class="topnav-right">
            <ul>
               <li><a href="com_home.php">Home</a></li>
               <li><a href="com_filter.php">Filter</a></li>
               <li><a href="com_leaderboard.php">Leaderboard</a></li>
               <li><a class="active">About</a></li>
               <li><?php session_start(); error_reporting(0); echo "<a href='com_settings.php'>{$_SESSION['username']}</a>"; ?></li>
            </ul>
         </div>
      </nav>

      <div class="content">
         <div class="left">
            <h2>Features of the College</h2>
            <ul>
               <li>SRKR Engineering College has accomplished 42 years of Academic Excellence</li>
               <li>Autonomous Institution approved by UGC since 2016-17</li>
               <li>Affiliated with Jawaharlal Nehru Technological University Kakinada (JNTUK)</li>
               <li>Accredited by All Indian Council for Technical Education (AICTE), New Delhi</li>
               <li>11 UG, 6 PG and 7 Ph.D. Programs offered</li>
               <li>'A+' Grade by NAAC with CGPA of 3.42/4.00</li>
               <li>UG Programs Civil, CSE, ECE, EEE, IT & ME Accredited by NBA</li>
               <li>Recognized as Scientific and Industrial Research Organization (SIRO) by Ministry of Science and Technology, Govt. of India</li>
               <li>Certified as Quality Management System under ISO 9001:2015</li>
               <li>AICTE IDEA Lab established with a total project cost of 112.81 lakhs</li>
               <li>Business Incubation Centre by MSME, Govt. of India</li>
               <li>Institution Innovation Council (IIC) of Innovation Cell, MHRD, Govt. of India</li>
               <li>17 Excellence Centres for research culture</li>
               <li>Unnat Bharat Abhiyan (UBA) program of MHRD, Govt. of India</li>
               <li>Various student clubs and cells: Entrepreneurship Development Cell, IPR Cell, Counseling Cell</li>
               <li>NSS, Sports, Yoga, Hostel, Dispensary, and Transport Facilities</li>
               <li>Alumni holding high positions at National and International Level</li>
            </ul>
         </div>
         <div class="right">
            <h2>College Profile</h2>
            <p>Sagi Rama Krishnam Raju Engineering College is a pioneering self-financing institution in Andhra Pradesh established in 1980 to provide technical education to rural students. The institution spans over 30 acres with state-of-the-art facilities for science and technology, creating an inclusive and culturally responsive learning environment. The institution instills a work ethos that fosters creativity, confidence, and logical thinking in students, making them highly valued graduates with exciting career prospects. The institution is driven by the vision of its late philanthropist founder Sri Sagi Rama Krishnam Raju and his son, President Sri S. Prasad Raju, who strive for academic excellence. With 42 years of collaborative efforts, the institution aims to produce the next generation of engineers, entrepreneurs, industrialists, researchers, academicians, and leaders who will contribute significantly to society. Its alumni hold highly prestigious positions and continue to make substantial contributions to the nation and the world at large.</p>
            <br>
            <h2>Foot Prints of SRKR</h2>
            <p>Sri Sagi Ramakrishnam Raju founded Prasad & Company (Project Works) Limited and played a philanthropic role in constructing the world's largest masonry dam. He established S.R.K.R. Engineering College in rural Andhra Pradesh to meet the lack of quality engineers in society. The college was established with a generous donation from Sri Sagi Ramakrishnam Raju in 1980 and named after him. It started with three branches of engineering and has since become a center of engineering education with a formidable reputation for academic excellence. The college boasts dedicated facilities, laboratories, placement services, a well-stocked library, and digital resources. The campus is self-contained with sports grounds, cultural center, cafeteria, bank, post office, healthcare center, and a college store. The college offers undergraduate and graduate programs in engineering and Ph.D. programs.</p>
         </div>
      </div>
      <div class="bottom">
         <h2>SRKR Ready</h2>
         <p>SRKR Ready is a professional social networking platform designed to help companies and students connect, network, and grow together. It was launched in 2023, designed and developed by students studying Computer Science & Engineering (CSE) at Sagi Ramakrishnam Raju Engineering College. Currently, it is the official hiring network platform for the college.</p>
         <p class="space">SRKR Ready provides a platform for students to showcase their skills and experience, compete with other students in various coding platforms, and find job opportunities. Students can create a profile that showcases their education, skills, and accomplishments. The platform is used by businesses and recruiters to find and hire professionals. Companies can filter talented students according to their needs.</p>
      </div>

   </body>
</html>