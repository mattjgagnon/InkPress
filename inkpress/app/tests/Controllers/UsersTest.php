<?php

class UsersTest extends TestCase
{

    // TESTS FOR CREATE METHOD
    public function testCreateMethodGetsView()
    {
        $response = $this->action('GET', 'App\Controllers\Admin\UsersController@create');
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
/*
        $this->mock->shouldReceive('all')->twice();
        $response = $this->action('GET', 'App\Controllers\Admin\UsersController@index');
        $response = $this->assertResponseOk();
*/
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
