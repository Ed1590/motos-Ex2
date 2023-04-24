

function addToCar(data){
  
    
    data.getAttribute("data-id")

    multiCant = document.getElementsByClassName("input-number") 
    breakCount = 0;
    reemplazo = 0;
  

    varname = "";
    varValor = "";
    arrayName = document.getElementsByClassName("class-name") 
    arrayvalor = document.getElementsByClassName("class-valor") 

    //obtener el name
    Array.from(arrayName).forEach(element => {
      if(element.getAttribute("data-id") == data.getAttribute("data-id")){
          if(element.innerText  != "" || element.innerText  != 0){{
            varname = element.innerText 
          

          }
        }
      }

    })
    //obtener el valor
    Array.from(arrayvalor).forEach(element => {
      if(element.getAttribute("data-id") == data.getAttribute("data-id")){
          if(element.innerText  != "" || element.innerText  != 0){{
            
            varValor = element.getAttribute("data-valor")
          

          }
        }
      }

    })



    Array.from(multiCant).forEach(element => {
        
        
        if(element.getAttribute("data-id") == data.getAttribute("data-id")){
            

            if(element.value != "" || element.value != 0){
                  Swal.fire({
                    icon: 'success',
                    title: 'Yeahh!',
                    text: 'Añadido Al carrito de compras'
                  })
                  breakCount = 1;

                  miStorage = window.localStorage;
                  myCar = miStorage.getItem('myCar');

                  valor = []

                  if(myCar == null){
                    
                    objJson ={}
                    objJson.id = data.getAttribute("data-id")
                    objJson.cantidad =  element.value 
                    objJson.name = varname
                    objJson.valor = varValor

                    valor.push(objJson)
                    valor = JSON.stringify(valor)
                    miStorage.setItem('myCar', valor);

                    

                  }else{
                    array = miStorage.getItem('myCar');
                    array = JSON.parse(array)

                    objJson ={}
                    objJson.id = data.getAttribute("data-id")
                    objJson.cantidad =  element.value 
                    objJson.name = varname
                    objJson.valor = varValor

                    Array.from(array).forEach(elemInter => {

                      if(elemInter.id == data.getAttribute("data-id")){
                        reemplazo = 1
                        elemInter.cantidad =  element.value 
                      }

                    })
                    if(reemplazo != 1){
                      array.push(objJson)
                    }
                    
                    array = JSON.stringify(array)
                    miStorage.setItem('myCar', array);

                   
                    

                  }

            }else{
                if(breakCount == 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El Valor no puede ser 0'
                      })               
                }
                
            }
        }

    });

}