
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

    if($("#input-name").val() == "" || $("#input-name").val() == 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El Valor no puede ser 0'
          })     
    }else{
        if($("#input-lastName").val() == "" || $("#input-lastName").val() == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El Valor no puede ser 0'
              })     
        }else{
            if($("#input-address").val() == "" || $("#input-address").val() == 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El Valor no puede ser 0'
                  })     
            }else{
                if($("#input-email").val() == "" || $("#input-email").val() == 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El Valor no puede ser 0'
                      })     
                }else{
                    
                    var _token = $("._token").val();    
                    array = miStorage.getItem('myCar');

                    $.ajax({
                        type:"POST",
                        url: element.delegateTarget.action ,
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        headers: {'X-CSRF-TOKEN':_token},
                        data : JSON.stringify({ 
                            name:$("#input-name").val(),
                            lastName:$("#input-lastName").val(),
                            address:$("#input-address").val(),
                            email:$("#input-email").val(),
                            myCar: array
                
                            }),
                        success:function(response){
                            Swal.fire({
                                icon: 'success',
                                title: 'Yeahh!',
                                text: 'realizada la compra'
                              })
                              response
                              
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'hubo un error'
                              })   
                        },
                        failure: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'hubo un error'
                              })   
                        },
                        timeout:10000
                        })
                }   
            }   
        }   
    }

  

    
   
        

    })

})
