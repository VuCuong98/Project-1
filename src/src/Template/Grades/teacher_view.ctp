<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       
        <li><?= $this->Html->link(__('Add Grades'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Home Page'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="container-fluid large-9 medium-8 columns">

   
    <div class="row">
		<?php 
			if (isset($query)):
		
		?>
		<table>
			<tr>
				<th class="large-1">Student Code </th>
		        <th class="large-2"> Student Name </th>
		        <th class="large-1">Subject Code</th>
		        <th class="large-2">Subject Name</th>
		        <th class="large-1">Middle Test </th>
		        <th class="large-1">Final Test</th>
		        <th class="large-1">Average</th>
		    </tr>
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
		        <td><?= $value->middle_test*0.3 + $value->final_test* 0.7 ?></td>
     


    
    		</tr>
    <?php endforeach; ?>
		</table>
    	<?php 
    		endif;
    	?>	
    </div>
    
</div>

 