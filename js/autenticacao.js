//Botoes

var btnLogin = document.getElementById('btnLogin');
var inputEmail = document.getElementById('inputEmail');
var inputPassword = document.getElementById('inputPassword');
var createUserButton = document.getElementById('createUserButton')

//Inputs

var exampleInputEmail = document.getElementById('exampleInputEmail')
var exampleInputPassword = document.getElementById('exampleInputPassword')

//criando um novo usuário
/*
createUserButton.addEventListener('click', function(){
    firebase
        .auth()
        .createUserWithEmailAndPassword(exampleInputEmail.value, exampleInputPassword.value)
        .then(function(){
            alert('Bem vindo ' + exampleInputEmail.value);
        })
        .catch(function(error){
            console.error(error.code);
            console.error(error.message);
            alert('Falha ao cadastrar!!')
        })
})
*/
//acessando usuário usando e-mail e senha

btnLogin.addEventListener('click', function() {

    firebase.auth().signInWithEmailAndPassword(inputEmail.value, inputPassword.value).then(function (result){

        alert("Usuário Conectado! bem vindo " + inputEmail.value);
        console.log("Sucesso!")

        window.location.replace('pagina-inicial.html');

    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...

        alert(errorMessage);
        console.log("Falha!")

      });    

});
