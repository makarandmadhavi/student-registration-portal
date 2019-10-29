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
                
                
                if (data == "SS") {
                    alert("Approved!");
                    filter($("#department").val(),$("#division").val());
                }
                else {
                    alert("Error");
                }
                
            }
        });
    
}

function filter(department,division) {
    //roll = button_id;
   
    console.log(department);
    console.log(division);

        $.ajax({
            type: "POST",
            url: "backend/filter_ajax.php",
            data: {
                //data goes here
                department,
                division,
            },
            success: function (data) {
                //data is returned here
                //console.log(data);
                $('table').html(data);
               
            }
        });
    
}
