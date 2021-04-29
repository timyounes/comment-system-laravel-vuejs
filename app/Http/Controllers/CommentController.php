<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    /**
    * Show Function
    * This function will serve as the utility to fetch
    * comments data from the database
    * @return json data
    */
    public function showComments()
    {
    	try {
    		$comments = DB::table('tbl_comments')
    						->where('parent_id', '=', 0)
    						->latest('created_datetime')
    						->get();
    		$comments_array = array();
    		foreach($comments as $comment):
    			$comment->created_datetime = date('F d, Y h:i:s', strtotime($comment->created_datetime));
    			$comment->replies = $this->getReplies($comment->comment_id);
    			if(count($comment->replies) > 0):
    				foreach($comment->replies as $reply):
    					$reply->created_datetime = date('F d, Y h:i:s', strtotime($reply->created_datetime));
    					$reply->replies = $this->getReplies($reply->comment_id);
    					foreach($reply->replies as $reply2):
    						$reply2->created_datetime = date('F d, Y h:i:s', strtotime($reply2->created_datetime));
    					endforeach;
    				endforeach;
    			endif;
    			array_push($comments_array, $comment);
    		endforeach;
    		return response()->json($comments_array);
    	} catch (\Exception $e) {
    		return response()->json($e->getMessage());
    	}
    }

    /**
    * Add Comment Function
    * This function will serve as the utility to
    * insert new comment to the database from the user
    * @param $request = request data
    * @return json data
    */
    public function addComment(Request $request)
   	{
   		try {
	    	$this->validate($request, [
	    		'author' 	=> 'required',
	    		'comment' 	=> 'required',
	    		'parent_id' => 'filled'
			]);

			$comment = DB::table('tbl_comments')->insert([
				'author' => $request->author,
				'comment' => $request->comment,
				'parent_id' => $request->parent_id,
			]);

			if($comment):
				return response()->json($comment);
			endif;
   		} catch (\Exception $e) {
   			return response()->json($e->getMessage());
   		}
    }

    /**
    * Get Replies Function
    * This function will serve as the utility to
    * fetching replies data from the database
    * @param $comment_id = comment_id
    * @return json data
    */
    protected function getReplies($comment_id)
    {
    	try {
    		$replies = DB::table('tbl_comments')
    						->where('parent_id', '=', $comment_id)
    						->latest('created_datetime')
    						->get();

    		return $replies;
    	} catch (\Exception $e) {
    		return response()->json($e->getMessage());
    	}
    }
}
