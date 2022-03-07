    // alert ("Working!");

    const locationFromDB = document.getElementById("locationHolder").value;
    // const output = document.getElementById("output");
    alert(locationFromDB);

    // output.innerHTML = locationFromDB;
    document.getElementById("output").innerHTML = locationFromDB;

    $("#submit").click( function () {
        const imageInput = $("#image").val();

        if(imageInput == ''){  
            alert("Please Select Image");  
            return false;  
        }

        else{  
            var extension = $('#image').val().split('.').pop().toLowerCase();  
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
            {  
                    alert('Invalid Image File');  
                    $('#image').val('');  
                    return false;  
            }  
        }
    });
    
    