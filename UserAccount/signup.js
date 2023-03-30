window.onload = () => {
    const SignUpButton = document.getElementById('CreateAccounts')

    SignUpButton.onclick = () => {
        const form = document.forms['SignUpValidation'];
        const Name = form['Name'].value;
        const UserStatus = form['UserStatus'].value;
        const Email = form['Email'].value;
        const Password = form['Password'].value;
        const CPassword = form['CPassword'].value;
        const TNC = form['TNC'].checked;

        if(Name === '' ||UserStatus === '' ||Email === ''||Password === ''|| CPassword === ''|| !TNC ){
            alert('Fill all the form!')
            return false;
        }

        if(Name.length < 3){
            const Name = document.getElementById('Name');
            Name.innerText = 'Name must be 3 or more than 3 letters!'
            return false;
        }

        if(!Email.includes('@gmail.com')){
            alert('Email must inlcludes @gmail.com')
            return false;
        }

        if(Password.length > 10 ){
            alert('Password must be maximal 10 digits!')
            return false;
        }

        if(Password != CPassword){
            alert('Password Incorrect')
            return false;
        }

    form.submit();
    
    }
}