<div class="col-11 table-responsive mb-5">
    <table class="table table-light table-hover">
        <?php
            if (isset($queryData)){ 
                if(count($queryData)>0){?>
                <thead class="thead-dark">
                    <tr>
                    <?php foreach($queryData[0] as $data){ ?>
                        <th class="font-weight-normal" scope="col"><?php echo $data ?></th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 1; $i<count($queryData); $i++){ ?>
                    <tr>
                        <?php foreach($queryData[$i] as $data){ ?>
                        <td><?php echo $data ?></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php
                }else{
                    ?> <p> Sem dados nessa tabela </p> <?php 
                }
            }
        ?>
    </table>
</div>