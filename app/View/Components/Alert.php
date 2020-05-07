<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message)
    {
      $this->type = $type;
      $this->message = $message;
    }

    public function typeIcon() {
      $icon = null;

      switch ( $this->type ) {
        case 'success':
          $icon = 'check';
          break;

        case 'warning' :
          $icon = 'exclamation';
          break;

        case 'info' :
          $icon = 'info';
          break;

        case 'danger' :
          $icon = 'times';
          break;
      }

      return $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
