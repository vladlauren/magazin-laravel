<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestS extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
      //Se testeaza daca un utilizator nelogat este redirectionat la pagina de logare daca acceseaza magazinul
        $response = $this->get('/shop')->assertRedirect('/login');

    }
}
