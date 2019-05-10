<h1>Grades</h1>
<?= $this->Html->link('Add Grade', ['action' => 'add']) ?>
<div class="container-fluid">
    <div class="row">
    
    <?= $this->Form->create(null,['type'=>'post',
                                          'url'=>['controller' =>'Grades','action'=>'studentView']]) ?>
            <?= $this->Form->select('student_id',$studentList,['class'=>'form-control']);  ?>
            <?= $this->Form->select('subject_id',$subjectList,['class'=>'form-control']);  ?>
            <?= $this->Form->button('Search Grades') ?>
    
        
    </div>
    <div class="row">
<table>
    <tr>

        <th class="large-1">Student Code </th>
        <th class="large-2"> Student Name </th>
        <th class="large-1">Subject Code</th>
        <th class="large-2">Subject Name</th>
        <th class="large-1">Middle Test </th>
        <th class="large-1">Final Test</th>
        <th class="large-1">Teacher Code</th>
        <th class="large-2">Teacher Name </th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($query as $value): ?>
    <tr>
    	
        <td><?=  $value->student->student_code ?></td>
        <td><?=  $value->student->name ?></td>
        <td><?=  $value->subject->subject_code ?></td>
        <td><?=  $value->subject->subjectName ?></td>
        <td>
            <?= $value->middle_test ?>
        </td>
        <td>
        	<?= $value->final_test ?>
        </td>
        <td>
            <?= $value->teacher->teacher_code ?>
        </td>
        <td>
            <?= $value->teacher->name ?>
        </td>        


    
    </tr>
    <?php endforeach; ?>
</table>
    </div>
    
</div>

 