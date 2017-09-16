<?php
class components_contacts_Entity extends k_Component {

  function postForm() {
    if ($this->process()) {
      return new k_SeeOther($this->url());
    }
    return $this->render();
  }
  function process() {
    global $contacts;
    $this->contact = new Contact(
      array(
        'short_name' => $this->contact->short_name(),
        'first_name' => $this->body("first_name"),
        'last_name' => $this->body("last_name"),
        'email' => $this->body("email")));
    if (!$this->contact->first_name()) {
      @$this->contact->errors[] = "Missing first_name";
    }
    if (!$this->contact->last_name()) {
      @$this->contact->errors[] = "Missing last_name";
    }
    if (!$this->contact->email()) {
      @$this->contact->errors[] = "Missing email";
    }
    if (!isset($this->contact->errors)) {
      try {
        $this->contacts->save($this->contact);
      } catch (Exception $ex) {
        @$this->contact->errors[] = $ex->getMessage();
        return false;
      }
      return true;
    }
    return false;
  }


  function renderHtmlEdit() {
    $this->document->setTitle("Edit " . $this->contact->full_name());
    $t = new k_Template("templates/contacts-entity-edit.tpl.php");
    return new k_HtmlResponse($t->render($this, array('contact' => $this->contact)));
  }

 protected $contact;
   protected $contacts;
  function __construct(ContactsGateway $contacts) {
    $this->contacts = $contacts;
  }
    function dispatch() {
    $this->contact = $this->contacts->fetchByName($this->name());
    if (!$this->contact) {
      throw new k_PageNotFound();
    }
    return parent::dispatch();
  }
  function renderHtml() {
    $this->document->setTitle($this->contact->full_name());
    $t = new k_Template("templates/contacts-entity.tpl.php");
    return $t->render($this, array('contact' => $this->contact));
  }
  function renderVcard() {
    $t = new k_Template("templates/contacts-entity-vcard.tpl.php");
    $response = new k_HttpResponse(200, $t->render($this, array('contact' => $this->contact)));
    $response->setContentType('text/x-vcard');
    return $response;
  }


}