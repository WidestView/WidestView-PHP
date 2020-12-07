<div class="text-danger" id="validation">
</div>
<form class="text-justify">
    <h5 class="text-left mb-3"> Informações da Empresa </h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName1"> Nome </label>
            <input type="text" name="nome" class="form-control" id="inputName1">
        </div>
        <div class="form-group col-md-6">
            <label for="inputNameSoc"> CNPJ </label>
            <input type="text" name="cnpj" class="form-control" id="inputNameSoc">
        </div>
    </div>

    <h5 class="text-left my-3"> Informações do Representante </h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName2"> Nome </label>
            <input type="name" name="rep_nome" class="form-control" id="inputName2">
        </div>
        <div class="form-group col-md-6">
            <label for="inputNomeSoc"> Nome Social </label>
            <input type="text" name="rep_nome_social" class="form-control" id="inputNomeSoc">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-5 col-sm-12"> 
            <label for="inputEmail"> Email </label>
            <input type="email" name="rep_email" class="form-control" id="inputEmail">
        </div>
        <div class="form-group col-md-3 col-sm-3">
            <label for="inputCPF"> CPF </label>
            <input type="text" name="rep_cpf" class="form-control" id="inputCPF">
        </div>
        <div class="form-group col-md-4 col-sm-9">
            <label for="inputSex"> Sexo </label>
            <select id="inputSex" name="rep_sexo" class="form-control">
                <option selected>Prefiro não informar</option>
                <option>Feminino</option>
                <option>Masculino</option>
            </select>
        </div>                                     
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputTel"> Telefone </label>
            <input type="text" name="rep_tel" class="form-control" id="inputTel">
        </div>
        <div class="form-group col-md-6">
            <label for="inputCel"> Celular </label>
            <input type="text" name="rep_cel" class="form-control" id="inputCel">
        </div>
    </div>
</form>

<div class="form-row">
    <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
        <button class="btn btn-primary" onclick="submit()">Enviar</button>
    </div>
</div>

<script>
    function submit(){
        $.ajax({
            type: 'POST',
            url: '/admin/form_send/form-cad-cliente',
            data: $('form').serialize(),
            error: function(xhr) {
                alert('error');
            },
            success: function(resp){

                switch(resp){
                    case 'success':
                        Swal.fire({
                            title : 'Cadastrado!',
                            text : 'Cliente cadastrado com sucesso!',
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
                    default:
                        $('#validation').html(resp);
                    break;
                }                
            }
        });

        /*
        
        var http = new XMLHttpRequest();
        var url = '/admin/form_send/form-cad-cliente';
        var params = $('form').serialize();
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                let res = http.responseText;
                if(res == 'success'){
                    Swal.fire({
                        title : 'Cadastrado!',
                        text : 'Cliente cadastrado com sucesso!',
                        icon : 'success',
                        confirmButtonText : 'Ok',
                        confirmButtonColor: '#464362'
                    });
                    return;
                }

                document.getElementById('validation').innerHTML = res;

                if(Array.isArray(res)){
                    document.getElementById('validation').innerHTML = res;
                    return;
                }

                alert(res);
            }
        }
        http.send(params);
        */
    }
</script>