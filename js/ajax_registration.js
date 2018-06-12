$("#registration_form").submit(function(event){
    event.preventDefault();
    $.ajax({
        url: "registration.php",
        type: "POST",
        data: $(this).serialize(),
        dataType: "html",
        processData: false,
        success: function(response){
            result = $.parseJSON(response);
            if (result.EmptyFields){
                $("#result_form").html(result.EmptyFields);
            }else if(result.LoginError){
                $("#result_form").html(result.LoginError); 
            }else if(result.EmailError){
                $("#result_form").html(result.EmailError);
            }else if(result.PasswordError){
                $("#result_form").html(result.PasswordError);
            }else if(result.Success){
                $("#result_form").html(result.Success);
            }
        },
        error:  function(xhr, str){
            alert("Error: " + xhr.responseCode);
        }
    });
});
