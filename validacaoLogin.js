//validação dos campos de login e senha

function validacaoFormLogin() {
    let email = document.getElementById('email').value;
    let senha = document.getElementById('senha').value;

    if (email.trim() === '') {
        alert('Digite seu email.');
        return false;
    }

    if (senha.trim() === '') {
        alert('Digite sua senha.');
        return false;
    }

    return true;
}
