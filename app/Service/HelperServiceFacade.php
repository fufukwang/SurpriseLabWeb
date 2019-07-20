<?php
namespace App\Service;
use Illuminate\Support\Facades\Facade;
class HelperServiceFacade extends Facade{
   protected static function getFacadeAccessor() { return 'sls'; }
}