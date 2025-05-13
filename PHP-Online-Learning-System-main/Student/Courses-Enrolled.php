<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {
    
   if (isset($_GET['course_id'])) {
      include "../Controller/Student/EnrolledStudent.php";
      include "../Controller/Student/Course.php";
      $course_id = Validation::clean($_GET['course_id']);
      $course_id = Validation::clean($_GET['course_id']);
      $course_id = Validation::clean($_GET['course_id']);
      
    }else{
        $em = "Invalid course id ";
        Util::redirect("../Courses.php", "error", $em);
    }

    
      $chapters = getFirstChapterByCourseId($course_id);

      $topics = getFirstTopicByCourseId($course_id);

       $_chapter_id = $chapters['chapter_id'];
       $_topic_id = $topics['topic_id'];

     if(isset($_GET['chapter_id'])) {
      $_chapter_id = Validation::clean($_GET['chapter_id']);
     }
     if(isset($_GET['topic_id'])) {
      $_topic_id = Validation::clean($_GET['topic_id']);
     }

     $psag_exes = isPageExes($course_id, $_chapter_id, $_topic_id);
     if($psag_exes == 0){
         Util::redirect("../404.php", "error", "404");
     }

    $course = getById($course_id, $_chapter_id, $_topic_id);

    $student_id = $_SESSION['student_id'];
    $data = array($course_id, $student_id);
    $res = check_enrolled_student($data);

    if ($res == 0) {
      $em = "Invalid course id ";
      Util::redirect("Courses.php", "course_id", $course_id);
    }
    $progress = getStudentProgress($course_id, $student_id);
    if ($progress >= 100) {
      $progress = 100;
    }

    $all_chapters = count($course['chapters']);
    $chapter_val = (1 / $all_chapters) * 100;


    # Header
    $title = "EduPulse - ".$course['course']['title'];
    include "inc/Header.php";
?>
<head>
    <style>
        .l-side {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px;
        }

        .content-header {
            padding: 15px;
            margin-bottom: 20px;
            color: #fff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .content-header h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 500;
        }

        .chapter-item {
            background: transparent;
            border: none;
            margin-bottom: 15px;
            color: #fff;
        }

        .chapter-item span {
            display: block;
            font-weight: 500;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 5px;
        }

        .topics-list {
            margin-left: 15px;
            border-left: 2px solid rgba(255, 255, 255, 0.1);
        }

        .topic-item {
            padding: 8px 15px;
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        .topic-item a {
            color: rgba(255, 255, 255, 0.7) !important;
            text-decoration: none;
            display: block;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.3s ease;
            border: none !important;
            background: transparent !important;
        }

        .topic-item a:hover {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.05) !important;
            transform: translateX(5px);
        }

        .topic-item.active {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 4px;
        }

        .topic-item.active a {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.1) !important;
            border-left: 2px solid rgba(255, 255, 255, 0.3) !important;
        }

        .list-group-item {
            background: transparent;
            border: none;
        }

        #sideMenu {
            margin-top: 10px;
        }

        .badge-primary {
            background: transparent !important;
            box-shadow: none !important;
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .badge-primary:hover, 
        .badge-primary:focus {
            color: #fff !important;
        }

    </style>
</head>
<div class="container">
  <!-- NavBar & Profile-->
  <?php include "inc/NavBar.php";?>
  <div class="side-by-side mt-5">
    <div class="l-side shadow p-3">
      <div class="content-header">
        <h4>Course Content</h4>
      </div>
      <ul class="list-group content-menu" id="sideMenu">
        <?php $i=0; foreach($course['chapters'] as $chapter) { $i++; 
            if ($chapter['chapter_id'] == $_chapter_id) {
                $progress_plus = ($chapter_val*$i);
                $cureent =  $chapter_val *$i;
                if ($cureent >= $progress) {
                 updateStudentProgress($course_id, $student_id, $progress_plus);
                }
            }
            
        ?>
          <li class="list-group-item chapter-item">
            <span><?=$chapter['title']?></span>
            <ul class="topics-list">
              <?php
              
               foreach($course['topics'] as $topic) { 
                 if ($topic['chapter_id'] == $chapter['chapter_id']) {
                  if ($topic['topic_id'] == $_topic_id) { 
                    $chapter_title = $chapter['title'];
                    $topic_title = $topic['title'];
              ?>
               <li class="topic-item active">
                 <a href="Courses-Enrolled.php?course_id=<?=$course_id?>&chapter_id=<?=$topic['chapter_id']?>&topic_id=<?=$topic['topic_id']?>" class="btn badge-primary" style="color: #0D6EFD;" >
                  <b><?=$topic['title']?></b></a>
               </li>
               <?php }else { ?>
                <li class="topic-item <?=$topic['topic_id'] == $_topic_id ? 'active' : ''?>">
                    <a href="Courses-Enrolled.php?course_id=<?=$course_id?>&chapter_id=<?=$topic['chapter_id']?>&topic_id=<?=$topic['topic_id']?>">
                        <?=$topic['title']?>
                    </a>
                </li>
               <?php } } } ?>
             </ul>
           </li>
         <?php } ?>
          
        </ul>
    </div>
    <div class="r-side p-5 shadow">
      <h6><?=$course['course']['title']?></h6>
      <h6><?=$chapter_title?></h6><hr>  
      <h5><?=$topic_title?></h5>
        <div>
          <?php if (!empty($course['content']['data'])) {
            echo $course['content']['data'];
          }
           ?>
        </div>

        <div><br><hr>
        <h6>Progress</h6>
        <div class="progress mb-2">
            <div class="progress-bar" role="progressbar" style="width: <?=$progress?>%;" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100"><?=ceil($progress)?>%</div>
        </div>
        <?php if ($progress == 100) {?>
        <div class="text-center">
          <a class="btn btn-success" href="Action/generateCertificate.php?course_id=<?=$course['content']['course_id']?>">Get Certificate</a>
        </div>
        <?php }else { ?>
          <div class="text-center">
          <a class="btn btn-warning disabled" href="#">Get Certificate</a>
        </div>
        <?php } ?>
        
      </div><hr>
    </div>
  </div>
</div>
</div>
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>
<script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script>
      // Side Menu sideMenu
      $("#sideBtn").click(function(){
          $("#sideMenu").slideToggle();
      });

      $(document).ready(function(){
        // Toggle chapter content
        $('.chapter-item').click(function(e){
            if(!$(e.target).is('a')) {
                $(this).find('.topics-list').toggleClass('active');
                $(this).find('.chapter-toggle').toggleClass('active');
            }
        });

        // SideMenu toggle
        $("#sideBtn").click(function(){
            $("#sideMenu").slideToggle();
        });
        
        // Show active chapter's topics by default
        $('.topic-item.active').closest('.topics-list').addClass('active');
        $('.topic-item.active').closest('.chapter-item').find('.chapter-toggle').addClass('active');
    });

    $(document).ready(function(){
        // Toggle chapter content
        $('.chapter-item').click(function(e){
            if(!$(e.target).is('a')) {
                $(this).toggleClass('active');
                $(this).find('.topics-list').slideToggle(300);
            }
        });

        // Side menu toggle
        $("#sideBtn").click(function(){
            $(this).toggleClass('active');
            $("#sideMenu").slideToggle(300);
        });
        
        // Show active chapter by default
        $('.topic-item.active').closest('.chapter-item').addClass('active')
            .find('.topics-list').show();
    });
    </script>
<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>