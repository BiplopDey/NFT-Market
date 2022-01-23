<?php

namespace Tests\Feature\Src\Instant;

use App\Src\Instant\Domain\Exceptions\IdNotFound;
use App\Src\Instant\Domain\Exceptions\IncorrectImage;
use App\Src\Instant\Domain\Exceptions\IncorrectTitle;
use App\Src\Instant\Domain\Image;
use App\Src\Instant\Domain\InstantId;
use App\Src\Instant\Domain\Title;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DomainTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_set_InstantId()
    {
        $id = new InstantId(1);
        $this->assertEquals(1, $id->value());
    }

    public function test_wrong_InstantId()
    {
        $this->expectException(IdNotFound::class);
        $id = new InstantId(-1);
    }

    public function test_set_title()
    {
        $title = new Title("Hola");
        $this->assertEquals("Hola", $title->value());
    }

    public function test_wrong_title()
    {
        $this->expectException(IncorrectTitle::class);
        $str="";
        new Title($str);
    }

    public function test_set_image()
    {
        $image = new Image("hola.png");
        $this->assertEquals("hola.png", $image->value());
    }

    public function test_wrong_image()
    {
        $this->expectException(IncorrectImage::class);
        $str="";
        new Image($str);
    }
}
