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