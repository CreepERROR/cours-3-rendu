<?php

namespace Tests;

use App\Entity\Person;
use App\Entity\Wallet;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testGetName(): void
    {
        $person = new Person('John Doe', 'USD');
        $this->assertEquals('John Doe', $person->getName());
    }

    public function testSetName(): void
    {
        $person = new Person('John Doe', 'USD');
        $person->setName('Jane Doe');
        $this->assertEquals('Jane Doe', $person->getName());
    }

    public function testGetWallet(): void
    {
        $person = new Person('John Doe', 'USD');
        $wallet = new Wallet('USD');
        $person->setWallet($wallet);
        $this->assertEquals($wallet, $person->getWallet());
    }

    public function testSetWallet(): void
    {
        $person = new Person('John Doe', 'USD');
        $wallet = new Wallet('USD');
        $person->setWallet($wallet);
        $this->assertEquals($wallet, $person->getWallet());
    }

    public function testHasFund(): void
    {
        $person = new Person('John Doe', 'USD');
        $wallet = new Wallet('USD');
        $wallet->setBalance(100);
        $person->setWallet($wallet);
        $this->assertTrue($person->hasFund());
    }

    public function testTransferFunds(): void
    {
        $person1 = new Person('John Doe', 'USD');
        $person2 = new Person('Jane Doe', 'USD');
        $wallet1 = new Wallet('USD');
        $wallet2 = new Wallet('USD');
        $wallet1->setBalance(100);
        $person1->setWallet($wallet1);
        $person2->setWallet($wallet2);
        $person1->transfertFund(50,$person2);
        $this->assertEquals(50, $person1->getWallet()->getBalance());
        $this->assertEquals(50, $person2->getWallet()->getBalance());
    }

    public function testDivideWallets(): void
    {
        $person1 = new Person('John Doe', 'USD');
        $person2 = new Person('Jane Doe', 'USD');
        $wallet1 = new Wallet('USD');
        $wallet2 = new Wallet('USD');
        $wallet1->setBalance(100);
        $person1->setWallet($wallet1);
        $person2->setWallet($wallet2);
        $person1->divideWallet([$person1,$person2]);
        $this->assertEquals(50, $person1->getWallet()->getBalance());
        $this->assertEquals(50, $person2->getWallet()->getBalance());
    }

    public function testBuyProduct(): void
    {
        $person = new Person('John Doe', 'USD');
        $wallet = new Wallet('USD');
        $wallet->setBalance(100);
        $person->setWallet($wallet);
        $product = new Product('product', ['USD' => 50], 'food');
        $person->buyProduct($product);
        $this->assertEquals(50, $person->getWallet()->getBalance());
    }

}
