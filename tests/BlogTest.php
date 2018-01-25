<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BlogTest extends PHPUnit_Framework_TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://local.lumen.com/'  //Added for test purpose this needs to be taken from configuration
        ]);
    }

    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
                $this->app->version(), $this->response->getContent()
        );
    }

    public function testGetUsers()
    {
        $response = $this->client->get('/users', [
            'query' => [
                'name' => 'swati'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('name', $data);
    }

    public function testNewUser()
    {
        $bookId = uniqid();

        $response = $this->client->post('/users', [
            'json' => [
                'name'  => 'Test',
                'email' => 'test@test.com'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertEquals('Test', $data['name']);
    }

    public function testGetPosts()
    {
        $response = $this->client->get('/posts');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetComments()
    {
        $response = $this->client->get('/comments');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetUserPosts()
    {
        $response = $this->client->get('/users/1/posts');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetUserComments()
    {
        $response = $this->client->get('/users/1/comments');

        $this->assertEquals(200, $response->getStatusCode());
    }

}
