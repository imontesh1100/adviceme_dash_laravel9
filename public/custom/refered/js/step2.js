let step2 = document.getElementById('referedStep2')
step2.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(step2);
    data.append('email',document.getElementById('email').value)
    document.getElementById("loader").style.width = "100%";
    fetch(step2.action,
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
            document.getElementById('section3').classList.add('active')
            document.getElementById('section4').classList.remove('active')
            document.getElementById('token').value=data.token
            data.languages.forEach(element => {
                var opt = document.createElement('option');
                opt.value = element.id_language;
                opt.innerHTML = element.name_language;
                document.getElementById('language').appendChild(opt);
            });
            data.rates.forEach(element => {
                var opt = document.createElement('option');
                opt.value = element.id_rate;
                opt.innerHTML = '$'+element.rate;
                document.getElementById('rate').appendChild(opt);
            });
            data.timezones.forEach(element => {
                var opt = document.createElement('option');
                opt.value = element.id_time_zone;
                opt.innerHTML = element.timezone;
                document.getElementById('timezone').appendChild(opt);
            });
        }else{
            Swal.fire(data.msg,'','error');
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something wrong validating your code, try again later','','error')
    });
});
