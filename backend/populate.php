<?php
include 'conn.php';
for ($i=0; $i <60 ; $i++) { 
    $sql = "INSERT INTO student (roll, name, sem, year, email, division, batch, department, caste, admission_type, photo) VALUES ('17CS20$i', 'Student$i', '4', 'TE', 'makarandrox@gmail.com', 'A', 'A3', 'CS', 'OPEN', 'REGULAR', 'makarand.png')";
    $result = $conn->query($sql);
    if($result){
        echo 'SUCCESS';
    }
    $sql = "INSERT INTO login VALUES ('17CS20$i', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'STUDENT')";
    $result = $conn->query($sql);
    if($result){
        echo 'SUCCESS2';
    }
}

    
    echo 'dddd';

?>