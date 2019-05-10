<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<?php foreach ($studentinfo as $student): ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Html->link(__('Home Page'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('View Certificates'), ['action' => 'viewCertificate', $student->id]) ?> </li>
        <li><?= $this->Html->link(__('View Grades'), ['controller'=>'Grades','action' => 'studentView', $student->id]) ?> </li>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Student Code') ?></th>
            <td><?= h($student->student_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($student->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($student->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($student->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($student->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Major') ?></th>
            <td><?= h($student->major) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($student->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($student->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Contact') ?></th>
            <td><?= $student->parent_contact ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BirthDay') ?></th>
            <td><?= $student->birthDay->i18nFormat('dd-MM-yyyy') ?></td>
        </tr>
    </table>
</div>
<?php endforeach ?>  