let form = document.getElementById('loginForm')
form.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(form);
    document.getElementById("loader").style.width = "100%";
    fetch(form.action,
        {
            method: 'POST',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            body: data
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("loader").style.width = "0%";
            if(data.status==true){
                Swal.fire(data.msg,'','success').then(()=>{
                    location.href=data.url;
                });
            }else{
                Swal.fire(data.msg,'','error');
            }
        }).catch(function(error) {
            Swal.fire('Ha ocurrido un error con la petición','','error').then(()=>{
                location.reload();
            });
        });
});
