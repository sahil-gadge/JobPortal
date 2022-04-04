<?php include 'config.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <style>
      

      #home{
        display:flex;
        flex-direction:column;
        padding:3px 200px;
        height:300px;
        justify-content:center;
        align-items:center;
      }

      #home::before{
        content:"";
        position: absolute;
        background:url("bg3.jpeg") no-repeat center center/cover;
        height:300px;
        top:0px;
        left:0px;
        width:100%;
        z-index:-1;
        opacity: 0.60;
      }

      #home h1{
      color:red;
      text-align:center;
      font-family: Georgia, 'Times New Roman', Times, serif;

      }

      #home p{
        color:red;
        text-align: center;
        font-size: 1.5rem;
        font-family:Georgia, 'Times New Roman', Times, serif;
      }


      body , html{
        height: 100%;
        margin:0;
      }
        
        
        
      .jobs{
        background-color:white;
        margin-top: 1em;
        margin-left:2em;
        margin-right:2em;
        padding: 10px;
        box-shadow: 10px 10px 8px 10px #888888;
      }
        
      .navbar {
        z-index: 1;
        overflow: hidden;
        background-color: #333;
        position: fixed;
        top: 0;
        width: 100%;
      }
    </style>
    <title>Career</title>
</head>
<body>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link disabled"
                  href="#"
                  tabindex="-1"
                  aria-disabled="true"
                  >Disabled</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
</div>
<section id="home">

<h1 class="h-primary">Job Portal</h1>
<p>Best Jobs available matching your skills</p>

</section>

<div class="row">
  <?php

  $sql="SELECT cname,position,Jdesc,CTC,skills FROM jobs";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows>0){
    while($rows=$result->fetch_assoc()){
      echo'
      <div class="col-md-4">
          <div class="jobs">
              <h3 style="text-align: center;">'.$rows['position'].' </h3>
              <h4 style="text-align: center;"> '.$rows['cname'].' </h4>
              <p style="color: black; text-align:justify;"> '.$rows['Jdesc'].'</p>
              <p style="color: black;"><b>Skills Required:</b>'.$rows['skills'].'</p>
              <p style="color: black;"><b>CTC:</b>'.$rows['CTC'].'</p>
              <button
              class="btn btn-primary"
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
              aria-expanded="false"
              aria-controls="collapseExample"
            >
              Apply Now
            </button>

          </div>
      </div>';
    }
  }
  ?>
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply for Jobs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Applying For</label>
            <input type="text" name="applyfor" class="form-control">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Qualification</label>
            <input type="text" class="form-control" name="qual">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Year Passout</label>
            <input type="text" class="form-control" name="year">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="apply" class="btn btn-primary">Apply</button>
       
      </div>
      </form>
    </div>
  </div>
</div>



<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</body>
</html>