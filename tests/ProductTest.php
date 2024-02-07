<?php

namespace Tests;

use App\Entity\Person;
use App\Entity\Wallet;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class productTest extends TestCase
{
   public function testGetName(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $this->assertEquals('product', $product->getName());
   }

   public function testGetPrice(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $this->assertEquals(['USD' => 50], $product->getPrices());
   }

   public function testGetType(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $this->assertEquals('food', $product->getType());
   }

   public function testSetType(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $product->setType('tech');
       $this->assertEquals('tech', $product->getType());
   }

   public function testSetPrice(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $product->setPrices(['USD' => 100]);
       $this->assertEquals(['USD' => 100], $product->getPrices());
   }

   public function testSetName(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $product->setName('newProduct');
       $this->assertEquals('newProduct', $product->getName());
   }

   public function testGetTVA(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $this->assertEquals(0.1, $product->getTVA());
   }

   public function testListCurrencies(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $this->assertEquals(['USD'], $product->listCurrencies());
   }

   public function testGetPriceInCurrency(): void
   {
       $product = new Product('product', ['USD' => 50], 'food');
       $this->assertEquals(50, $product->getPrice('USD'));
   }
}
