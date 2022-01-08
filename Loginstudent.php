<?php

include 'resources/index.php';
?>
<body>



<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Login  </h1>
                <p>Enter you login details here</p>
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
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Login Form</h3>
                       </div>
          <div class="card-body pt-0">
              <form action="app/login_check.php" method="post" class="login-form">
                  <div class="col-rt-6">

                      <label>User name</label>
                      <input name="username" type="text" value="zulfiqar_tariq@hotmail.com">
                  </div>
                  <div class="col-rt-6">

                      <label>Password</label>
                      <input name="password" type="password" value="zulfiqar_tariq@hotmail.com">
                  </div>
                  <div class="col-rt-6">
                      <br>
                  </div>
                  <div class="col-rt-6">
                      <label></label>
                      <input type="submit" value="Login">
                  </div>
              </form>
              <div class="col-rt-6">
                  <label><a href="register.php">Register</a></label>

              </div>
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
