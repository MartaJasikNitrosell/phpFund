<?php

namespace Lab;

class Animal
{
  private $name;
  private $weight;
  private $age;

  /**
   * Animal constructor.
   * @param string $name
   * @param float $weight
   * @param int $age
   * @param string $owner
   */
  public function __construct(string $name, float $weight, int $age)
  {
    $this->name = $name;
    $this->weight = $weight;
    $this->age = $age;
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  /**
   * @return float
   */
  public function getWeight(): float
  {
    return $this->weight;
  }

  /**
   * @param float $weight
   */
  public function setWeight(float $weight): void
  {
    $this->weight = $weight;
  }

  /**
   * @return int
   */
  public function getAge(): int
  {
    return $this->age;
  }

  /**
   * @param int $age
   */
  public function setAge(int $age): void
  {
    $this->age = $age;
  }

  public function getAnimalData() {
    echo "Name: " . $this->getName() . ", Weight: " . $this->getWeight() . ", Age: " . $this->getAge() . "." . PHP_EOL;
  }

}