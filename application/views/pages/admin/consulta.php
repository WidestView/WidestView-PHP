<div class="col-11">
    <table class="table table-hover">
        <?php
            if (isset($queryData)){ ?>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <?php foreach($queryData[0] as $data){ ?>
                        <th scope="col"><?php echo $data ?></th>
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