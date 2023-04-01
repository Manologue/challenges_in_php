<?php



class StrainerImp implements Strainer
{
   protected array $juice = [];

   protected int $juiceCount = 0;



   public function getJuice(): array
   {
      return $this->juice;
   }

   public function setJuice($juice): self
   {
      $this->juice[] = $juice;

      return $this;
   }


   public function getJuiceCount(): int
   {
      return $this->juiceCount;
   }


   public function setJuiceCount(int $juiceCount): self
   {
      $this->juiceCount = $juiceCount;

      return $this;
   }


   public function strainer(float|int $quantity): void
   {
      $this->juice[] = $quantity . 'ml of apple juice';
      echo 'extracting ' . $this->juice[$this->juiceCount] . '<br/>';
      $this->juiceCount = count($this->juice);
   }

}