// ========================
//     funções - EXPORT
// ========================

//função de validação de campo
export function validaCampo(valor, mensagem){
    //verifica se esse campo tem algum dado e não tá vazio, se estiver vazio é false
    if(valor.trim() === ""){
        alert(mensagem)
        return false;
    }

    //se for true tem algum dado no campo
    return true;
}

//função de validação do campo imagem
export function validaImagem(imagem){
    if(!imagem){
        alert("selecione uma imagem")
        return false;
    }

    return true;
}

//função de validar campo de email login
export function validaCampoEmail(valor, mensagem, erro){ //idelemento é o elemento html que vai exibir a mensgem de erro

    

    //limpa a mensagem anterior a que será exibida
    if(elementoErro) elementoErro.textContent = "";

    //verificação dos campos
    if(valor.trim() === "" || valor.include('@')){
        if(elementoErro){
            elementoErro.textContent = mensagem;
        }
        return false;
    }
    
    return true;
}