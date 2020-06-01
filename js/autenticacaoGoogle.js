//botoes

var btnLoginGoogle = document.getElementById('btnLoginGoogle')

//realizando login via google

googleSignIn=()=>{

    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
        
        console.log(result)
        console.log('Sucesso conta Google')

        window.location.replace('pagina-inicial.html');

      }).catch(function(error) {
        
        console.log(error)
        console.log('Erro de Acesso Google')

      });
}

