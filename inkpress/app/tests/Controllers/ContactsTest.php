<?php

use App\Models\Contact;

class ContactsTest extends TestCase
{

    // TESTS FOR DESTROY METHOD
    public function testContactsDestroyMethodDestroysDBReference()
    {

    }

    public function testContactsDestroyMethodRedirectsToIndex()
    {

    }
    // /TESTS FOR DESTROY METHOD

    // TESTS FOR INDEX METHOD
    public function testContactsIndexMethodGetsView()
    {
        $response = $this->action('GET', 'admin.contacts');
        $response = $this->assertResponseOk();
    }
    // /TESTS FOR INDEX METHOD

    // TESTS FOR INDEXFRONT METHOD
    public function testContactsIndexFrontMethodGetsView()
    {
        $response = $this->action('GET', 'front.contacts');
        $response = $this->assertResponseOk();
    }
    // /TESTS FOR INDEXFRONT METHOD

    // TESTS FOR SHOW METHOD
    public function testContactsShowMethodGetsViewWithData()
    {
        $contact = Contact::find(2);
        $response = $this->action('GET', 'admin.contacts.show', array('contact' => $contact));
        $response = $this->assertResponseOk();
    }
    // /TESTS FOR SHOW METHOD

}
