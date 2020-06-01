//botoes

var createUserButton = document.getElementById('createUserButton')

//Inputs

var exampleInputEmail = document.getElementById('exampleInputEmail')
var exampleInputPassword = document.getElementById('exampleInputPassword')

//criando usuario com email e senha

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
   