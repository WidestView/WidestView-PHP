<script>
    Swal.fire({
    <?php if(isset($title)){ ?>
        title: '<?php echo $title?>',
    <?php } ?>

    <?php if(isset($text)){ ?>
        text: '<?php echo $text?>',
    <?php } ?>

    <?php if(isset($icon)){ ?>
        icon: '<?php echo $icon?>',
    <?php } ?>

    <?php if(isset($btnText)){ ?>
        confirmButtonText: '<?php echo $btnText?>',
    <?php } ?>
    
        confirmButtonColor: '#464362'
    })
</script>