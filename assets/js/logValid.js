// ========================
//  EXPORTANDO FUNÇÃO
//=========================

import { validaCampoEmail } from "./utils.js";

//puxando a variavel de formulario de login
const formularioLogin = document.getElementById("formularioLogin");

//evento de submit
formularioLogin.addEventListener("submit", function(e){
    e.preventDefault(); //impede do formulario ser enviado de forma automatica

    //campos dos usuarios
    const emailLog = document.getElementById("email").value;
    const senhaLog = document.getElementById("senha").value;
    let erro = document.getElementById("erro");

    //função que valida se o campo tá vazio ou não
    if(!validaCampoEmail(emailLog, "Campo Incirreto, Preencha para acessar a Página.", erro)) return;
    
    
})