<?php 
$title = 'Cvsu Alumni Tracer';
include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<?php 
include ('includes/connection.php');
?>

<link rel="stylesheet" href="includes/index.css">
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="uploads/2.jpg" class="d-block w-100%" alt="...">

        <div class="container">
          <div class="carousel-caption text-start">
          
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="uploads/1.jpg" class="d-block w-100%" alt="...">

        <div class="container">
          <div class="carousel-caption">
          
          </div>
        </div>
      </div>
      <div class="carousel-item">
       <img src="uploads/cvsu1.jpg" class="d-block w-100%" alt="...">

        <div class="container">
          <div class="carousel-caption text-end">
          
          
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


<div class="px-3 bg-dark text-white py-5 text-center" id="featured-3">
    <h4 >CAVITE STATE UNIVERSITY - SILANG CAMPUS</h4>
    <h6 class="pb-2 border-bottom">Truth, Excellence and Service</h6>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col border border-1 border-secondary" style="padding-top: 10px;">
        <div class="feature-icon ">
          <svg xmlns="http://www.w3.org/2000/svg"  width="50" height="50" fill="currentColor" class="bi bi-book " viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg>
        </div>
        <h3>Mission</h3>
        <hr>
        <p style="text-align: justify;">Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.</p>
        
      </div>
      <div class="feature col border border-1 border-secondary" style="padding-top: 10px;">
        <div class="feature-icon ">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
        </div>
        <h3>Vision</h3>
        <hr>
        <p style="text-align: justify;">The premier university in historic Cavite recognized for excellence in the development of globally competitive and morally upright individuals</p>
       
      </div>
      <div class="feature col border border-1 border-secondary " style="padding-top: 10px;">
        <div class="feature-icon ">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
        </div>
        <h3>Core Values</h3>
        <hr>
        <p>
          <ul style="list-style-type:none;">
              <li>Truth</li>
              <li>Excellence</li>
               <li>Service</li>
          </ul>
        </p>
        
      </div>
    </div>
  </div>
  

    <div class="album py-1 bg-dark">

    <div class="container">
      <h4 class="text-white">Image Gallery</h4>
      <hr class="text-white">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img src="uploads/college-building.jpeg" style="height: 400px;  object-fit: cover;">

            <div class="card-body">
              <p class="card-text text-center">College Building</p>
              
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="uploads/open-field.jpeg" style="height: 400px;  object-fit: cover;">

            <div class="card-body">
              <p class="card-text text-center">Open Field</p>
             
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="uploads/student-park.jpeg" style="height: 400px;  object-fit: cover;">

            <div class="card-body">
              <p class="card-text text-center">Student Park</p>
              
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <img src="uploads/room.jpeg" style="height: 400px;  object-fit: cover;">

            <div class="card-body">
              <p class="card-text text-center">Classroom</p>
              
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="uploads/cafeteria.jpeg" style="height: 400px;  object-fit: cover;">

            <div class="card-body">
              <p class="card-text text-center">Cafeteria</p>
              
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="uploads/rotonda.jpeg" style="height: 400px;  object-fit: cover;">

            <div class="card-body">
              <p class="card-text text-center">Entrance</p>
              
            </div>
          </div>
        </div>

        
        
        
      </div>
    </div>
  </div>

  <div align="center">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.215011663217!2d120.97906669999999!3d14.240676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7e7d0744eafd%3A0xf25bff0f1b1deb7b!2sCavite%20State%20University%2C%20Silang%20Campus!5e0!3m2!1sen!2sph!4v1651918736285!5m2!1sen!2sph" width="100%" height="450"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  </div>

<footer class="footer">
     <div class="container">
      <div class="row">
   
        <div class="footer-col">
          <h4>ALL RIGHT RESERVE 2022 ©</h4>
        </div>
      </div>
     </div>
  </footer>
  

<?php include('includes/footer.php'); ?>
