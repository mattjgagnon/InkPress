<?php

//use App\Models\Article;

class ArticlesTest extends TestCase
{

    // TESTS FOR CREATE METHOD
    public function testCreateMethodGetsView()
    {
        $response = $this->action('GET', 'App\Controllers\Admin\ArticlesController@create');
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
    public function testIndexMethodGetsViewWithData()
    {
        $this->mock = $this->mock('Article');
        $this->mock->shouldReceive('all')->once()->andReturn('some dummy data');
        $response = \View::make('admin.articles.index')->with('articles', $this->mock->all());
        $this->call('GET', 'admin/articles');
        $this->assertResponseOk();
    }
    // /TESTS FOR INDEX METHOD

    // TESTS FOR SHOW METHOD
    public function testShowMethodGetsViewWithData()
    {
/*
        // not working yet
        $this->mock = $this->mock('Article');
        $this->mock->shouldReceive('find')->once()->andReturn(1);
        $response = \View::make('admin.articles.show')->with('articles', $this->mock->find());
//        $this->call('GET', 'admin/articles');
        $response = $this->action('GET', 'App\Controllers\Admin\ArticlesController@show');
        $response = $this->assertResponseOk();
*/
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
