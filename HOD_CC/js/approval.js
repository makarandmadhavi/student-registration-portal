function approving(roll,name) {
    rollnum =roll;
    user=name;
    console.log(rollnum);
    console.log(user);

        $.ajax({
            type: "POST",
            url: "backend/approving.php",
            data: {
                //data goes here
                rollnum,
                user
            },
            success: function (data) {
                console.log(data);
                if (data == "HOD") {
                    alert("Approved by hod!! ");
                    $("table").load("index.php table");
                } 
                if (data == "CC") {
                    alert("Approved by CC!!");
                    $("table").load("index.php table");
                } 
                
            }
        });
    
}

