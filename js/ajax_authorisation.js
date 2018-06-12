$("#authorisation_form").submit(function(event){
    event.preventDefault();
    $.ajax({
        url: "authorisation.php",
        type: "POST",
        data: $(this).serialize(),
        dataType: "html",
        processData: false,
        success: function(response){
            result = $.parseJSON(response);
            if (result.EmptyFields){
                $("#result_form").html(result.EmptyFields);
            }else if(result.Error){
                $("#result_form").html(result.Error);
            }else{
                $(location).attr("href", "hello_user.php?name=" + result.name);
            }
        },
        error:  function(xhr, str){
            alert("Error: " + xhr.responseCode);
        }
    });
});
