// ========================
//     funções - IMPORT
// ========================
import { validaCampo } from "./utils.js";
import { validaImagem } from "./utils.js";

// puxando o DOM do da página do perfil para fazer a validação
const formulario = document.getElementById("formValide");


// evento de validação perfil
formulario.addEventListener("submit", function (e) {
    e.preventDefault(); //impede o formulario de enviar automaticamente

    //captura os campos
    const nomeForm = document.getElementById("nome").value;
    const emailForm = document.getElementById("email").value;
    const imagemForm = document.getElementById("imagem").files[0];

    //validação dos campos se estão vazios
    if (!validaCampo(nomeForm, "Campo nome Inválido" , )) return;
    
    if (!validaCampo(emailForm, "Campo Email Inválido")) return;
    
    if(!validaImagem(imagemForm)) return;

    //envia o form validado pro php colocar no banco
    formulario.submit();
});



