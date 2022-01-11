<?php

namespace Tests\Feature;

use App\Models\Instant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class commentatorsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_comment_an_instant()
    {
        $user = User::factory()->create();
        $instant = Instant::factory()->create();

        $comment = "This is an comment";
        $instant->addComment($user, $comment);
        foreach ($instant->commentators as $comment){
            //dd($comment->pivot->user_id);
           // dd($comment->pivot->comment);
        }
        //$this->assertEquals($comment, $test);
        $this->assertCount(1,$instant->commentators);
    }

}
