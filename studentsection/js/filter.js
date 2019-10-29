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