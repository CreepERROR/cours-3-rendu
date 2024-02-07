<?php

namespace Tests;

use App\Entity\Person;
use App\Entity\Wallet;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class WalletTest extends TestCase
{
    public function testGetBalance(): void
    {
        $wallet = new Wallet('USD');
        $wallet->setBalance(100);
        $this->assertEquals(100, $wallet->getBalance());
    }

    public function testGetCurrency(): void
    {
        $wallet = new Wallet('USD');
        $this->assertEquals('USD', $wallet->getCurrency());
    }

    public function testSetBalance(): void
    {
        $wallet = new Wallet('USD');
        $wallet->setBalance(100);
        $this->assertEquals(100, $wallet->getBalance());
    }

    public function testSetCurrency(): void
    {
        $wallet = new Wallet('USD');
        $wallet->setCurrency('EUR');
        $this->assertEquals('EUR', $wallet->getCurrency());
    }

    public function testRemoveFund(): void
    {
        $wallet = new Wallet('USD');
        $wallet->setBalance(100);
        $wallet->removeFund(50);
        $this->assertEquals(50, $wallet->getBalance());
    }

    public function testAddFund(): void
    {
        $wallet = new Wallet('USD');
        $wallet->setBalance(100);
        $wallet->addFund(50);
        $this->assertEquals(150, $wallet->getBalance());
    }
}
