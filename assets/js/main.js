// puxando o elemnto html que vai ser responsavel por exibir a data

const data = document.getElementById("date");

const dataDay = new Date(); //puxa a data atual do momento

//formatdor do estilo de data 
const formatador = Intl.DateTimeFormat("pt-BR", {
    dateStyle: "long",
});

// escreve na tag escolhida para exibir este elemento
data.innerHTML = formatador.format(dataDay);