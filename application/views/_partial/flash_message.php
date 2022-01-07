<?php
    $success     = $this->session->flashdata('success');
    $error       = $this->session->flashdata('error');
    $warning     = $this->session->flashdata('warning');
    $penting     = $this->session->flashdata('penting');    

    if ($error) {
        $message_status = 'alert-danger message-error';
        $message        = $error;
    }    

    if ($warning) {
        $message_status = 'alert-warning message-warning';
        $message        = $warning;
    }

    if ($success) {
        $message_status = 'alert-success message-success';
        $message        = $success;
    }
?>

<?php if ($success || $warning || $error): ?>    
    <div class="alert <?= $message_status ?> <?= $penting ? 'alert-important' : '' ?>" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>                
        <?= $message ?>
    </div>
<?php endif ?>