// Botoes

var resetInputEmail = document.getElementById('resetInputEmail')
var resetUserButton = document.getElementById('resetUserButton')

// Resentando a senha so usuário

resetUserButton.addEventListener('click', function(){

    var auth = firebase.auth();
    var emailAddress = resetInputEmail;
    
    auth.sendPasswordResetEmail(emailAddress).then(function() {
      
        alert('E-mail enviado!')
        console.log('E-mail Enviado')

        window.localion.replace('index.html')

    }).catch(function(error) {

        var errorCode = error.code;
        var errorMessage = error.message;

        alert('Erro, verifique o console')
        console.log(error)
        console.log(errorMessage)
        console.log()

    });

})


