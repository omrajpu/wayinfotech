<div class="modal fade" id="myModal_<?php echo $row['id'];?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
       
      <div class="modal-body">
      <form action="stu_list.php" method="post">
       <h3 style="text-align:center;"> <b><?php echo getschoolUsingSchoolCode($row['school_code'],$conn)?></b></h3>
          <h4>Name: <?php echo $row['student_name'];?></h4>
          <h4>Class: <?php echo getClassName($row['admission_in_class']);?></h4>
          <h4>Roll No: <?php echo $row['roll_no'];?></h4>
          <h4>Acknowledge No: <?php echo $row['ack_no'];?></h4>
          <h4>Enrollment No: <?php echo $row['enroll_no'];?></h4>
          <br><br>
         
          <div class="divTable">
             <div class="headRow">
                <div class="divCell" align="center">Subjects</div>
                <div  class="divCell">THeory Marks</div>
                <div  class="divCell">Practical Marks</div>
             </div>
            
          <?php

           $getsubject = "select tbl_student_subject.subject_code,tbl_student.admission_in_class,
           tbl_subject.subjects from tbl_student_subject Inner join tbl_student on 
           tbl_student_subject.student_id = tbl_student.id Inner join tbl_subject on 
           tbl_student_subject.subject_code = tbl_subject.subject_code
           and tbl_student.id = '".$row['id']."'";

          $subresult = $conn->query($getsubject);
          $i=1;
          ?>
        
          <?php
         while($subject_row = $subresult->fetch_assoc())
         {
        
          $marks=getStudentmarksUsingStudentId($row['id'],$subject_row['subject_code'],$conn);
          ?>
         <div class="divRow">
                <div class="divCell"><?php echo $subject_row['subjects']?></div>
                <input type="hidden" name="stu_id" value="<?php echo $row['id'];?>">
                <input type="hidden" name="subject_id[]" value="<?php echo $subject_row['subject_code']?>">
                <div class="divCell"><input class="form-control" type="number" required name="theory[]" value="<?php echo $marks['theory']?>"></div>
                <div class="divCell"><input type="number" class="form-control" required name="practical[]" value="<?php echo $marks['practical']?>"></div>
        </div>
      
      
        <?php
         }
         ?>
        
        </div><br><br>
        
          

        </div>
        


        <div class="modal-footer">
        <button type="submit"  name="SaveMarks" class="btn btn-primary btn-lg" Value="SaveMarks">Save Marks</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
        </div>
		 </form>
      </div>
    </div>
  </div>