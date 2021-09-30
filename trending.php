<?php  
  // === SESSION === // 
  session_start();

  // === REQUIRE FUNCTION === //
  require 'db/function.php';
  $db = new Databasedx();

  // === QUERY TRACK === //

  $allTrack = $db->getAllTrack();
  $getThirdTrack = $db->getThirdTrack();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <script src="https://kit.fontawesome.com/6dab888157.js" crossorigin="anonymous"></script>
    <title>Trending</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg p-3">
      <div class="container">
        <a class="navbar-brand wow bounceInDown" href="#"><h3>g6fan-music!</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active wow bounceInDown" href="index.php" data-wow-duration="0.5s" data-wow-delay="0.2s">Home</a>
            <a class="nav-item nav-link wow bounceInDown" href="trending.php" data-wow-duration="1s" data-wow-delay="0.2s">Trending</a>
            <a class="nav-item nav-link wow bounceInDown" href="#" data-wow-duration="1.5s" data-wow-delay="0.2s">Popular</a>
            <a class="nav-item nav-link wow bounceInDown" href="#" data-wow-duration="2s" data-wow-delay="0.2s">Contact</a>
            <a class="nav-item nav-link enjoy-now btn btn-primary wow bounceInDown" href="dashboard.php" data-wow-duration="2.5s" data-wow-delay="0.2s">Dashboard</a>
          </div>
        </div>
      </div>
    </nav>

    <section style="background-image: url(http://localhost/Uprising/assets/images/feature-bg-1.png); background-size: cover;">
      <div class="container trends">
        <div class="row">
          <div class="col-lg title">
            <hr>
            <h5>Trending</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 wow bounceInLeft"><img src="assets/svg/undraw_mello_otq1.svg" width="350"></div>
          <div class="col-md-7">
            <?php foreach ($getThirdTrack as $thirdTrack) : ?>
              <div class="carded wow bounceInRight">
                <i class="fas fa-play-circle iCon border-0 btnPp" data-name="<?= $thirdTrack['track_name']; ?>"></i>
                <b class="" style="position: relative; top: -2px;"><?= $thirdTrack['track_artist']; ?></b>
                <p class=""><?= $thirdTrack['track_title']; ?></p>
                <small class=""><?= date('d M Y', $thirdTrack['track_release']); ?></small>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="row row3 p-3 text-center mb-3">
          <div class="col-lg">
            <h2><a href="dashboard.php" class="text-white text-uppercase">Upload your own music.</a></h2>
          </div>
        </div>
      </div>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/wow.js"></script>
    <script>
    const music = new Audio();
    $('.btnPp').on('click', function(e) {
      const track = $(this).data('name');

      if(music.paused) {
        e.target.classList.replace('fa-play-circle', 'fa-pause-circle');
        music.src = 'assets/tracks/' + track;
        music.play();
        console.log(e.target);
      } else {
        e.target.classList.replace('fa-pause-circle', 'fa-play-circle');
        music.pause();
      }
    });
    </script>
    <script>
    new WOW().init();
    </script>
    
</body>
</html>