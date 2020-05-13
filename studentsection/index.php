<?php include '../templates/header.php'; ?>
<?php include 'backend/onlyss.php'; ?>
<?php include 'backend/getdata.php'; ?>
<script src="js/form.js"></script>
<script src="js/approval.js"></script>
<script src="js/send.js"></script>
<script src="js/filter.js"></script>

<!-- Sidebar  -->
<?php include "sidebar.php" ?> 



<!-- Page Content  -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="navbar-toggler-icon"></i>
                <span>Toggle Sidebar</span>
            </button>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="navbar-toggler-icon"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Student Registration Portal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../backend/logout.php"><button
                                class="btn-sm btn btn-outline-primary">Logout</button></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        <form>
            <div class="form-row">
                <div class="col">
                    Department
                    <select onchange="filter(this.value,division.value)" class="custom-select my-1 mr-sm-2" id="department">
                        <option selected value="%">All</option>
                        <option value="IT">IT</option>
                        <option value="CS">CS</option>
                        <option value="EXTC">EXTC</option>
                    </select>
                </div>
                <div class="col">
                    Division
                    <select onchange="filter(department.value,this.value)" class="custom-select my-1 mr-sm-2" id="division">
                        <option selected value="%">All</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
    
                    </select>
                </div>
            </div>
        </form>
        <br>
        <table class="table table-striped">
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
                    $rows=getunapproved($_SESSION['username']) ;
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
                        <form action="viewing.php" method="post">
                            <button type="submit" class="btn btn-info " id="<?=$row['roll_num']?>"
                                name="form_view">View</button>
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
        </table>
    </div>

</div>




<?php include '../templates/footer.html'; ?>