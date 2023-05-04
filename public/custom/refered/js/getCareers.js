let category=document.getElementById("category")
var career=document.getElementById("career")
var expertise=document.getElementById("expertise")

category.onchange = function() {
    career.innerHTML="<option value=''>Selecciona</option>"
    career.setAttribute('disabled',true)
    expertise.innerHTML="<option value=''>Selecciona</option>"
    expertise.setAttribute('disabled',true)
    
    if(category.value=='') return

    let data = new FormData();
    data.append('token',document.getElementById('token').value)
    data.append('category',category.value)
    document.getElementById("loader").style.width = "100%";
    fetch('/ajax/refered/get-careers',
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
            data.careers.forEach(element => {
                var opt = document.createElement('option');
                opt.value = element.id_career;
                opt.innerHTML = element.name_career;
                career.appendChild(opt);
            });
            career.removeAttribute('disabled')
        }else{
            Swal.fire(data.msg,'','error')
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something went wrong :(','','error')
    });
};
