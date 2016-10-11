<?php

Artisan::command('im {name}', function($name){
    $this->info('Good to meet you, ', $name);
})->describe('This command will say hello back to you');