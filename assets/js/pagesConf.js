// puxando o elemnto html que vai ser responsavel por exibir a data
const dataPages = document.getElementById("datePages");

const dataDay = new Date(); //puxa a data atual do momento

//formatdor do estilo de data longa
const formatador = Intl.DateTimeFormat("pt-BR", {
    month: "long",
    year: "numeric"
});

// escreve na tag escolhida para exibir este elemento
dataPages.innerHTML = formatador.format(dataDay);



