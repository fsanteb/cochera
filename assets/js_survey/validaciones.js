    const form = document.getElementById('form');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const fechai = document.getElementById('fechai');

    const password = document.getElementById('password');
    const cpassword = document.getElementById('cpassword');
    // add event
    form.addEventListener('submit',(event)=>{
        event.preventDefault();
        validate();
    })

    const sendData = (usernameVal, sRate, count) =>{
        if(sRate === count){
            //alert('registration seccessfull');
            Swal.fire(
                    'Bien hecho! '+usernameVal,
                    'No debes dejar ninguna pregunta sin contestar',
                    'success'
                    );
                   // location.href = `index2.html?username=${username}`
        }
    }

    //for final data validation
    const successMsg = (usernameVal) => {
        let formCon = document.getElementsByClassName('form-control');
        var count = formCon.length - 1;
        for( var i = 0; i < formCon.length; i++){
            if(formCon[i].className === "form-control success"){
                var sRate = 0 + i;
                console.log(sRate);
                sendData(usernameVal, sRate, count);
            }else{
                return false;
            }
        }
    }



    //more email validate
    const isEmail = (emailVal) =>{
        var atSymbol = emailVal.indexOf("@");
        if (atSymbol < 1) return false;
        var dot = emailVal.lastIndexOf('.');
        if (dot < atSymbol + 2) return false;
        if (dot === emailVal.length -1) return false;
        return true;
    }

    // define the calidate function
        const validate = () => {
        const usernameVal = username.value.trim();
        const emailVal = email.value.trim();
        const phoneVal = phone.value.trim();
        const fechaiVal = fechai.value.trim();


        const passwordVal = password.value.trim();
        const cpasswordVal = cpassword.value.trim();



        // validate username
        if(usernameVal === ""){
            setErrorMsg(username, 'No puede dejar en blanco el campo');
        } else if (usernameVal.length < 2) {
            setErrorMsg(username, 'Minimo debe poner 3 caracteres');
        } else {
            setSuccessMsg(username);
        }
        // validate email
        if(emailVal === ""){
            setErrorMsg(email, 'No puede dejarlo en blanco el campo email');
        } else if (!isEmail(emailVal)) {
            setErrorMsg(emailVal, 'El email no es invalido');
        } else {
            setSuccessMsg(email);
        }

        // validate phone
        if(phoneVal === ""){
            setErrorMsg(phone, 'No puede dejarlo en blanco el campo telefono');
        } else if (phoneVal.length !== 9) {
            setErrorMsg(phone, 'El celular debe tener 9 números');
        } else {
            setSuccessMsg(phone);
        }

        // validate date
        if(fechaiVal === ""){
            setErrorMsg(fechai, 'No puede dejarlo en blanco el campo fecha de ingreso');
        } else {
            setSuccessMsg(fechai);
        }
        // validate contraseña
        if(passwordVal === ""){
            setErrorMsg(password, 'No puede dejarlo en blanco el campo contraseña');
        } else if (passwordVal.length < 6) {
            setErrorMsg(password, 'La contraseña debe tener como minimo 6');
        } else {
            setSuccessMsg(password);
        }
        // validate Ccontraseña
        if(cpasswordVal === ""){
            setErrorMsg(cpassword, 'No puede dejarlo en blanco el campo confirmación de la contraseña');
        } else if (cpasswordVal !==  passwordVal) {
            setErrorMsg(cpassword, 'La contraseña no concuerdan');
        } else if (cpasswordVal.length < 6) {
            setErrorMsg(cpassword, 'La contraseña debe tener como minimo 6');
        } else {
            setSuccessMsg(cpassword);
        }
    
        successMsg(usernameVal);


    }
    
    function setErrorMsg(input, errormsgs){
        const formControl =input.parentElement;
        const small = formControl.querySelector('small');
        formControl.className = "form-control error"; 
        small.innerText =errormsgs;
    }
    function setSuccessMsg(input){
        const formControl =input.parentElement;
        formControl.className = "form-control success"; 
    }
    
