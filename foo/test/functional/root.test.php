<?php
// You need to have simpletest in your include_path
if (realpath($_SERVER['SCRIPT_FILENAME']) == __FILE__) {
  require_once 'simpletest/autorun.php';
}
require_once dirname(__FILE__) . '/../../config/global.inc.php';
require_once 'konstrukt/virtualbrowser.inc.php';

class WebTestOfRoot extends WebTestCase {
  function createBrowser() {
    $this->container = create_container();
    return new k_VirtualSimpleBrowser('components_Root', new k_InjectorAdapter($this->container));
  }
  function createInvoker() {
    return new SimpleInvoker($this);
  }
  function test_root() {
    $this->assertTrue($this->get('/'));
    $this->assertResponse(200);
    $this->assertText("This page is intentionally left blank");
  }

  function test_lists_contacts() {
    Mock::Generate('ContactsGateway');
    $contacts = new MockContactsGateway();
    $jabba = new Contact(array('first_name' => "Jabba", 'last_name' => "the Hutt", 'short_name' => "jabba"));
    $contacts->setReturnValue('all', array($jabba));
    $this->container->set($contacts, 'ContactsGateway');
    $this->get('/');
    $this->assertLink("Jabba the Hutt");
  }
  
}
