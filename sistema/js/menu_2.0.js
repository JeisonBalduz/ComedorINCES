let listElements = document.querySelectorAll('.list__button--click');

listElements.forEach(listElement => {
    listElement.addEventListener('click', ()=>{
        
        listElement.classList.toggle('arrow');

        let height = 0;
        let menu = listElement.nextElementSibling;
        if(menu.clientHeight == "0"){
            height=menu.scrollHeight;
        }

        menu.style.height = `${height}px`;

    })
});

// aparecer el menu cuando se pone tipo tablet o telefono
document.getElementById("menu2").addEventListener("click", saludar);

var cuadra = document.getElementById("menu_todo");

function saludar(){

   cuadra.classList.toggle("menu2_java");

   
}