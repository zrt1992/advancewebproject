<?php
//var_dump($_COOKIE['PHPSESSID']);die;
error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__.'/app/dependencies.php';
include __DIR__.'/app/login_status.php';


$connect = db_connect();
$user=getuser();
//var_dump($user,$config);die;
if($user['roll']=="teacher"){
//    header("Location: ".url()."loginstudent.php");
}
if($user['roll']=="student")  header("Location: ".url()."index.php");



$sql = "SELECT *,u.name as student_name, CASE WHEN uc.status=0 THEN 'Withdrawn' WHEN uc.status = 1 THEN 'Enrolled' end as course_status FROM users_courses as uc INNER JOIN user as u on u.id=uc.user_id inner join course as c on c.id=uc.course_id
WHERE uc.course_id IN (SELECT course_id FROM `users_courses` where user_id='".$user['userid']."') and u.id!='".$user['userid']."'  ORDER BY c.name asc";
//echo $sql;die;
$course_students = $connect->query($sql);

$sql = "SELECT *,a.id as assignment_id FROM user as u INNER JOIN role as r on u.role_id=r.id
    INNER JOIN users_assignments as ua on ua.user_id=u.id
    INNER JOIN  assignment as a  on a.id=ua.assignment_id WHERE u.id='".$user['userid']."' and r.id='".$user['role_id']."'";//role_id

$uploaded_assignments = $connect->query($sql);

$sql = "SELECT *,a.id as assignment_id,u.name as user_name FROM user as u INNER JOIN role as r on u.role_id=r.id
    INNER JOIN users_assignments as ua on ua.user_id=u.id
    INNER JOIN  assignment as a  on a.id=ua.assignment_id WHERE u.id='".$user['userid']."' and r.id='".$user['role_id']."'";//role_id

//echo $sql;die;
$student_assignments = $connect->query($sql);


$sql = "select * from course";
$all_courses = $connect->query($sql);

$sql = "SELECT * FROM user as u INNER JOIN role as r on u.role_id=r.id
    INNER JOIN user_quizzes as ua on ua.user_id=u.id
    INNER JOIN  quiz as a  on a.id=ua.quiz_id WHERE u.id='".$user['userid']."' and r.id='".$user['role_id']."'";
$student_quizzes = $connect->query($sql);
//while ($r = $student_quizzes->fetch_assoc()){
//    var_dump($r);
//}
//die;
//var_dump($course_students);
//die;
include 'resources/index.php'; // to avoid duplication
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
                <li><a href="contactform.php" title="Back to tutorial page">Contact Form</a></li>
                <li><a href="app/logout.php" title="Back to tutorial page">Logout</a></li>
            </ul>
        </div>
    </div>
</div>



<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Tacher Profile </h1>
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

          <div style="height: 26px"></div>
          <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Student Course Grades</h3>
              </div>
              <div class="card-body pt-0">
                  <table class="table table-bordered">
                      <thead>
                          <th width="30%">Student Name</th>
                          <th width="30%">Course Name</th>
                          <td width="2%">:</td>
                          <td>Course Code</td>
                          <td>Course Status</td>
                          <td>Student Grade</td>
                      </thead>
                      <tbody>
                      <?php

                      while ($r = $course_students->fetch_assoc()){
                          ?>
                      <tr>
                          <th width="30%"><?php echo $r['student_name'] ?></th>
                          <th width="30%"><?php echo $r['name'] ?></th>
                          <td width="2%">:</td>
                          <td><?php echo $r['code'] ?></td>
                          <td><?php echo $r['course_status'] ?></td>
                          <td><?php echo $r['grade'] ?></td>
                      </tr>
                          <?php
                      }
                      ?>


                      </tbody>

                  </table>
              </div>
          </div>
          <div style="height: 26px"></div>
          <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Student Assignments Grades</h3>
              </div>
              <div class="card-body pt-0">
                  <table class="table table-bordered">
                      <thead>
                      <th width="30%">Student Name</th>
                      <th width="30%">Course Name</th>
                      <td width="2%">:</td>
                      <td>Assignment Grade</td>
                      </thead>
                      <tbody>
                      <?php

                      while ($r = $student_assignments->fetch_assoc()){
                          ?>
                          <tr>
                              <th width="30%"><?php echo $r['user_name'] ?></th>
                              <th width="30%"><?php echo $r['title'] ?></th>
                              <td width="2%">:</td>
                              <td><?php echo $r['grade'] ?></td>
                          </tr>
                          <?php
                      }
                      ?>


                      </tbody>

                  </table>
              </div>
          </div>

          <div style="height: 26px"></div>
          <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Uploaded Assignments</h3>
              </div>
              <div class="card-body pt-0">
                  <table class="table table-bordered">
                      <thead>
                      <th width="30%">Assignment Title</th>
                      <td width="2%">:</td>
                      <td>Status</td>
                      </thead>
                      <?php
                      while ($r = $uploaded_assignments->fetch_assoc()){
//                          var_dump($r);die;
                      ?>
                      <tr>
                          <th width="30%"><?php echo $r['title'] ?></th>
                          <td width="2%">:</td>
                          <td><a href="grade_students.php?assignment_id=<?php echo $r['assignment_id'] ?>">Grade Students</a></td>
                      </tr>
                      <?php
                      }
                      ?>

                  </table>
              </div>
              <div class="card-body pt-0">

                  <form action="app/upload_assignment.php" method="post" enctype="multipart/form-data">
                      <select name="course_id">
                          <option selected>Select Courses</option>
                          <?php
                          $sql = "SELECT *,u.id as user_id,u.role_id as user_role_id,CASE WHEN uc.status=0 THEN 'Withdrawn' WHEN uc.status = 1 THEN 'Enrolled' end as course_status FROM user as u INNER JOIN role as r on u.role_id=r.id
 INNER JOIN users_courses as uc on uc.user_id=u.id INNER JOIN course as c on c.id=uc.course_id WHERE u.id='".$user['userid']."' and r.id='".$user['role_id']."'";
                          $course_students = $connect->query($sql);
                          while ($rr = $course_students->fetch_assoc()){
                              ?>
                              <option value="<?php echo $rr['course_id'] ?>"><?php echo $rr['name'] ?></option>
                              <?php
                          }
                          ?>

                      </select>
                      <br>
                      <input type="hidden" name="user_id" value="<?php echo $user['userid'] ?>">
<!--                      <label>Upload Assignment</label>-->
                      <input name="assignment" type="file">
                      <input type="submit" value="upload " name="submit Assignment">
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
                          $sql = "SELECT *,u.id as user_id,u.role_id as user_role_id,CASE WHEN uc.status=0 THEN 'Withdrawn' WHEN uc.status = 1 THEN 'Enrolled' end as course_status FROM user as u INNER JOIN role as r on u.role_id=r.id
 INNER JOIN users_courses as uc on uc.user_id=u.id INNER JOIN course as c on c.id=uc.course_id WHERE u.id='".$user['userid']."' and r.id='".$user['role_id']."'";
                          $course_students = $connect->query($sql);
                          while ($rr = $course_students->fetch_assoc()){
                              ?>
                              <option value="<?php echo $rr['course_id'] ?>"><?php echo $rr['name'] ?></option>
                              <?php
                          }
                          ?>

                      </select>
                      <input type="hidden" name="user_id" value="<?php echo $user['userid'] ?>">
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
