<div class="text-danger" id="validation">
</div>
<form class="text-justify" method="post">

    <h5 class="text-left"> Informações da Demanda </h5>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputName1"> Nome </label>
            <input type="text" name="pro_nome" class="form-control" id="inputName1" required>
        </div>
        <div class="form-group col-md-5">
            <label for="inputProj"> Cliente </label>
            <select id="inputProj" name="pro_codigo_cliente" class="form-control" required>
                <?php 
                foreach($clientes as $cliente) { ?>
                    <option value="<?php echo $cliente['cli_codigo'] ?>"> <?php echo $cliente['cli_nome'] ?> </option>
                <? } ?>
            </select>
        </div>  
        <div class="form-group col-md-2">
            <label for="inputData"> Prazo </label>
            <input class="form-control" name="pro_prazo" type="date" value="2020-12-31" id="inputData" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="desc"> Descrição </label>
            <textarea type="text" name="pro_descricao" class="form-control" rows="3" id="desc" required> </textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="Enviar" required/>
        </div>
    </div>
    
</form>

<script>var url = '/admin/form_send/form-cad-demanda'; </script>
<script src="/resources/javascript/form.js"></script>