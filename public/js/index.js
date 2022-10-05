
(()=>{

    const months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    let fechaActual = new Date();
    const graphOne = document.querySelector('#irradianciaDate');
    const newChild = document.createElement('p');
    newChild.textContent = `Fecha actual: ${fechaActual.getDate()}-${months[fechaActual.getMonth()]}-${fechaActual.getFullYear()}`;
    graphOne.appendChild(newChild);

    const graphTwo = document.querySelector('#temperatureDate');
    const newChild2 = document.createElement('p');
    newChild2.textContent = `Fecha actual: ${fechaActual.getDate()}-${months[fechaActual.getMonth()]}-${fechaActual.getFullYear()}`;
    graphTwo.appendChild(newChild2);

    var textoAnimado = document.querySelector(".animated");
    var texto = textoAnimado.innerHTML;
    textoAnimado.innerHTML = '';
    var speed = 100;
    var i = 0;
    function typeWriter(){
        if(i < texto.length){
            textoAnimado.innerHTML += texto.charAt(i);
            i++;
            setTimeout(typeWriter, speed)
        }
    }
    setTimeout(typeWriter, speed);
})();