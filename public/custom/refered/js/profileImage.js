let profileImgForm = document.getElementById('profileImgForm')
let btnPersonal=document.getElementById('btnPersonal')
document.getElementById("profileImage").onchange = function() {
    let data = new FormData(profileImgForm);
    data.append('token',document.getElementById('token').value)
    document.getElementById("loader").style.width = "100%";
    fetch(profileImgForm.action,
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
            document.getElementById('avatarImg').src=data.imageUrl+'?'+ new Date().getTime()
            Swal.fire(data.msg,'','success').then(()=>{
                btnPersonal.classList.remove('disabled')
                btnPersonal.removeAttribute('disabled')
            })
        }else{
            Swal.fire(data.msg,'','error');
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something went wrong :(','','error')
    });
};
