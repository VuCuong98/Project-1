
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home Page'), ['action' => 'index']) ?> </li>
        
    </ul>
</nav>
<div class="large-9 medium-8 columns content">
<h1>Certificate</h1>
<table>
	<tr>
		<th>Student Name</th>
		<th>Student Code</th>
		<th>Major</th>
		<th>Degree Type</th>
		<th>Credit</th>
	</tr>
	<tr>
	 	<td><?= $studentCertificate->student_code ?></td>
	 	<td><?= $studentCertificate->name ?></td>
	 	<td><?= $studentCertificate->major ?></td>
	 	<td><?= $studentCertificate->certificate->degree_type ?></td>
	 	<td><?= $studentCertificate->certificate->credit ?></td>


	

	 	
	
	</tr>
</table>
</div>