const tooggle = document.getElementById('toggleTheme'); //capturo o butão
const body = document.body; //cabturo todo o corpo de cada arquivo do sistema

// tema do navegador
const temasalvo = localStorage.getItem("theme"); //guarda na memoria do navegador o tema 

if(temasalvo === "dark"){
    body.classList.add("dark"); //atribui o tema escuro no localstorage
} 

// verifica se o botão de troca de cor existe na página
if(tooggle){ 
    //evento para quando o usuario clicar na página
    tooggle.addEventListener('click' , ()=>{
    
    // O toggle() funciona como um interruptor:
    // Se a classe dark não existe, ele adiciona.
    // Se a classe dark já existe, ele remove.
        body.classList.toggle('dark'); //

    // se o thema salvo for claro ele executa o drk
    if(body.classList.contains('dark')){
        localStorage.setItem('theme' , 'dark')
    }
    // se o tema for escuro ele executa o claro
    else{
        localStorage.setItem('theme' , 'light')
    }
})
}
