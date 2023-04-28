function rem_error(inputid,errid)
{
    document.getElementById(errid).innerHTML="";
}
/*function checkpass(inputtxt)
{       
    var passw=/^[A-Za-z]\w{8,20}$/;
    if(inputtxt.value.match(passw))
    {
        document.getElementById('password').innerHTML="*Only characters,numeric digits,underscore & firts character must be a letter";
        return false;
    }
}*/
function chForm()
{
    var user=document.getElementById('user').value;
    var customer_name=document.getElementById('cname').value;
    var password=document.getElementById('pwd').value;
    var confirm_password=document.getElementById('cpwd').value;
    var mobile_no=document.getElementById('mob').value;
    var email=document.getElementById('emails').value;
    var addres=document.getElementById('addresss').value;
    var zcode=document.getElementById('zpwd').value;
   /* var gender1=document.getElementById('male').value;
    var gender2=document.getElementById('female').value;*/
   
    alert("hello");
    //username:
    if(user=="")
    {
        document.getElementById('username').innerHTML="*Please fill the username field";
        return false;
    }
    if((user.length<=2) || (user.length>20))
    {
        document.getElementById('username').innerHTML="*Name length must be between 2 and 20.";
        return false;
    }
    /*if(!isNaN(user))
    {
        document.getElementById('username').innerHTML="*Only characters are allowed";
        return false;
    }*/

    //customer name:
    if(customer_name=="")
    {
        document.getElementById('customername').innerHTML="*Please fill the customer name field";
        return false;
    }
    if((customer_name.length<=2) || (customer_name.length>20))
    {
        document.getElementById('customername').innerHTML="*Name length must be between 2 and 20.";
        return false;
    }
  

    //password
    if(password=="")
    {
        document.getElementById('password').innerHTML="*Please fill the password field";
        return false;
    }
    if((password.length<=8) || (password.length>20))
    {
        document.getElementById('password').innerHTML="*Password length must be between 8 and 20.";
        return false;
    }
   
    if(password!=confirm_password)
    {
        document.getElementById('password').innerHTML="*Password and Confirm Password are not matching";
        return false;
    }
    if(confirm_password=="")
    {
        document.getElementById('cpassword').innerHTML="*Please fill the confirm password field";
        return false;
    }

    //mobile no
    if(mobile_no=="")
    {
        document.getElementById('mobileno').innerHTML="*Please fill the mobile number field";
        return false;
    }
    if(isNaN(mobile_no))
    {
        document.getElementById('mobileno').innerHTML="Only digits,characters are not allowed";
        return false;
    }
    if(mobile_no.length!=10)
    {
        document.getElementById('mobileno').innerHTML="*Mobile Number must be 10 digits only";
        return false;
    }

    //email
    if(email=="")
    {
        document.getElementById('emailids').innerHTML="*Please fill the email field";
        return false;
    }
    if(email.indexOf('@')<=0)
    {
        document.getElementById('emailids').innerHTML="* @ invalid position";
        return false;
    }
    if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
    {
        document.getElementById('emailids').innerHTML="* . invalid position";
        return false;
    }
    
    //address
    if(addres=="")
    {
        document.getElementById('address').innerHTML="*Please fill the address field";
        return false;
    }

    //zipcode
    if(zcode=="")
    {
        document.getElementById('zipcode').innerHTML="*Please fill the zip field";
        return false;
    }
    if(isNaN(zcode))
    {
        document.getElementById('zipcode').innerHTML="*Only digits,characters are not allowed";
        return false;
    }

    //radio button
    /*if(!(gender1.checked) && !(gender2.checked))
    {
        document.getElementById('gender').innerHTML="*Please select atleast one option";
        return false;
    }*/
    
}