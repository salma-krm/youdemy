<?php
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <title></title>
    <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
    </style>
  </head>
  <body>
    
  <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form mrthod ="POST" action="../app/controller/UtilisateurControllers" >
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" />
            
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example23">Password</label>
            <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
           
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
          
          <!-- Submit button -->
          <button type="submit"   name ="submit" value = "login" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"><a href="../app/controller/UtilisateurControllers"></a>Sign in</button>
        </form>
      </div>
    </div>
  </div>
</section>
  </body>
</html>