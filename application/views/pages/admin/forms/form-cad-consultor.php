<?php echo validation_errors(); ?>

<?php echo form_open('admin/form/consultor', array('class' => 'text-justify')); ?>

    <h5 class="text-left mb-3"> Informações do Consultor </h5>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputName2"> Nome </label>
            <input type="name" name="nome" class="form-control" id="inputName2">
        </div>
        <div class="form-group col-md-4">
            <label for="inputNomeSoc"> Nome Social </label>
            <input type="text" name="nome_social" class="form-control" id="inputNomeSoc">
        </div>
        <div class="form-group col-md-4">
            <label for="inputData"> Dt. Nascimento </label>
            <input class="form-control" name="data_nascimento" type="date" value="2020-12-31" id="inputData">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-lg-5 col-md-7"> 
            <label for="inputEmail"> Email </label>
            <input type="email" name="email" class="form-control" id="inputEmail">
        </div>
        <div class="form-group col-lg-4 col-md-5 col-sm-7"> 
            <label for="inputPassword"> Senha </label>
            <input type="password" name="senha" class="form-control" id="inputPassword">
        </div>           
        <div class="form-group col-md-3 col-sm-5">
            <label for="inputCPF"> CPF </label>
            <input type="text" name="cpf" class="form-control" id="inputCPF">
        </div>                    
    </div>

    <div class="form-row">
        <div class="form-group col-md-4 col-sm-6">
            <label for="inputSex"> Sexo </label>
            <select id="inputSex" name="sexo" class="form-control">
                <option selected> Prefiro não informar </option>
                <option> Feminino </option>
                <option> Masculino </option>
            </select>
        </div>     
        <div class="form-group col-md-4 col-sm-6">
            <label for="inputRG"> RG </label>
            <input type="text" name="rg" class="form-control" id="inputRG">
        </div> 
        <div class="form-group col-md-4">
            <label for="inputNvl"> Nv. Acesso </label>
            <select id="inputNvl" name="nivel_acesso" class="form-control">
                <option selected> Funcionário </option>
                <option> Administrador </option>
            </select>
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputTel"> Telefone </label>
            <input type="text" name="telefone" class="form-control" id="inputTel">
        </div>
        <div class="form-group col-md-4">
            <label for="inputCel"> Celular </label>
            <input type="text" name="celular" class="form-control" id="inputCel">
        </div>
        <div class="form-group col-md-4 col-sm-6">
            <label for="inputRole"> Cargo </label>
            <select id="inputRole" name="cargo" class="form-control">
                <option selected> ... </option>
                
                <!-- BIND FROM DATABASE -->

            </select>
        </div>  
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="Enviar" />
        </div>
    </div>
    
</form>

<script src="/resources/javascript/form.js"></script>