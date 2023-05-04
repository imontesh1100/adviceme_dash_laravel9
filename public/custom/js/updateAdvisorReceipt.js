function updateReceiptStatus(idRequest){
    if (confirm("¿Desea cambiar de status? \n *Está videollamada pasa a ser pagada al consultor") == true) {
        let data = new FormData()
        data.append('id_request',idRequest)
        document.getElementById("loader").style.width = "100%"
        fetch('/sales/client/updateReceiptStatus',
            {
                method: 'POST',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                body: data
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("loader").style.width = "0%"
                if(data.status==true){
                    Swal.fire(data.msg,'','success').then(()=>{
                        location.reload()
                    });
                }else{
                    Swal.fire(data.msg,'','error').then(()=>{
                        location.reload()
                    });
                }
            }).catch(function(error) {
                document.getElementById("loader").style.width = "0%"
                Swal.fire('Ha ocurrido un error con la petición','','error').then(()=>{
                    location.reload()
                });
        });
    }
}