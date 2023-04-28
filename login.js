function rem_error(inputid,errid)
{
    document.getElementById(errid).innerHTML="";
}
        function valForm()
        {
            var user=document.getElementById('name').value;
            var passw=document.getElementById('pass').value;

            if(user.length<6)
            {
                document.getElementById('uname').innerHTML="*Name length must grater than 6 characters";
                return false;
            }
            if(user=="")
            {
                document.getElementById('uname').innerHTML="*Name can't be blank";
                return false;
            }

            
            if(passw.length<8)
            {
                document.getElementById('password').innerHTML="*Password length must be grater than 8 characters";
                return false;   
            }
            
        }
       