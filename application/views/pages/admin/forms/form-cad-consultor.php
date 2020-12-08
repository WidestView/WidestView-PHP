<div class="text-danger" id="validation">
</div>
<form class="text-justify" method="post">

    <h5 class="text-left mb-3"> Informações do Consultor </h5>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputName2"> Nome </label>
            <input type="name" name="fun_nome" class="form-control" id="inputName2" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputNomeSoc"> Nome Social </label>
            <input type="text" name="fun_nome_social" class="form-control" id="inputNomeSoc" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputData"> Dt. Nascimento </label>
            <input class="form-control" name="fun_nascimento" type="date" value="2020-12-31" id="inputData">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-lg-5 col-md-7"> 
            <label for="inputEmail"> Email </label>
            <input type="email" name="fun_email" class="form-control" id="inputEmail" required>
        </div>
        <div class="form-group col-lg-4 col-md-5 col-sm-7"> 
            <label for="inputPassword"> Senha </label>
            <input type="password" name="fun_senha" class="form-control" id="inputPassword" required>
        </div>           
        <div class="form-group col-md-3 col-sm-5">
            <label for="inputCPF"> CPF </label>
            <input type="text" name="fun_cpf" class="form-control" id="inputCPF" required>
        </div>                    
    </div>

    <div class="form-row">
        <div class="form-group col-md-4 col-sm-6">
            <label for="inputSex"> Sexo </label>
            <select id="inputSex" name="fun_sexo" class="form-control">
                <option selected value="null"> Prefiro não informar </option>
                <option value="F"> Feminino </option>
                <option value="M"> Masculino </option>
            </select>
        </div>     
        <div class="form-group col-md-4 col-sm-6">
            <label for="inputRG"> RG </label>
            <input type="text" name="fun_rg" class="form-control" id="inputRG" required>
        </div> 
        <div class="form-group col-md-4">
            <label for="inputNvl"> Nv. Acesso </label>
            <select id="inputNvl" name="fun_nivelacesso" class="form-control">
                <option selected value="0"> Funcionário </option>
                <option value="1"> Administrador </option>
            </select>
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputTel"> Telefone </label>
            <input type="text" name="fun_telefone" class="form-control" id="inputTel" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputCel"> Celular </label>
            <input type="text" name="fun_cel" class="form-control" id="inputCel" required>
        </div>
        <div class="form-group col-md-4 col-sm-6">
            <label for="inputCar"> Cargo </label>
            <input type="text" name="fun_cargo" class="form-control" id="inputCar" required>
        </div>  
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="Enviar" />
        </div>
    </div>
    
</form>

<script>var url = '/admin/form_send/form-cad-consultor'; </script>
<script src="/resources/javascript/form.js"></script>