<h2>Edit <?php e($contact->short_name()); ?></h2>
<form method="post" action="<?php e(url('', array('edit'))); ?>">
<?php if (isset($contact->errors)): ?>
<?php foreach ($contact->errors as $error): ?>
   <p style="color:red">
     <?php e($error); ?>
   </p>
<?php endforeach; ?>
<?php endif; ?>
   <p>
     <label>First Name
       <input type="text" name="first_name" value="<?php e($contact->first_name()); ?>" />
     </label>
  </p>
   <p>
     <label>Last Name
       <input type="text" name="last_name" value="<?php e($contact->last_name()); ?>" />
     </label>
  </p>
   <p>
     <label>Email
       <input type="text" name="email" value="<?php e($contact->email()); ?>" />
     </label>
  </p>
   <p>
     <input type="submit" />
   </p>
</form>