
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'teacherView']) ?></li><!--  tạo link để giáo viên có thể xem điểm  -->
    </ul>
</nav>
<div class="large-9 medium-8 columns">
    <h1>Add Grade</h1>

    <?= $this->Form->create($grade) ?>
    <!-- tạo form điền điểm -->
   
    <label> Student Name </label>  
    <!-- Tạo list danh sách các học sinh -->
    <?= $this->Form->select('student_id',$studentList,
                    ['class' => 'form-control']) ?>
    <label> Subject Name </label>
    <!-- Tạo list danh sách các môn học -->
    <?= $this->Form->select('subject_id',$subjectList,
                    ['class' => 'form-control']) ?>  
    <?= $this->Form->control('middle_test') ?>
    <?= $this->Form->control('final_test')  ?>
    <label> Teacher Name </label>
    <!-- Tạo list danh sách các giáo viên -->
    <?= $this->Form->select('teacher_id',$teacherList,
                    ['class' => 'form-control']) 
                    ?>
    <?= $this->Form->button('Submit') ?>
    
    <?= $this->Form->end() ?>
</div>
