<?php
namespace Lab;

class Mammal extends Animal
{
  private $numOfLegs;
  private $hasTail;
  private $hasFur;

  public function __construct(string $name, float $weight, int $age, int $numOfLegs, bool $hasTail, bool $hasFur)
  {
    parent ::__construct($name, $weight, $age);
    $this->numOfLegs = $numOfLegs;
    $this->hasTail = $hasTail;
    $this->hasFur = $hasFur;
  }

  /**
   * @return int
   */
  public function getNumOfLegs(): int
  {
    return $this->numOfLegs;
  }

  /**
   * @param int $numOfLegs
   */
  public function setNumOfLegs(int $numOfLegs): void
  {
    $this->numOfLegs = $numOfLegs;
  }

  /**
   * @return bool
   */
  public function isHasTail(): bool
  {
    return $this->hasTail;
  }

  /**
   * @param bool $hasTail
   */
  public function setHasTail(bool $hasTail): void
  {
    $this->hasTail = $hasTail;
  }

  /**
   * @return bool
   */
  public function isHasFur(): bool
  {
    return $this->hasFur;
  }

  /**
   * @param bool $hasFur
   */
  public function setHasFur(bool $hasFur): void
  {
    $this->hasFur = $hasFur;
  }

  public function callForMeal() {
    $sounds = ["meow", "bark", "purrr"];
    echo $sounds[array_rand($sounds)] . "!" . PHP_EOL;
  }

}