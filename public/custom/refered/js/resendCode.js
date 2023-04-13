let resendCode = (url)=>{
    let data = new FormData();
    data.append('email',document.getElementById('email').value)
    document.getElementById("loader").style.width = "100%";
    fetch(url,
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
            Swal.fire(data.msg,'','success')
        }else{
            Swal.fire(data.msg,'','error');
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something wrong sending your code, try again','','error')
    });
}