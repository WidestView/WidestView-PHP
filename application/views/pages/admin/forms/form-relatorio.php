<div class="text-danger" id="validation">
</div>
<form class="text-justify" method="post">

    <h5 class="text-left"> Informações do Relatório </h5>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputData"> Data </label>
            <input class="form-control" type="date" value="2020-12-31" id="inputData" name="dia">
        </div>
        <div class="form-group col-md-8">
            <label for="inputProj"> Projeto </label>
            <select id="inputProj" class="form-control" name="codigo_projeto">
            <?php 
                foreach($demanda as $projeto) { ?>
                    <option value="<?php echo $projeto['pro_codigo'] ?>"> <?php echo $projeto['pro_nome'] ?> </option>
                <? } ?>
            </select>
        </div>  
        <div class="form-group col-12">
            <label for="desc"> Descrição </label>
            <textarea type="text" class="form-control" rows="3" id="desc" name="descricao"> </textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
            <input class="btn btn-primary" type="submit" value="Enviar" />
        </div>
    </div>
    
</form>

<script>var url = '/admin/form_send/form-relatorio'; </script>
<script src="/resources/javascript/form.js"></script>