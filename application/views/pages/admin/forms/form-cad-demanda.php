<?php echo validation_errors(); ?>

<?php echo form_open('admin/form/damanda', array('class' => 'text-justify')); ?>

    <h5 class="text-left"> Informações da Demanda </h5>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputName1"> Nome </label>
            <input type="text" name="nome" class="form-control" id="inputName1">
        </div>
        <div class="form-group col-md-5">
            <label for="inputProj"> Cliente </label>
            <select id="inputProj" name="cliente" class="form-control">
                <option selected> ... </option>
                    
                    <!-- BIND FROM DATABASE -->
            </select>
        </div>  
        <div class="form-group col-md-2">
            <label for="inputData"> Prazo </label>
            <input class="form-control" name="prazo" type="date" value="2020-12-31" id="inputData">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="desc"> Descrição </label>
            <textarea type="text" name="descricao" class="form-control" rows="3" id="desc"> </textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="Enviar" />
        </div>
    </div>
    
</form>

<script src="/resources/javascript/form.js"></script>