<?php
include 'app/dependencies.php';
include __DIR__.'/app/login_status.php';

$user=getuser();
//var_dump($user);die;
include 'resources/index.php';


?>
<body>

<?php
include 'resources/header.php'
?>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Update Profile</h1>
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
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Update Profile</h3>
                       </div>
          <div class="card-body pt-0">
              <form action="app/update_profile.php" method="post" class="login-form">
                  <div class="col-rt-6">
                      <label>Email</label>
                      <input name="username" disabled type="text" placeholder="<?php echo $user['username'] ?>">
                  </div>
                  <div class="col-rt-6">
                      <label>Password</label>
                      <input name="password" type="password" value="<?php echo $user['password'] ?>">
                  </div>
                  <div class="col-rt-6">
                      <label>Gender</label>
                      <input name="gender" type="text" value="<?php echo $user['gender'] ?>">
                  </div>
                  <div class="col-rt-6">
                      <label>Name</label>
                      <input name="name" type="text" value="<?php echo $user['name'] ?>">
                  </div>
<!--                  <div class="col-rt-6">-->
<!--                      <label>Profile Pic</label>-->
<!--                      <input name="profile_pic" type="text" value="--><?php //echo $user['profile_pic'] ?><!--">-->
<!--                  </div>-->
                  <div class="col-rt-6">
                      <label>Description</label>
                      <input name="description" type="text" value="<?php echo $user['description'] ?>">
                  </div>
                  <div class="col-rt-6">
                      <label>Blood Group</label>
                      <input name="blood_group" type="text" value="<?php echo $user['blood_group'] ?>">
                  </div>
                  <div class="col-rt-6">
                      <label>Age</label>
                      <input name="age" type="text" value="<?php echo $user['age'] ?>">
                  </div>
                  <input type="hidden" name="userid" value="<?php echo $user['userid'] ?>">
<!--                  <div class="col-rt-6">-->
<!--                      <label>Age</label>-->
<!--                      <input name="password" type="text" value="--><?php //echo $user['age'] ?><!--">-->
<!--                  </div>-->
                  <div class="col-rt-6">
                      <br>
                  </div>
                  <div class="col-rt-6">
                      <label></label>
                      <input type="submit" value="Update Profile">
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
