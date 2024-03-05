
n=500

var id = window.setInterval(function(){
    document.onmousemove = function(){
      n = 500
    };

    n--;
    console.log(n);
    if (n < -1) {
      
      location.href="php/cerrar_sesion.php";
    }
},1200);