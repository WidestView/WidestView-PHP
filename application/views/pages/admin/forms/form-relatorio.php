<?php echo validation_errors(); ?>

<?php echo form_open('/admin/form/relatorio', array('class' => 'text-justify')); ?>

    <h5 class="text-left"> Informações do Relatório </h5>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputData"> Data </label>
            <input class="form-control" type="date" value="2020-12-31" id="inputData">
        </div>
        <div class="form-group col-md-8">
            <label for="inputProj"> Projeto </label>
            <select id="inputProj" class="form-control">
                <option selected> ... </option>
                <option> ... </option>
                <option> ... </option>
            </select>
        </div>  
        <div class="form-group col-12">
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