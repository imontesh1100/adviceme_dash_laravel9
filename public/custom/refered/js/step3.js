let step3 = document.getElementById('referedStep3')
step3.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(step3);
    data.append('email',document.getElementById('email').value)
    document.getElementById("loader").style.width = "100%";
    fetch(step3.action,
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
            document.getElementById('section1').classList.remove('active')
            document.getElementById('section2').classList.remove('active')
            document.getElementById('section3').classList.remove('active')
            document.getElementById('section4').classList.add('active')
        }else{
            Swal.fire(data.msg,'','error');
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something wrong, try again later','','error')
    });
});
