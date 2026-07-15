// puxando o DOM do da página do perfil para fazer a validação
const formulario = document.getElementById("formValide");


// evento de validação
formulario.addEventListener("submit", function(e){

    e.preventDefault(); //impede o formulario de enviar automaticamente

    //captura os campos 
    const nomeForm = document.getElementById("nome").value;
    const emailForm = document.getElementById("email").value;
    
    

    //validação dos campos
    if(nomeForm.trim() === ""){
        alert ("Campo de nome está Invalido")
        return;
    }
    if(emailForm.trim() === ""){
        alert ("Campo de email está Invalido")
        return;
    }

    //alerta de campos preenchidos com sucesso
    location: "/crud/perfilUpadate.php"
    alert("Campos Preenchidos Corretamentes")
})