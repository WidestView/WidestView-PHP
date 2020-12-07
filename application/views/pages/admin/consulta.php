<div class="col-11 table-responsive mb-5">
    <table class="table table-light table-hover">
        <?php
            if (isset($queryData)){ var_dump($queryData)?>
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <?php foreach($queryData[0] as $data){ ?>
                        <th class="font-weight-normal" scope="col"><?php echo $data ?></th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 1; $i<count($queryData); $i++){ ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <?php foreach($queryData[$i] as $data){ ?>
                        <td><?php echo $data ?></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php
            }
        ?>
    </table>
</div>