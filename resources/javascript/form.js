
$("form").submit(function(e) {
    e.preventDefault();
    submit();
});

function submit(){
    $.ajax({
            type: 'POST',
            url: url,
            data: $('form').serialize(),
            error: function(xhr) {
                alert('error');
            },
            success: function(resp){

                switch(resp){
                    case 'success':
                        Swal.fire({
                            title : 'Cadastrado!',
                            text : 'Cadastrado com sucesso!',
                            icon : 'success',
                            confirmButtonText : 'Ok',
                            confirmButtonColor: '#464362'
                        });
                        $('#validation').html('');
                        break;
                    case 'bad_url':
                        Swal.fire({
                            title : 'BAD URL',
                            text : 'Avisa o suporte do site, deu ruim',
                            icon : 'error',
                            confirmButtonText : 'Ok',
                            confirmButtonColor: '#464362'
                        });
                        break;
                    case 'no-data':
                        Swal.fire({
                            title : 'NO DATA',
                            text : 'Avisa o suporte do site, deu ruim',
                            icon : 'error',
                            confirmButtonText : 'Ok',
                            confirmButtonColor: '#464362'
                        });
                        break;
                    case 'failure':
                        Swal.fire({
                            title : 'Failure',
                            text : 'Algo deu errado na inserção ao banco',
                            icon : 'error',
                            confirmButtonText : 'Ok',
                            confirmButtonColor: '#464362'
                        });
                        break;
                    default:
                        $('#validation').html(resp);
                    break;
                }                
            }
        });
}