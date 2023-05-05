<html>
  <head>
    <title>OGCS</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="css/style.css" type="text/css"
          rel="stylesheet" />
    <link href="/dist/output.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://kit.fontawesome.com/ee7690777c.js" crossorigin="anonymous"></script>
    
  </head>
  <body>

    <div class="title-bar">
      <h1 style="font-size: 38px;color: white;-webkit-text-stroke: 1px black;text-stroke: 1px black;">Online Guidance and Counseling System</h1>
    </div>

    <div class='sidebar'>
      <div class='profile'>
        <div class='circle-img'>
          <img src="images/jaded.jpg" alt="profile image">
        </div>
        <div class='profile-details'>
          <h1>Jade Raposa</h1>
          <h2>BSIT-2 Student</h2>
          <h1>Divine Word College of Legazpi</h1>
        </div>
      </div>

      <div class='navbar'>
        <h1 class="outlined">Main Navigation</h1>
      </div>

      <div>
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="index.php"  class="active">Registration Form</a></li>
          </ul>
        </nav>
        <script>
          // Get the current URL
          var currentUrl = window.location.href;

          // Loop through each link in the navigation menu
          $('nav ul li a').each(function() {

            // If the link's URL matches the current URL, add the "active" class
            if ($(this).attr('href') === currentUrl) {
              $(this).addClass('active');
            }

          });
        </script>
      </div>
        
    </div>

    
      <div class="container">
        <div class="container-title">
        <h1 style="font-weight: bold;">Database </h1>
        </div>

        <hr>

    </div>

  </body>
</html>

