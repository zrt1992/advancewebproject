<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__.'/app/dependencies.php';
include __DIR__.'/app/login_status.php';


$connect = db_connect();
$user=getuser();
//var_dump($user);die;
if($user['roll']=="student"){
//    header("Location: ".url()."loginstudent.php");
}
if($user['roll']=="teacher")  header("Location: ".url()."teacher.php");


$sql = "SELECT *,CASE WHEN uc.status=0 THEN 'Withdrawn' WHEN uc.status = 1 THEN 'Enrolled' end as course_status FROM user as u INNER JOIN role as r on u.role_id=r.id
 INNER JOIN users_courses as uc on uc.user_id=u.id INNER JOIN course as c on c.id=uc.course_id WHERE u.id='".$user['userid']."' and r.id=1";
$student_courses = $connect->query($sql);


$sql = "SELECT * FROM user as u INNER JOIN role as r on u.role_id=r.id
    INNER JOIN users_assignments as ua on ua.user_id=u.id
    INNER JOIN  assignment as a  on a.id=ua.assignment_id WHERE u.id='".$user['userid']."' and r.id=1";
$student_assignments = $connect->query($sql);

$sql = "SELECT * FROM user as u INNER JOIN role as r on u.role_id=r.id
    INNER JOIN user_quizzes as ua on ua.user_id=u.id
    INNER JOIN  quiz as a  on a.id=ua.quiz_id WHERE u.id='".$user['userid']."' and r.id=1";
$student_quizzes = $connect->query($sql);

$sql = "SELECT * FROM course WHERE id NOT IN (SELECT course_id FROM `users_courses` where user_id='".$user['userid']."')";
//echo $sql;die;

$all_courses = $connect->query($sql);

//while ($r = $student_quizzes->fetch_assoc()){
//    var_dump($r);
//}
//die;
//var_dump($student_courses);
//die;
include 'resources/index.php' //added  to avoid duplication
?>
<body>
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">

            <!-- Ad Here -->

        </div>
        <div class="col-rt-5">
            <ul>
                <li><a href="index.php" title="Back to tutorial page">Home</a></li>
<!--                <li><a href="profile.php" title="Back to tutorial page">Your Profile</a></li>-->
                <!--                <li><a href="teachers.html" title="Back to tutorial page">Teachers</a></li>-->
                <!--                <li><a href="assignment.html" title="Back to tutorial page">View assignments</a></li>-->
                <!--                <li><a href="quiz.html" title="Back to tutorial page">View quizzz</a></li>-->
                <!--                <li><a href="Loginstudent.php" title="Back to tutorial page">Login student</a></li>-->
                <!--                <li><a href="loginteacher.html" title="Back to tutorial page">Login teachers</a></li>-->
                <!--                <li><a href="loginparents.html" title="Back to tutorial page">Login parents</a></li>-->
<!--                <li><a href="contactform.php" title="Back to tutorial page">Contact Form</a></li>-->
                <li><a href="app/logout.php" title="Back to tutorial page">Logout</a></li>
            </ul>
        </div>
    </div>
</div>



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


<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
              <img class="profile_img" src="<?php echo url().$user['profile_pic']?>" alt="student dp">
            <h3><?php echo $user['user_name'] ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID:</strong><?php echo $user['user_id'] ?></p>
            <p class="mb-0"><strong class="pr-1">Class:</strong><?php echo $user['academic_year'] ?></p>
            <p class="mb-0"><strong class="pr-1">Section:</strong><?php echo $user['blood_group'] ?></p>
              <form action="app/profile_pic.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="userid" value="<?php echo $user['userid'];?>">
                  <div class="edit-profile">
                      <form>
                          <input name="profile_pic" type="file">
                          <input type="submit" value="update picture">
                      </form>
                  </div>
              </form>

          </div>

        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
              <ul class="profile-heading">
                  <li> <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3> </li>
                  <li><a href="<?php echo url().'update_profile.php' ?>">Edit Profile</a></li>
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
<!--        <div class="card shadow-sm">-->
<!--          <div class="card-header bg-transparent border-0">-->
<!--            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>-->
<!--          </div>-->
<!--          <div class="card-body pt-0">-->
<!--              <p>-->
<!--                  --><?php //echo $user['description'] ?>
<!--              </p>-->
<!--                </div>-->
<!--        </div>-->
          <div style="height: 26px"></div>
          <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Courses</h3>
              </div>
              <div class="card-body pt-0">
                  <table class="table table-bordered">
                      <thead>
                          <th width="30%">Course Name</th>
                          <td width="2%">:</td>
                          <td>Course Code</td>
                          <td>Course Status</td>
                          <td>Course Grade</td>
                      </thead>
                      <tbody>
                      <?php

                      while ($r = $student_courses->fetch_assoc()){
                          ?>
                      <tr>
                          <th width="30%"><?php echo $r['name'] ?></th>
                          <td width="2%">:</td>
                          <td><?php echo $r['code'] ?></td>
                          <td><?php echo $r['course_status'] ?></td>
                          <td><?php echo $r['grade'] ?></td>
                      </tr>
                          <?php
                      }
                      ?>
                      <?php

                      while ($r = $all_courses->fetch_assoc()){
                          ?>
                          <tr>
                              <th width="30%"><?php echo $r['name'] ?></th>
                              <td width="2%">:</td>
                              <td><?php echo $r['code'] ?></td>
                              <td>Not Enrolled</td>
                              <td><a href="app/enroll.php?user_id=<?php echo $user['userid'] ?>&course_id=<?php echo $r['id'] ?>">Enrolled</a></td>
                          </tr>
                          <?php
                      }
                      ?>



                      </tbody>

                  </table>
              </div>
          </div>
          <div style="height: 26px"></div>
<!--          <div class="card shadow-sm">-->
<!--              <div class="card-header bg-transparent border-0">-->
<!--                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Grades</h3>-->
<!--              </div>-->
<!--              <div class="card-body pt-0">-->
<!--                  <table class="table table-bordered">-->
<!--                      <thead>-->
<!--                      <th width="30%">Course Name</th>-->
<!--                      <td width="2%">:</td>-->
<!--                      <td>Grade</td>-->
<!--                      </thead>-->
<!--                      <tr>-->
<!--                          <th width="30%">Physics</th>-->
<!--                          <td width="2%">:</td>-->
<!--                          <td>A</td>-->
<!--                      </tr>-->
<!--                      <tr>-->
<!--                          <th width="30%">Computer science</th>-->
<!--                          <td width="2%">:</td>-->
<!--                          <td>B</td>-->
<!--                      </tr>-->
<!--                      <tr>-->
<!--                          <th width="30%">Humanities</th>-->
<!--                          <td width="2%">:</td>-->
<!--                          <td>C</td>-->
<!--                      </tr>-->
<!---->
<!--                  </table>-->
<!--              </div>-->
<!--          </div>-->
          <div style="height: 26px"></div>
          <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Assignment</h3>
              </div>
              <div class="card-body pt-0">
                  <table class="table table-bordered">
                      <thead>
                      <th width="30%">Assignment Title</th>
                      <td width="2%">:</td>
                      <td>Status</td>
                      </thead>
                      <?php
                      while ($r = $student_assignments->fetch_assoc()){
                      ?>
                      <tr>
                          <th width="30%"><?php echo $r['title'] ?></th>
                          <td width="2%">:</td>
                          <td><?php echo $r['grade'] ?></td>
                      </tr>
                      <?php
                      }
                      ?>

                  </table>
              </div>
              <div class="card-body pt-0">

                  <form action="app/upload_assignment.php" method="post" enctype="multipart/form-data">
                      <select name="course_id">
                          <option selected>Select Course</option>
                          <?php
                          $sql = "SELECT *,CASE WHEN uc.status=0 THEN 'Withdrawn' WHEN uc.status = 1 THEN 'Enrolled' end as course_status FROM user as u INNER JOIN role as r on u.role_id=r.id
 INNER JOIN users_courses as uc on uc.user_id=u.id INNER JOIN course as c on c.id=uc.course_id WHERE u.id=1 and r.id=1";
                          $student_courses = $connect->query($sql);
                          while ($rr = $student_courses->fetch_assoc()){
                              ?>
                              <option value="<?php echo $rr['course_id'] ?>"><?php echo $rr['name'] ?></option>
                              <?php
                          }
                          ?>

                      </select>
                      <br>
                      <input type="hidden" type="text" name="user_id" value="<?php echo $user['userid'] ?>">
<!--                      <label>Upload Assignment</label>-->
                      <input name="assignment" type="file">
                      <input type="submit" value="upload" name="submit">
                  </form>
              </div>
          </div>
          <div style="height: 26px"></div>
          <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Quizz</h3>
              </div>
              <div class="card-body pt-0">
                  <table class="table table-bordered">
                      <thead>
                      <th width="30%">Quiz NO</th>
                      <td width="2%">:</td>
                      <td>Grade</td>
                      </thead>
                      <?php
                      while ($r = $student_quizzes->fetch_assoc()){
                          ?>
                          <tr>
                              <th width="30%"><?php echo $r['title'] ?></th>
                              <td width="2%">:</td>
                              <td><?php echo $r['grade'] ?></td>
                          </tr>
                          <?php
                      }
                      ?>

                  </table>
              </div>
              <div class="card-body pt-0">

                  <form action="app/upload_quiz.php" method="post" enctype="multipart/form-data">
                      <select name="course_id">
                          <option selected>Select Course</option>
                          <?php
                          $sql = "SELECT *,CASE WHEN uc.status=0 THEN 'Withdrawn' WHEN uc.status = 1 THEN 'Enrolled' end as course_status FROM user as u INNER JOIN role as r on u.role_id=r.id
 INNER JOIN users_courses as uc on uc.user_id=u.id INNER JOIN course as c on c.id=uc.course_id WHERE u.id=1 and r.id=1";
                          $student_courses = $connect->query($sql);
                          while ($rr = $student_courses->fetch_assoc()){
                              ?>
                              <option value="<?php echo $rr['course_id'] ?>"><?php echo $rr['name'] ?></option>
                              <?php
                          }
                          ?>

                      </select>
                      <br>
                      <!--                      <label>Upload Assignment</label>-->
                      <input name="assignment" type="file">
                      <input type="submit" value="upload" name="submit">
                  </form>
              </div>
          </div>
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
