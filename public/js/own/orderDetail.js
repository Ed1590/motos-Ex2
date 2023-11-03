function detail($this){

    console.log($this)
   

    $.ajax({
        type: "GET",
        url: 'http://localhost:8000/ordenes/detail/'+ $this.dataset.id  ,       
        success: function(response)
        {
            $("#tb-detalle tbody").empty();
            for(obj of response.data){
                var row =  '<tr>'+
                                "<td><span>"+obj.name+"</span></td>"+
                                "<td><span>"+obj.counts+"</span></td>"+
                                "<td><span>"+obj.totalprice+"</span></td>"+
                            '</tr>'

                $("#tb-detalle tbody").append(row)
            }

        },
       error:function(error){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'hubo un error'
          })   
       }
   });

   
}