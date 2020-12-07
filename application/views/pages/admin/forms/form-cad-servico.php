<?php echo validation_errors(); ?>

<?php echo form_open('admin/form/servico', array('class' => 'text-justify')); ?>

    <h5 class="text-left"> Informações do Serviço </h5>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputName1"> Nome </label>
            <input type="text" class="form-control" id="inputName1">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="desc"> Descrição </label>
            <textarea type="text" class="form-control" rows="3" id="desc"> </textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
            <input class="btn btn-primary" type="submit" value="Enviar" />
        </div>
    </div>

</form>