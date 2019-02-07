<div class="container-fluid">
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add Grades'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
       
    </ul>
</nav>
<div class="students index large-9 medium-8 columns content">
    <div class="row">
        
            <?= $this->Form->create(null,['type'=>'post',
                                          'url'=>['controller' =>'Teachers','action'=>'search']]) ?>
            <?= $this->Form->control('teacher_code',['type'=>'text','label'=>'Search Teacher']) ?>
            <?= $this->Form->button('Search Teacher') ?>

        
    </div>
   
    </div>
</div>

 