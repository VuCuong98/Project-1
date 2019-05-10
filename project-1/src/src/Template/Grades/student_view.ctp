<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home Page'), ['controller'=>'Students','action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="large-9 medium-8 columns content">
        <table>
            <tr>
                <th class="large-1">Subject Code</th>
                <th class="large-3">Subject Name</th>
                <th class="large-1">Middle Test</th>
                <th class="large-1">Final Test </th>
                <th class="large-1">Teacher Code</th>
                <th class="large-2">Teacher Name</th>
            </tr>
             <?php foreach ($query as $value): ?>
            <tr>
               
                <td><?= $value->subject->subject_code ?></td>
                <td><?= $value->subject->subjectName ?></td>
                <td><?= $value->middle_test ?></td>
                <td><?= $value->final_test ?></td>
                <td><?= $value->teacher->teacher_code ?></td>
                <td><?= $value->teacher->name ?></td>

                 
            </tr>
            <?php endforeach; ?>
        </table>
</div>