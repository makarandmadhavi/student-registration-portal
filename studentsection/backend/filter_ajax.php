<?php

$department = $_POST['department'];
$division = $_POST['division'];
include '../../backend/conn.php';

    $data=array();
    $sql = "SELECT 
            case when ROW_NUMBER() over (PARTITION BY documents_submitted.roll order by documents_submitted.name)=1 
            then documents_submitted.roll else '' end as 'roll_num',

            case when ROW_NUMBER() over (PARTITION BY student.name order by documents_submitted.name)=1 
            then student.name else '' end as 'student_name',
            
            case when ROW_NUMBER() over (PARTITION BY student.name order by documents_submitted.name)=1 
            then student.department else '' end as 'department',

            case when ROW_NUMBER() over (PARTITION BY student.name order by documents_submitted.name)=1 
            then student.division else '' end as 'division',
            
            case when ROW_NUMBER() over (PARTITION BY documents_submitted.roll order by documents_submitted.name)=1 
            then approval.stud_section else '' end as 'ssapp',

           
            
            documents_submitted.name,documents_submitted.doc_url,approval.stud_section FROM documents_submitted,student,approval WHERE
            documents_submitted.roll=student.roll
            AND documents_submitted.roll=approval.roll
            AND division LIKE '$division'
            AND department LIKE '$department'
           
            ";
        $result = $conn->query($sql);  
        while ($row = $result -> fetch_assoc()){  
            if($row['stud_section']=="" ){       
                array_push($data, $row);
            }
        
        }

        //print_r($data);
        $rows = $data;
        $_SESSION['username']='ss';
?>


<thead class="thead-dark">
    <tr>
        <th scope="col">Roll Number</th>
        <th scope="col">Name</th>
        <th scope="col">Department</th>
        <th scope="col">Division</th>
        <th scope="col">Documents</th>
        <th scope="col">Form</th>
        <th scope="col">Actions</th>


    </tr>
</thead>
<tbody>
    <tr>

        <?php 
                    //$rows=getunapproved($_SESSION['username']) ;
                    //print_r($rows[0]);
                    foreach($rows as $row){?>
        <th scope="row"><?=$row['roll_num']?></th>
        <td><?=$row['student_name']?></td>
        <td><?=$row['department']?></td>
        <td><?=$row['division']?></td>

        <td>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action">
                    <a target="_blank" href="<?=$row['doc_url']?>"><?=$row['name']?> </a>
                </button>

            </div>
        </td>

        <?php
                    if($row['roll_num']!=""){?>
       
            <td>
            <form action="viewing.php" method="POST">
                <button type="submit" class="btn btn-info " id="<?=$row['roll_num']?>" name="form_view">View</button>
                <input type="hidden" value="<?=$row['roll_num']?>" name="input2" />
            </form>
            </td>
            
        <?php } 
                    else{ ?>
        <td></td>
        <?php }
                    ?>

        <?php
                    if($row['roll_num']!=""){?>
        <td>
            <div class="container">
                <button class="btn btn-success" name="<?=$_SESSION['username']?>" id="<?=$row['roll_num']?>"
                    onclick="approving(this.id,this.name)">Approve</button>

            </div>
            <div class="container" style="margin-top: 5%">
                <button class="btn btn-danger" id="<?=$_SESSION['username']?>" name="<?=$row['roll_num']?>"
                    onclick="sendback(this.id,this.name)">Send Back</button>
            </div>
        </td>
        <?php } 
                else{ ?>
        <td></td>
        <?php }
                ?>

    </tr>
    <?php }?>


</tbody>