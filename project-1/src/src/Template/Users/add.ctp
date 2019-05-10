<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <label>Email</label>
        <?php
            echo $this->Form->control('email',['label'=>false]);
            ?>
        <label>Password</label>    
            <?php  
            echo $this->Form->control('password',['label'=>false]);
            ?>
        <label>Role</label>
            <?php  
            echo $this->Form->select('role',['student','teacher','admin'], ['value' => [0,1,2]]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
