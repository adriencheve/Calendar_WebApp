<h2>Register</h2>


<div id="container">
<?php echo form_open('register/validation'); ?>

<h1>Create Form Using CodeIgniter</h1>

<?php echo form_label('User Name :'); ?>
<?php echo form_input(array('id' => 'uname', 'name' => 'uname')); ?>
<br>
<?php echo form_label('E-mail :'); ?>
<?php echo form_input(array('id' => 'email', 'name' => 'email')); ?>
<br>
<?php echo form_label('Password:'); ?>
<?php echo form_input(array('id' => 'pass1', 'name' => 'pass1')); ?>
<br>
<?php echo form_label('Confirm Password:'); ?>
<?php echo form_input(array('id' => 'pass2', 'name' => 'pass2')); ?>

<br>
<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>

<?php echo form_close(); ?>
</div>
