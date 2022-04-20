// window.onload = () => {

//     var cont = 0;

//     let cambiarImg = setInterval(() =>{

//         cont = cont % 4;

//         if (cont==0){

//             document.querySelector(".carrusel__img-1").src="../img/colchon1.jpg";

//         }

//         else if(cont==1){

//             document.querySelector(".carrusel__img-1").src="../img/colchon2.jpg";

//         }

//         else if(cont==2){

//             document.querySelector(".carrusel__img-1").src="../img/colchon3.webp";

//         }

//         else if(cont==3){

//             document.querySelector(".carrusel__img-1").src="../img/matelas-hastens-800x312.png";

//         }

//         cont++;

//     }, 2000);
    
// }

window.onload = function () {

    //FADE CARRUSEL START

    setInterval(function(){
    fadeCarrusel();
    },4000);

}   


//FADE CARRUSEL, Banners al inicio de la pÃ¡gina

let fadeCarruselImg = ["matelas-hastens-800x312.png","colchon1.jpg","colchon2.jpg","colchon3.webp"];

let i = 1;


function fadeCarrusel(){
    let fadeCarrusel = document.querySelector(".carrusel__imgs");
    let img = fadeCarrusel.getElementsByTagName("img")[0];
    //Escondo la imagen
    fadeCarrusel.className="fadeCarruselHidden";
    
    setTimeout(function(){
        //Cambio la imagen cuando esta escondida y cambio el id de vuelta para mostrar la img
        img.src= "../img/"+fadeCarruselImg[i];
        fadeCarrusel.className="carrusel__imgs";
        i++;
        //para que se pare (reinicie) una vez que recorra el array
        if(i==fadeCarruselImg.length){
            i=0;
        }
    },1000);
}