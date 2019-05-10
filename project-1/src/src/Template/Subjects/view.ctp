<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['action' => 'add']) ?> </li>
       
    </ul>
</nav>
<div class="subjects view large-9 medium-8 columns content">
    
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subject Code') ?></th>
            <td><?= h($subject->subject_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SubjectName') ?></th>
            <td><?= h($subject->subjectName) ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Related Teachers') ?></h4>
        <?php if (!empty($subject->teachers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
               
                <th scope="col"><?= __('Teacher Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Major') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->teachers as $teachers): ?>
            <tr>
                
                <td><?= h($teachers->teacher_code) ?></td>
                <td><?= h($teachers->name) ?></td>
                <td><?= h($teachers->phone) ?></td>
                <td><?= h($teachers->email) ?></td>
                <td><?= h($teachers->major) ?></td>
          
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teachers', 'action' => 'edit', $teachers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teachers', 'action' => 'delete', $teachers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teachers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
