<?php
class components_contacts_List extends k_Component {
  protected $contacts;
  function __construct(ContactsGateway $contacts) {
    $this->contacts = $contacts;
  }
  function map($name) {
    return 'components_contacts_Entity';
  }
  function wrapHtml($content){
	return'
	<p><ahref="'.htmlspecialchars($this->url()).'">Listcontacts</a></p>
	<divid="content">
	'.$content.'
	</div>';
  }
   function renderHtml() {
    $this->document->setTitle("Contacts");
    $t = new k_Template("templates/contacts-list.tpl.php");
    return $t->render(
      $this,
      array(
        'contacts' => $this->contacts->all()));
  }
}