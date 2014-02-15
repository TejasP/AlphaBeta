<div class="users form">
<a class="close-reveal-modal">&#215;</a>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<?php echo $this->Html->link(__('Forgot Password ?'), array('controller'=>'users','action' => 'resetPassword')); ?>
</div>