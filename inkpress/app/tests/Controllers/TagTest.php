<?php

class TagsTest extends TestCase
{

    // TESTS FOR ALLTAGS METHOD
    public function testAllTagsMethodReturnsJSONData()
    {
        $response = $this->action('GET', 'App\Controllers\Admin\TagsController@allTags');
        $response = $this->assertResponseOk();
    }
    // /TESTS FOR ALLTAGS METHOD

    // TESTS FOR CREATE METHOD
    public function testCreateMethodGetsView()
    {
        $response = $this->action('GET', 'App\Controllers\Admin\TagsController@create');
        $response = $this->assertResponseOk();
    }
    // /TESTS FOR CREATE METHOD

    // TESTS FOR DESTROY METHOD
    public function testDestroyMethodDestroysDBReference()
    {

    }

    public function testDestroyMethodRedirectsToIndex()
    {

    }
    // /TESTS FOR DESTROY METHOD

    // TESTS FOR EDIT METHOD
    public function testEditMethodGetsViewWithData()
    {

    }
    // /TESTS FOR EDIT METHOD

    // TESTS FOR INDEX METHOD
    public function testIndexMethodGetsView()
    {
        $response = $this->action('GET', 'tags');
        $response = $this->assertResponseOk();
    }
    // /TESTS FOR INDEX METHOD

    // TESTS FOR SHOW METHOD
    public function testShowMethodGetsViewWithData()
    {

    }
    // /TESTS FOR SHOW METHOD

    // TESTS FOR STORE METHOD
    public function testStoreMethodRedirectsToCreateOnFailure()
    {

    }

    public function testStoreMethodRedirectsToIndexOnSuccess()
    {

    }

    public function testStoreMethodStoresDataToDB()
    {

    }

    public function testStoreMethodValidationFails()
    {

    }

    public function testStoreMethodValidationPasses()
    {

    }
    // /TESTS FOR STORE METHOD


    // TESTS FOR UPDATE METHOD
    public function testUpdateMethodRedirectsToEditOnFailure()
    {

    }

    public function testUpdateMethodRedirectsToIndexOnSuccess()
    {

    }

    public function testUpdateMethodUpdatesDataToDB()
    {

    }

    public function testUpdateMethodValidationFails()
    {

    }

    public function testUpdateMethodValidationPasses()
    {

    }
    // /TESTS FOR UPDATE METHOD

}
