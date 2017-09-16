<h2>Contacts</h2>
<ul>
<?php foreach ($contacts as $contact): ?>
  <li><a href="<?php e(url($contact->short_name())); ?>"><?php e($contact->full_name()); ?></a></li>
<?php endforeach; ?>
</ul>