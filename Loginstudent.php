<?php
include 'resources/index.php';
?>
<body>

<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">

        </div>
        <div class="col-rt-5">
            <ul>

                <li><a href="index.html" title="Back to tutorial page">Home</a></li>
                <li><a href="parents.html" title="Back to tutorial page">parents</a></li>
                <li><a href="teachers.html" title="Back to tutorial page">Teachers</a></li>
                <li><a href="assignment.html" title="Back to tutorial page">View assignments</a></li>
                <li><a href="quiz.html" title="Back to tutorial page">View quizzz</a></li>
                <li><a href="Loginstudent.php" title="Back to tutorial page">Login student</a></li>
                <li><a href="loginteacher.html" title="Back to tutorial page">Login teachers</a></li>
                <li><a href="loginparents.html" title="Back to tutorial page">Login parents</a></li>
                <li><a href="loginparents.html" title="Back to tutorial page">Contact Form</a></li>
            </ul>
        </div>
    </div>
</div>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Login Students </h1>
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
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Login Form</h3>
                       </div>
          <div class="card-body pt-0">
              <form action="app/login_check.php" method="post" class="login-form">
                  <div class="col-rt-6">

                      <label>User name</label>
                      <input name="username" type="text">
                  </div>
                  <div class="col-rt-6">

                      <label>Password</label>
                      <input name="password" type="password">
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
                  <label><a href="register.html">Register</a></label>

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
