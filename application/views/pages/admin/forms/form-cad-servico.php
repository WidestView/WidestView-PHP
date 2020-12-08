<div class="text-danger" id="validation">
</div>
<form class="text-justify" method="post">

    <h5 class="text-left"> Informações do Serviço </h5>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputName1"> Nome </label>
            <input type="text" name="ser_nome" class="form-control" id="inputName1" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="desc"> Descrição </label>
            <textarea type="text" name="ser_descricao" class="form-control" rows="3" id="desc" required> </textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ml-auto d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="Enviar" />
        </div>
    </div>

</form>

<script>var url = '/admin/form_send/form-cad-servico'; </script>
<script src="/resources/javascript/form.js"></script>