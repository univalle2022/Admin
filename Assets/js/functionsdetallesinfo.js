
var idproducto='';
    var btneditrol=Array.apply(null, document.querySelectorAll(".btndetalle"));
  
    btneditrol.forEach(function(btneditrol){
        btneditrol.addEventListener("click",function(){
           
            idproducto = btneditrol.getAttribute("rl");
            console.log(idproducto);
        });
    });



export function area(){
    return idproducto;
}

