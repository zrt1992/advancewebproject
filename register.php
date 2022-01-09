<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <link rel="stylesheet" href="css/style.css" />

</head>
<body>



<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Register </h1>
                <p>Desscription</p>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">

<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Contact Form</h3>
                       </div>
          <div class="card-body pt-0">
              <form action="app/register.php" class="login-form" method="POST">
                  <div class="col-rt-6">

                      <label>Name</label>
                      <input name="name" type="text">
                  </div>
                  <div class="col-rt-6">

                      <label>Email</label>
                      <input name="email" type="text">
                  </div>
                  <div class="col-rt-6">

                      <label>Password</label>
                      <input name="password" type="password">
                  </div>
                  <div class="col-rt-6">

                      <label>Confirm Password</label>
                      <input name="confirm_password" type="password">
                  </div>
                  <div class="col-rt-6">

                      <label>Register as</label>
                      <select name="role_id">
                          <option value="1">Student</option>
                          <option value="2">Teacher</option>
                          <option value="3">Parent</option>
                          <option value="4">Admin</option>
                      </select>
                  </div>

                  <div class="col-rt-6">
                      <br>
                  </div>
                  <div class="col-rt-6">
                      <label></label>
                      <input type="submit" value="Submit">
                  </div>
              </form>
          </div>
        </div>




      </div>

    </div>
  </div>
</div>
<!-- partial -->

    		</div>
		</div>
    </div>
</section>



	</body>
</html>
