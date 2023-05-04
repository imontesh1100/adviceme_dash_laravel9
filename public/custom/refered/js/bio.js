let bioForm = document.getElementById('bioForm')
bioForm.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(bioForm);
    document.getElementById("loader").style.width = "100%";
    fetch(bioForm.action,
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
                location.href=data.url
            });
        }else{
            Swal.fire(data.msg,'','error');
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something wrong validating your code, try again later','','error')
    });
});
