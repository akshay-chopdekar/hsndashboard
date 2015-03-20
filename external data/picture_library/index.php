<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Better the Game | Coming Soon</title>
  </head>
  <meta name="description" content="">

  <meta name="author" content="">

  <link rel="shortcut icon" href="assets/img/better-icon.png">

  <meta name="viewport" content="width=device-width, intial-scale=1.0" />

  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,300' rel='stylesheet' type='text/css'>
  <style type="text/css">
    @font-face
    {  

      font-family: "sertig";
      src : url(assets/font/Sertig.ttf) format('truetype'),
          url(assets/font/Sertig.otf);
    }
    @font-face
    {
      font-family: "Microsoft Yi Baiti";
      src : url(assets/font/msyi.ttf) format('truetype');
    }
    .item img
    {
      width: 304px;
      height: 520px;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/font.css"> -->


  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <body>
    <!-- body starts here -->
    <div id="header">
      <div class="menu">
        <nav id="navbar">
          <ul>
            <li> <a href="#">Features</a> </li>
            <li> <a href="#">contact</a> </li>
          </ul>
        </nav>
        <a href="#">
          <div class="logo"></div>
        </a>
      </div> 
      
    </div>
    <!-- <div style="font-family: 'Open Sans';font-weight:300;">Hello world</div> -->
    <div class="container">
      <div class="row show-grid">
        <div class="col-sm-8 col-xs-12 content" >
          <div class="appleComingSoon"></div>
          <div>
            <h2 class="tagline">Create, Play & Win in Seconds.<br/>Experience betting at its best!!!</h2>
          </div>
          <div class="desc">
            <p><span style="color: #01939a;">"Better"</span> is a social betting game that allows people to experience<br/>  the thrill of betting without the fear of losing real money.</p>
          </div>
          <div class="formDiv" >
            <div class="after-submit">
              <form  id="send-form" method="POST" action="includes/sendMail.php">
                <input id="email" class="custome-form-control" type="email" placeholder="Enter your email address here" />
                <div class="subscribe-button">
                  <input class="btn btn-primary custom-btn" type="submit" value="Notify me when better is ready" />
                </div>
              </form>
            </div>
          </div>
          <div class="footer">
            <span>Proudly Powered by <a href="http://www.helixtech.co" target="_blank">Helix Tech</a>  </span>
            <p>copyright &copy; betterthegame2014</p>
          </div>
          <center>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=619522564769024";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>

            <div class="fb-like" data-href="https://www.facebook.com/pages/Betterthegame/214416598752895" data-width=" " data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>

            <div class="tw-btn">
              <a  href="https://twitter.com/BetterTheGame" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @BetterTheGame</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>

            <div class="tw-btn">
              <a href="https://twitter.com/BetterTheGame" class="twitter-share-button" data-lang="en" data-count="none">Tweet</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>

          </center>


        </div>
        <div class="col-sm-4 iphone">
          <div class="bs-example">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2000">
              <div class="carousel-inner" >
                <div class="item active">
                  <img src="assets/img/better.png" style="width:304px;height:323px" alt="First slide">
                </div>
                <div class="item">
                  <img src="assets/img/2.jpg" style="width:304px;height:323px" alt="Second slide">                 
                </div>
                <div class="item">
                  <img src="assets/img/3.jpg" style="width:304px;height:323px" alt="Third slide">
                </div>


              </div>
            </div>
          </div>
          <img class="glare" src="assets/img/glare.png">
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#send-form").submit(function(event) {
          /* stop form from submitting normally */
          event.preventDefault();
          /* get some values from elements on the page: */
          var email = $('input#email').val();
          var dataString = 'email=' + email;
            
          $.ajax({   
            type: "POST",   
            url: "includes/sendMail.php",  
            data: dataString,  
            success: function(data) {  
              //alert(data);
              $('#after-submit').html(data);
            }
          }); 
          return false;  
        });
      });
    </script>
    <!-- body ends here -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>