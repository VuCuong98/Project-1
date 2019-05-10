<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student[]|\Cake\Collection\CollectionInterface $students
 */
?>

<div class="students index large-9 medium-8 columns content">
    <div class="row">
        
            <?= $this->Form->create(null,['type'=>'post',
                                          'url'=>['controller' =>'Students','action'=>'view']]) ?>
            <?= $this->Form->control('student_code',['type'=>'text','label'=>'Search Student']) ?>
            <?= $this->Form->button('Search') ?>

        
    </div>
</div>
