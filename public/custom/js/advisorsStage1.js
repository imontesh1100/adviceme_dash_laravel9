let form = document.getElementById('stage1PositiveForm')
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
                Swal.fire(data.msg,'','success');
            }else{
                Swal.fire(data.msg,'','error');
            }
        }).catch(function(error) {
            document.getElementById("loader").style.width = "0%";
            Swal.fire('Ha ocurrido un error con la petición','','error').then(()=>{
                location.reload();
            });
    });
});
let stillForm = document.getElementById('stage1StillPendingForm')
stillForm.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(stillForm);
    document.getElementById("loader").style.width = "100%";
    fetch(stillForm.action,
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
                Swal.fire(data.msg,'','success');
            }else{
                Swal.fire(data.msg,'','error');
            }
        }).catch(function(error) {
            document.getElementById("loader").style.width = "0%";
            Swal.fire('Ha ocurrido un error con la petición','','error').then(()=>{
                location.reload();
            });
    });
});
let disableForm = document.getElementById('disableForm')
disableForm.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(disableForm);
    document.getElementById("loader").style.width = "100%";
    fetch(disableForm.action,
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
                Swal.fire(data.msg,'','success');
            }else{
                Swal.fire(data.msg,'','error');
            }
        }).catch(function(error) {
            document.getElementById("loader").style.width = "0%";
            Swal.fire('Ha ocurrido un error con la petición','','error').then(()=>{
                location.reload();
            });
    });
});