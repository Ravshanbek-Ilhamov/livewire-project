<?php

namespace App\Livewire;

use Livewire\Component;

class AboutComponent extends Component
{
    public $number1 = '';
    public $number2 = '';
    public $result = '';
    public $operator = '';
   

    public function calculate(){

        if($this->number1 && $this->number2 && $this->operator){

            switch ($this->operator){
                case '-':
                    $this->result= $this->number1 - $this->number2;
                    break;

                case '+':
                    $this->result= $this->number1 + $this->number2;
                    break;

                case '/':
                    $this->result= $this->number1 / $this->number2;
                    break;

                case '*':
                    $this->result= $this->number1 * $this->number2;
                    break;

                case '%':
                    $this->result= $this->number1 % $this->number2;
                    break;
                default:
                    $this->result = 0 ;
            }
        }
        $this->number1 = '';
        $this->number2 = '';
    }


    public function render()
    {
        return view('livewire.about-component');
    }
}
