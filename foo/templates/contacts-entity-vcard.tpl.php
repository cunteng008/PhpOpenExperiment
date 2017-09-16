BEGIN:VCARD
VERSION:3.0
N:<?php echo $contact->first_name(); ?>;<?php echo $contact->last_name() . "\n"; ?>
FN:<?php echo $contact->full_name() . "\n"; ?>
EMAIL;TYPE=PREF,INTERNET:<?php echo $contact->email() . "\n"; ?>
REV:<?php echo date("Y-m-dTH:i:sZ") . "\n"; ?>
END:VCARD