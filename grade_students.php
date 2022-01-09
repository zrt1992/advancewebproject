<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__.'/app/dependencies.php';
include __DIR__.'/app/login_status.php';


$connect = db_connect();
$user=getuser();
$sql ="SELECT * FROM user WHERE id in (SELECT user_id FROM `users_assignments` WHERE assignment_id='".$_REQUEST['assignment_id']."')";
$assignment_users = $connect->query($sql);
//echo($sql);die;
$sql ="SELECT * FROM  assignment where id='".$_REQUEST['assignment_id']."'";
//echo($sql);die;
$result = $connect->query($sql);
$assignment= $result->fetch_assoc();
//var_dump($result);die;

if($user['roll']=="teacher") {

}


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
                <h1>Assign Grades for <?php echo $assignment['title'];?>  </h1>
<!--                <p>--><?php //echo $assignment['title'];?><!--</p>-->
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
<!--                            <div class="col-lg-4">-->
<!--                                <div class="card shadow-sm">-->
<!--                                    <div class="card-header bg-transparent text-center">-->
<!--                                        <img class="profile_img" src="--><?php //echo url().$user['profile_pic']?><!--" alt="student dp">-->
<!--                                        <h3>--><?php //echo $user['user_name'] ?><!--</h3>-->
<!--                                    </div>-->
<!--                                    <div class="card-body">-->
<!--                                        <p class="mb-0"><strong class="pr-1">Student ID:</strong>--><?php //echo $user['user_id'] ?><!--</p>-->
<!--                                        <p class="mb-0"><strong class="pr-1">Class:</strong>--><?php //echo $user['academic_year'] ?><!--</p>-->
<!--                                        <p class="mb-0"><strong class="pr-1">Section:</strong>--><?php //echo $user['blood_group'] ?><!--</p>-->
<!--                                        <form action="app/profile_pic.php" method="post" enctype="multipart/form-data">-->
<!--                                            <input type="hidden" name="userid" value="--><?php //echo $user['userid'];?><!--">-->
<!--                                            <div class="edit-profile">-->
<!--                                                <form>-->
<!--                                                    <input name="profile_pic" type="file">-->
<!--                                                    <input type="submit" value="update picture">-->
<!--                                                </form>-->
<!--                                            </div>-->
<!--                                        </form>-->
<!---->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-lg-12">

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
                                            <td>Grade</td>
                                            </thead>
                                            <tbody>
                                            <form action="app/grade_assignment.php" method="post">
                                                <input type="hidden" name="assignment_id" value="<?php echo $assignment['id'];?>">
                                            <?php

                                            while ($r = $assignment_users->fetch_assoc()){
                                                ?>
                                                <tr>

                                                        <th width="30%"><?php echo $r['name'] ?></th>
                                                        <td width="2%">:</td>
                                                        <td>
<!--                                                            <input value="lk" type="text" name="data[--><?php //echo $r['id'] ?><!--]">-->
                                                        <select name="data[<?php echo $r['id'] ?>]">
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                            <option value="D">D</option>
                                                            <option value="E">E</option>
                                                            <option value="F">F</option>
                                                        </select>
                                                        </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>


                                            </tbody>

                                        </table>
                                        <input type="submit" value="Submit Grades">
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
