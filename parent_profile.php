<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__.'/app/dependencies.php';
include __DIR__.'/app/login_status.php';


$connect = db_connect();
$user=getuser();
include 'resources/index.php';
?>
<body>
<?php
include 'resources/header.php';
?>


<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Student Profile </h1>
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
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
            <h3>Name of students</h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID:</strong>321000001</p>
            <p class="mb-0"><strong class="pr-1">Class:</strong>4</p>
            <p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
              <div class="edit-profile">
                  <form>
                      <input type="file">
                      <input type="submit" value="update picture">
                  </form>
              </div>
          </div>

        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
              <ul class="profile-heading">
                  <li> <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3> </li>
                  <li><a href="#">Edit Profile</a></li>
              </ul>

          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Roll</th>
                <td width="2%">:</td>
                <td><?php echo $user['user_id'] ?></td>
              </tr>
              <tr>
                <th width="30%">Academic Year	</th>
                <td width="2%">:</td>
                  <td><?php echo $user['academic_year'] ?></td>
              </tr>
              <tr>
                <th width="30%">blood</th>
                <td width="2%">:</td>
                  <td><?php echo $user['blood_group'] ?></td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p>
                  <?php echo $user['description'] ?>
              </p>
                </div>
        </div>
          <div style="height: 26px"></div>

      </div>

    </div>
  </div>
</div>
              </div>
		</div>
    </div>
</section>
	</body>
</html>
