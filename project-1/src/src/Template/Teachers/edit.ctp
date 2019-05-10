<h1>Edit Teacher</h1>
<?php
    echo $this->Form->create($teacher,['type'=>'file']);
    // Hard code the user for now.
    echo $this->Form->control('name');
    echo $this->Form->control('birthDay');
    echo $this->Form->control('phone');
    echo $this->Form->control('email');
    echo $this->Form->control('address');
    echo $this->Form->control('major');
    echo $this->Form->control('upload',['type'=>'file']);
    echo $this->Form->control('startDay');
    echo $this->Form->control('teacherDescription', ['rows' => '3']);
    echo $this->Form->button(__('Save Teacher'));
    echo $this->Form->end();
?>