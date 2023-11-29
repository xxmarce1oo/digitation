//validacao dos campos de registro

function validarRegistro() {
    let nome = document.getElementById("nome").value;
    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    if (nome.trim() === '') {
        alert("Digite o nome de usuário.");
        return false;
    }

    if (email.trim() === '') {
        alert("Digite o email.");
        return false;
    }

    if (senha.trim() === '') {
        alert("Digite a senha.");
        return false;
    }

    if (confirmPassword.trim() === '') {
        alert("Confirme a senha.");
        return false;
    }

    if (senha !== confirmPassword) {
        alert("As senhas não coincidem.");
        return false;
    }

    return true;
}
