var career=document.getElementById("career")
var expertise=document.getElementById("expertise")
career.onchange = function() {
    expertise.innerHTML="<option value=''>Selecciona</option>"
    expertise.setAttribute('disabled',true)
    if(career.value=='') return

    let data = new FormData();
    data.append('token',document.getElementById('token').value)
    data.append('career',career.value)
    document.getElementById("loader").style.width = "100%";
    fetch('/ajax/refered/get-expertises',
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
            data.expertises.forEach(element => {
                var opt = document.createElement('option');
                opt.value = element.id_expertise;
                opt.innerHTML = element.name_expertise;
                expertise.appendChild(opt);
            });
            expertise.removeAttribute('disabled')
        }else{
            Swal.fire(data.msg,'','error')
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something went wrong :(','','error')
    });
};
