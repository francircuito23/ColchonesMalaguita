window.onload = () => {

    var cont = 0;

    let cambiarImg = setInterval(() =>{

        cont = cont % 4;

        if (cont==0){

            document.querySelector(".carrusel__img-1").src="../img/colchon1.jpg";

        }

        else if(cont==1){

            document.querySelector(".carrusel__img-1").src="../img/colchon2.jpg";

        }

        else if(cont==2){

            document.querySelector(".carrusel__img-1").src="../img/colchon3.webp";

        }

        else if(cont==3){

            document.querySelector(".carrusel__img-1").src="../img/matelas-hastens-800x312.png";

        }

        cont++;

    }, 2000);
    
}