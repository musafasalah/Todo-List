<?php
            if($session->hasGet("success")){ ?>

            <div class="alert alert-success"><?php $session->get("success") ?></div>
            
            <?php  

$session->remove("success");
}     

?>