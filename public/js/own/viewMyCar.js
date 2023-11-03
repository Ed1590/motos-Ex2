
function limpiarCarro(){
    window.localStorage.removeItem('myCar');
    window.location.reload()
}

$(function(){

miStorage = window.localStorage;
array = miStorage.getItem('myCar');
array = JSON.parse(array)

Array.from(array).forEach(elemInter => {
    $("#table").append("<tr>"+
                            "<td>"+elemInter.name+"</td>"+
                            "<td>"+elemInter.cantidad+"</td>"+
                            "<td>"+ new Intl.NumberFormat('de-DE').format(elemInter.valor)+"</td>"+
                            "<td>"+ new Intl.NumberFormat('de-DE').format( elemInter.valor * elemInter.cantidad)+"</td>"+
                        "</tr>");
})



$("#form-comprar").on('click','.comprar', function(element){

    inputs = document.getElementsByClassName("inputVenta")
    var vacio = false ;

    for (var i = 0; i < inputs.length -1 ; i++) {
        if(inputs[i].value ==''){
            inputs[i].focus()
            vacio = true;
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'No Pueden Haber Campos Vacios'
            })   
            break;
        }
      }

    
                    
    var _token = $("._token").val();    
    array = miStorage.getItem('myCar');
        if (vacio == false){
            
  
            fetch($("#form-comprar")[0].action, {
                method: "POST",
                body: JSON.stringify({
                    name:$("#input-name").val(),
                    lastName:$("#input-lastName").val(),
                    address:$("#input-address").val(),
                    email:$("#input-email").val(),
                    myCar: array
              }),
                headers: {
                  "Content-type": "application/json; charset=UTF-8",
                  'X-CSRF-TOKEN':_token
                },
              })
              .then((response) =>{
                
                if (response.status == 200) {
                  
                Swal.fire({
                  icon: 'success',
                 
                  text: "Se Guardo Con Exito"
                  })
                }else{
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'hubo un error'
                  })   
                }
        
        
            })
    
   
        
        }
    })

})
