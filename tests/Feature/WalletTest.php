<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Wallet;
use App\Transfer;

class WalletTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testtestGetWallet()
    {
        $wallet = factory(Wallet::class)->create();
        $transfers = factory(Transfer::class, 3)->create([
            'wallet_id' => $wallet->id
        ]);

        $response = $this->json('GET', '/api/wallet');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id', 'money', 'cripto', 'transfers' => [
                    '*' => [
                        'id', 'amount', 'criptoamount', 'description', 'wallet_id'
                    ]
                ]
            ]);

        $this->assertCount(3, $response->json()['transfers']);
    }
}
