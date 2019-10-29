function sendback(user,roll){
	
	x=user;
	y=roll;
	console.log(x);
    console.log(y);
    reason = prompt("Enter reason for sending back.");
	$.ajax({
        type: "POST",
        url: "backend/sending.php",
        data: {
            //data goes here
            x,y,reason
        },
        success: function (data) {
            console.log(data);
            //data is returned here
            //alert('Application Rejected sent');
            filter($("#department").val(),$("#division").val());
            if (data == "sent") {
            	alert('message sent');
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