<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;

class AppTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * Testing Show Comments Method
     * in CommentController
     *
     * @return success or not
     */
    public function test_show_comments()
    {
    	$controller = new CommentController();
    	$response = $controller->showComments();
    	$this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Testing Add Comment Method
     * in CommentController
     *
     * @return success or not
     */
    public function test_add_comment()
    {
    	$request = [
    		'author' 	=> 'Test Author',
    		'comment' 	=> 'Test comment message',
    		'period_id' => 0
    	];

    	$request 	= new Request($request);
    	$controller = new CommentController();
    	$response 	= $controller->addComment($request);
    	$this->assertEquals(200, $response->getStatusCode());
    }
}
