<?php

namespace Controller;

use eftec\bladeone\BladeOne;
use Psr\Container\ContainerInterface;

abstract class Controller
{
    /**
     * @param  ContainerInterface $ci
     * @param  BladeOne $blade
     */
    public function __construct(protected ContainerInterface $ci, private BladeOne $blade)
    {
    }

    /**
     * @param string $template
     * @param array $data
     * 
     * @return string
     */
    public function render(string $template,  array $data = []): string
    {
        return $this->blade->run($template, $data);
    }
}
