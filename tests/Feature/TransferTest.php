<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Wallet;
use App\Transfer;

use phpDocumentor\Reflection\DocBlock\Description;

class TransferTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostTransfer()
    {
        $wallet = factory(Wallet::class)->create();
        $transfer = factory(Transfer::class)->make();

        $response = $this->json('POST', '/api/transfer', [

            'description' =>  $transfer->decription,
            'amount'       => $transfer->amount,
            'criptoamount' => $transfer->criptoamount,
            'wallet_id'    => $wallet->id

        ]);

        $response->assertJsonStructure([

            'id', 'description', 'amount', 'criptoamount', 'wallet_id'
        ])->assertStatus(201);

        $this->assertDatabaseHas('transfers', [
            'description' =>  $transfer->decription,
            'amount'      =>  $transfer->amount,
            'criptoamount' =>  $transfer->criptoamount,
            'wallet_id'   =>  $wallet->id
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $wallet->id,
            'money' => $wallet->money + $transfer->amount,
            'cripto' => $wallet->cripto + $transfer->criptoamount
        ]);
    }
}
