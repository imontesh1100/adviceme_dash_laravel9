let idPhotoForm = document.getElementById('idPhotoForm')
let btnDocumentation=document.getElementById('btnDocumentation')

document.getElementById("idPhoto").onchange = function() {
    let data = new FormData(idPhotoForm);
    data.append('token',document.getElementById('token').value)
    document.getElementById("loader").style.width = "100%";
    fetch(idPhotoForm.action,
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
            btnDocumentation.classList.remove('disabled')
            btnDocumentation.removeAttribute('disabled')
            Swal.fire(data.msg,'','success').then(()=>{
                document.getElementById('idImage').src=data.imageUrl+'?'+ new Date().getTime()
            })
        }else{
            Swal.fire(data.msg,'','error');
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something went wrong :(','','error')
    });
};
