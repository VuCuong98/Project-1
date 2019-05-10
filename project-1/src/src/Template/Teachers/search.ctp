<?php foreach ($query as $teacher): ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'teacherView',$teacher->id]) ?></li>
        <li><?= $this->Html->link(__('Add Grades'), ['controller' => 'Grades', 'action' => 'add',$teacher->id]) ?></li>
        <li><?= $this->Html->link(__('Edit Information'), ['controller' => 'Teachers', 'action' => 'edit', $teacher->id]) ?></li>
        <li><?= $this->Html->link(__('Home Page'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>

       
    </ul>
</nav>
<div class="large-9 medium-8 columns">

    <table class="vertical-table">
        <tr>
           <th scope="row"><?= __('Image') ?></th>

            <td><?= $this->Html->image('/img/teacher_images/'.$teacher->image,['style'=>'width:150px;height:200px;']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($teacher->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($teacher->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($teacher->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Major') ?></th>
            <td><?= h($teacher->major) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher Code') ?></th>
            <td><?= $teacher->teacher_code ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $teacher->phone ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BirthDay') ?></th>
            <td><?= $teacher->birthDay->i18nFormat('dd-MM-yyyy'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Day') ?></th>
            <td><?= $teacher->startDay->i18nFormat('dd-MM-yyyy'); ?></td>
        </tr>
   
        
    </table>
    <div class="large-9">
        <h4 style="color:#1798A5;"><?= __('Teacher Description') ?></h4>
        <?= $this->Text->autoParagraph(h($teacher->teacherDescription)); ?>
    </div>
    <div class="row">
        <h4 style="color:#1798A5;">Relate Subject</h4>
        <table>
            <tr>
                <th> Mã Môn Học </th>
                <th> Tên Môn Học </th>
                
            </tr>
            <?php foreach ($teacher->subjects as $value) : ?>
                <tr>
                    <td><?= $value->subject_code ?></td>
                    <td><?= $value->subjectName ?></td>
                   
                </tr>
            <?php endforeach ?> 
        </table>
    </div>
<?php endforeach ?>    
    
</div>
<?php 
    
    // foreach ($query as $teacher) {
    //     echo $teacher->name;
    //     echo $teacher->teacher_code;
    //     echo $teacher->birthday;
    //     echo $teacher->phone;
    //     echo $teacher->email;
    //     echo $teacher->address;
    //     echo $teacher->major;
    //     echo $teacher->image;
    //     echo $teacher->teacherDescription;
    //     foreach ($teacher->subjects as $value) {
    //         echo $value->subjectName;
    //     }
        



    // }
 ?>