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

let fadeCarruselImg = [];

window.onload = function () {

    //FADE CARRUSEL START

    let fade = document.querySelector(".carrusel__imgs");
    let fadeCarruselImages= fade.getElementsByTagName("img");
    for (let i = 0; i < fadeCarruselImages.length; i++) {
        if(i>0){//Ignorar 1era imagen (Que es la que se muestra)
            fadeCarruselImg[fadeCarruselImg.length]=fadeCarruselImages[i].src;
            //console.log(fadeCarruselImages[i].src);
        }
    }
    //console.log(fadeCarruselImages);
    //console.log(fadeCarruselImg)

    //FADE CARRUSEL START

    setInterval(function(){
        fadeCarrusel();
    },7500);

    //Cambio de categorias

    var categorias = document.querySelectorAll(".productos__reales");

    var botones = document.querySelectorAll(".productos__header-producto-titulo");
    

    botones[0].addEventListener('click',  function(){

        categorias[0].style = "";
        categorias[1].style.display = "none";
    
        
    });

    botones[1].addEventListener('click',  function(){

        categorias[1].style = "";
        categorias[0].style.display = "none";
            
    });

    $(function () {

        $('.owl-carousel').owlCarousel({
            
            loop: true,
            nav: true,
            navText: ['<i class="fa-solid fa-caret-left"></i>', '<i class="fa-solid fa-caret-right"></i>'],
            autoplay:true,
            autoplayHoverPause: true,
            dots: false,
            responsive: {
                0: {
                   items: 1, 
                   margin: 10,
                   dotsEach: 2
                }, 
                768:{
                    items:3,
                    margin: 10
                   
                },
                1500: {
                    items: 5,
                    margin: 1
                }  
            }
        });
    });

    //CARRITO

    

}

//FADE CARRUSEL, Banners al inicio de la página

let i = 1;

function fadeCarrusel(){
    let fadeCarrusel = document.querySelector(".carrusel__imgs");
    let img = fadeCarrusel.getElementsByTagName("img")[0];
     //Escondo la imagen
    fadeCarrusel.className="fadeCarruselHidden";
        setTimeout(function(){
             //Cambio la imagen cuando esta escondida y cambio el id de vuelta para mostrar la img
            //img.src= "./img/fadecarrusel/"+fadeCarruselImg[i];
            img.src= fadeCarruselImg[i];
            fadeCarrusel.className="carrusel__imgs";
            i++;
            if(i==fadeCarruselImg.length){
                i=0;
            }
        },750); 
}


