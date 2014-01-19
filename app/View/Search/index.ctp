<div class="users form">
<?php echo $this->Form->create('Search'); ?>
    <fieldset>
        <?php echo $this->Form->input('search');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Search')); ?>
</div>