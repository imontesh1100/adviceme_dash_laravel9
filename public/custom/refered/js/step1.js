let step1 = document.getElementById('referedStep1')
step1.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(step1);
    document.getElementById("loader").style.width = "100%";
    fetch(step1.action,
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
            // Swal.fire(data.msg,'','success')
            document.getElementById('section1').classList.remove('active')
            document.getElementById('section2').classList.add('active')
            document.getElementById('section3').classList.remove('active')
            document.getElementById('section4').classList.remove('active')
            document.getElementById('emailPlaceholder').innerText=data.email
        }else{
            Swal.fire(data.msg,'','error');
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something went wrong :(','','error').then(()=>{
            location.reload();
        });
    });
});
