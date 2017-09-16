<h2><?php e($contact->short_name()); ?></h2>
<dl>
  <dt>First Name</dt>
  <dd><?php e($contact->first_name()); ?></dd>
  <dt>Last Name</dt>
  <dd><?php e($contact->last_name()); ?></dd>
  <dt>Email</dt>
  <dd><?php e($contact->email()); ?></dd>
</dl>
<p>
  <a href="<?php e(url('', array('edit'))); ?>">edit</a>
</p>