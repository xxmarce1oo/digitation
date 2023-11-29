//script responsável pelo funcionamento do jogo 

let palavras = ["programação", "computador", "linguagem", "terminal", "imagem",
"internet", "navegador", "windows", "linux", "desenvolvedor", "desenvolvimento",
"javascript", "treinamento", "digitação", "web", "professor", "aluno", "escola", "faculdade",
"trabalho", "docente", "projeto", "ensino", "docente", "análise", "usuário", "docente", "discente",
"programador", "notebook", "processador", "processamento", "computacional", "memória", "informação", "segurança",
"compilador", "interface", "algoritmo", "firewall", "criptografia", "software", "hardware", "debugging",
"framework", "nuvem", "data", "dados", "cibersegurança", "automação", "processos", "relacional", "responsividade", "alex",
"framework", "nuvem", "data", "dados", "cibersegurança", "automação", "processos", "relacional", "responsividade",
"bug", "vírus", "ransomware", "database", "git", "navegação", "orientação", "digitalização"];


let palavraAtual = "";
let pontos = 0;


function pegaPalavraAleatoria() {
  return palavras[Math.floor(Math.random() * palavras.length)];
}


function mostraPalavra() {
  palavraAtual = pegaPalavraAleatoria();
  let areaDisplay = document.getElementById("displayPalavra");
  areaDisplay.textContent = palavraAtual;
}


function checkInput() {
  let campoInput = document.getElementById("campoInput");
  let usuarioInput = campoInput.value;

  for (let i = 0; i < usuarioInput.length; i++) {
    if (usuarioInput[i] !== palavraAtual[i]) {
      campoInput.value = usuarioInput.substring(0, i); 
      gameOver(); 
      campoInput.value = "";
      return; 
    }
  }

  if (usuarioInput === palavraAtual) {
    campoInput.value = "";
    pontos++;
    mostraPalavra();
    mostraPontos();
  }
}


function mostraPontos() {
  let pontuacao = document.getElementById("pontuacaoAtual");
  pontuacao.textContent = "Pontuação: " + pontos;
}



function gameOver() {
  alert("Incorreto! Fim de jogo. Pontuação: " + pontos);

  let xhr = new XMLHttpRequest(); //requisição para enviar dados para salvaPontos.php
  xhr.open("POST", "salvaPontos.php", true); 
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      console.log(xhr.responseText); 
    }
  };
  xhr.send("pontuacao=" + pontos);

  pontos = 0;
  mostraPalavra();
  mostraPontos();
  mostraRestartButton();
}


function restartGame() {
  mostraPalavra();
  mostraPontos();
}


function mostraRestartButton() {
  var restartButton = document.getElementById("restart-button");
  restartButton.style.display = "block";
}


let campoInput = document.getElementById("campoInput");
campoInput.addEventListener("input", checkInput);


let restartButton = document.getElementById("restart-button");
restartButton.addEventListener("click", restartGame);

mostraPalavra();
mostraPontos();
mostraRestartButton();
