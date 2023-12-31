<?php

  $jumbotron = get_section_data('JUMBOTRON');
  $about = get_section_data('ABOUT');

  $site_name = get_setting_value('_site_name'); 
  $site_description = get_setting_value('_site_description');
  $location = get_setting_value('_location');

  $about = get_section_data('ABOUT');

  $project = get_all_project();

  $github = get_setting_value("_github");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site_name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: #3e0782;">
  <i class="fa-brands fa-github fa-2xl" style="color: #ff0000;"></i>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto" style="margin-left: 1100px;">
      <li class="nav-item">
        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#project">Project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact Me</a>
      </li>
    </ul>
  </div>
</nav>
<!-- navbar -->

<!-- jumbotron -->
<div class="jumbotron text-center rounded-0" id="home" style="height: 765px; background-color:#342259; color:white;">
  <img src="{{ Storage::url($jumbotron->thumbnail) }}" class="img-thumbnail rounded-circle" style="margin-top: 80px;" width="200">
  <h1 class="display-2">{!! strip_tags ($jumbotron->title) !!}</h1>
  <p class="lead">dengan spring boot menjadikan negeri anda tentram</p>
  <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#5000ca" fill-opacity="1" d="M0,64L48,96C96,128,192,192,288,192C384,192,480,128,576,133.3C672,139,768,213,864,229.3C960,245,1056,203,1152,186.7C1248,171,1344,181,1392,186.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> -->
</div> 
<!-- jumbotron -->

<!-- about -->
  <section id="about">
    <div class="container">
      <div class="row border-danger mb-3 justify-content-center">
        <h2>About Me</h2>
      </div>
      <div class="card mb-3" style="max-width: 1000px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ Storage::url($about->thumbnail) }}" alt="about-image" class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <p class="card-text">{!! strip_tags($about->content) !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </section>
<!-- about -->

 <!-- Project -->
 <section id="project">
   <div class="container" >
   <div class="row justify-content-center">
        <h2>My project</h2> <br> <br> <br> <br>
      </div>
      <div class="row justify-content-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200" >
      @foreach($project as $item)
        <div class="col-md-4 pb-3" >
          <div class="card" style="width: 18rem;">
            <img src="{{ Storage::url($item->thumbnail) }}" class="card-img-top" alt="image-project" height="200" width="200">
            <div class="card-body">
              <h5 class="card-title">{{ $item->title }}</h5>
              <p class="card-text">{!! strip_tags($item->content) !!}</p>
              <a href="{{ $item->link }}" class="btn btn-primary" target="_blank">Link</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Tutup Project --> 


  <!-- contact me -->
  <section id="contact">
    <div class="container">
      <div class="col text-center">
        <h2>Contact Me</h2>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div> 
      <div class="mb-3">
        <button class="btn btn-primary">Kirim</button>
      </div> 
    </div>
  </section>
  <!-- contact me -->

  <!-- footer -->
  <footer style="background-color: #3e0782;">
    <div class="container" style="padding-top: 1rem;">
      <div class="row">
        <div class="col-md-8">
          <a href="{{ $github }}" target="_blank" class="btn btn-primary btn-floating mx-2 border-0" style="background-color: #7289da;">
            <i class="fa-brands fa-github" ></i>
          </a>
          <button type="button" class="btn btn-primary btn-floating mx-2 border-0">
            <i class="fa-brands fa-twitter"></i>
          </button>
          <button type="button" class="btn btn-danger btn-floating mx-2 border-0">
            <i class="fa-brands fa-youtube"></i>
          </button>
          <div class="col-md-4 text-white pt-2">
            <p>{{ $location }}</p>
          </div>
      </div>
      <div class="col-md-4 text-white">
        <h6 class="text-uppercase fw-bold">
          <i class="fa-regular fa-copyright fa-2xl"></i> {{ $site_name }}
        </h6>
        <p>{!! strip_tags($site_description) !!}</p>
      </div>
    </div>
  </footer>
  <!-- footer -->

  <!-- copyright -->
  <div class="text-center text-white p-3" style="background-color:black;">
  <i class="fa-regular fa-copyright fa-s"></i> <?php echo (int)date('Y') ?> Copyright
  <a href="#" class="text-white">Paung</a>
  </div>
  <!-- copyright -->


  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

</body>
<!-- bootstrap 4.6 config -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
let mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.documentElement.scrollTop = 0; 
} 
</script>

</html>