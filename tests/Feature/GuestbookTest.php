<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Guestbook;
class GuestbookTest extends TestCase
{
    use DatabaseMigrations;

    

    /** @test */
    public function check_list_order_by_desc(){

        factory(Guestbook::class)->createMany([
            ["email" => "a@gmail.com"],
            ["email" => "b@gmail.com"],
            ["email" => "c@gmail.com"],
        ]);
        $response = $this->json("get","api/guestbook");

        $this->assertEquals($response['data'][0]['email'],"c@gmail.com");
    }

    /** @test */
    public function check_list_3_record_per_page(){

        factory(Guestbook::class,4)->create();
        $response = $this->json("get","api/guestbook");
        $this->assertEquals(count($response['data']),3);

        $response = $this->json("get","api/guestbook?page=2");
        $this->assertEquals(count($response['data']),1);
    }

    /** @test */
    public function check_validate_title_doesnt_required(){
        $response = $this->postGuestbook(["title" => "","email" => "w@b.com","text" => "text"]);
        $response->assertStatus(422);
    }

    /** @test */
    public function check_validate_email_doesnt_required(){
        $response = $this->postGuestbook(["title" => "title","email" => "","text" => "aa"]);
        $response->assertStatus(422);
    }

    /** @test */
    public function check_validate_email_doesnt_valid(){
        $response = $this->postGuestbook(["title" => "title","email" => "a","text" => "aa"]);
        $response->assertStatus(422);
    }

    /** @test */
    public function check_validate_duplicate_email(){
        $this->postGuestbook(["title" => "title","email" => "a@b.com","text" => "aa"]);

        $response = $this->postGuestbook(["title" => "title","email" => "a@b.com","text" => "aa"]);
        $response->assertStatus(422);

    }

    /** @test */
    public function check_validate_text_doesnt_required(){
        $response = $this->postGuestbook(["title" => "title","email" => "w@b.com","text" => ""]);
        $response->assertStatus(422);
    }
    /** @test */
    public function check_create_guestbook(){
        $response = $this->postGuestbook(["title" => "ss","email" => "w@b.com","text" => "aa"]);
        $response->assertStatus(201)
                 ->assertJson(["title" => "ss","email" => "w@b.com","text" => "aa"]);
    }

    private function postGuestbook($params){
        return $this->json("post","api/guestbook",$params);
    }

    /** @test */
    public function check_destroy_a_guestbook(){
        $guestbooks = factory(Guestbook::class,2)->create();

        $this->json("delete","api/guestbook/".$guestbooks[0]->id);

        $response = $this->json("get","api/guestbook");
        $this->assertEquals(count($response['data']),1);

    }

    /** @test */
    public function check_load_a_guestbook(){

        $data = ["title" => "title",'email' => 'a@b.com', 'text' => 'text'];
        $guestbook = factory(Guestbook::class)->create($data);

        $responce = $this->json("get","api/guestbook/".$guestbook->id."/edit");
        $responce->assertStatus(200)
            ->assertJson($data);



    }

    /** @test */
    public function check_update_a_guestbook(){
        $newTitle = "new title";
        $guestbook = factory(Guestbook::class)->create(["title" => "title"]);

        $this->json("put","api/guestbook/".$guestbook->id,["title" => $newTitle]);

        $response = $this->json("get","api/guestbook");

        $this->assertEquals($response['data'][0]['title'], $newTitle);

    }

}
