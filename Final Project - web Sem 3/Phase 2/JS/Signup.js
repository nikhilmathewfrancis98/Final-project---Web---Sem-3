// Function name

function check_name(name,id){
var err = document.getElementById(id);  

var n1 = document.getElementById(name);
    var errformat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
    var errfmt = /^[6-9]\d{9}$/;
    if (errformat.test(n1.value)){
        if (errfmt.test(n1.value)){
            err.style.display = "block";
            document.getElementById('btn').disabled = true;
        }
        err.style.display = "block";
        document.getElementById('btn').disabled = true;
    }
    else{
        err.style.display = "none";
        document.getElementById('btn').disabled = false;
    }
    }

//  Function Phone

function check_phone(id, error_msg) {

    var Phone = document.getElementById(id);
    var error = document.getElementById(error_msg);
    var phonePatt = /^[6-9]\d{9}$/;
    //alert(Phone.value);
    if (phonePatt.test(Phone.value)) {
        error.style.display = "none";
        document.getElementById('btn').disabled = false;

    }
    else { //alert(error.id);
        error.style.display = "block";
        document.getElementById('btn').disabled = true;
        Phone.focus();

    }
    
}

        // Function Email


       function ValidateEmail(mail,err_msg) {
       var mail_id = document.getElementById(mail);
       var error = document.getElementById(err_msg);
       var pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           if (pattern.test(mail_id .value)) {
           error.style.display = "none";
               document.getElementById('btn').disabled = false;
    }
    else {
            error.style.display = "block";
               document.getElementById('btn').disabled = true;
           mail_id.focus();

}
   }




    // Function Password

function ValidatePsswd(id,err_mssge){
        let value = document.getElementById(id);
    let error = document.getElementById(err_mssge);
    let passdformat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

    if (passdformat.test(value.value)) {

        if (value.value<6) {
            error.style.display = "block";
            document.getElementById('btn').disabled = true;
            value.focus();

        } else {
            error.style.display = "none";
            document.getElementById('btn').disabled = false;
            
        }
        error.style.display = "none";
    } else{

        error.style.display = "block";
        document.getElementById('btn').disabled = true;
        value.focus();


    }

}
