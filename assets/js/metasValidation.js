// ========================
//     funções - IMPORT
// ========================
import { validaCampo, validaImagem } from "./utils.js";

//formulario de validação do metas
const formularioM = document.getElementById('formMetas');

//evento de validação metas

formularioM.addEventListener("submit", function (e){
    e.preventDefault(); //impede o formulario de ser enviado automticamente

    //capturando os campos do formulario de metas
    const nomeM = document.getElementById('nomeM').value;
    const descricaoM = document.getElementById('descricao').value;
    const dataM = document.getElementById('data').value;


    //laço que vai garantir que o campo não esteja vazio
    if(!validaCampo(nomeM, "Campo Nome da Meta Inválido!")) return;
    if(!validaCampo(descricaoM, "Campo Descrição da Meta Inválido!")) return;
    if(!validaCampo(dataM, "Campo Data da Meta Inválido!")) return;
    
    //envia o formulario caso os campos estão preenchidos corretamente
    formularioM.submit();
})