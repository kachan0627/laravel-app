<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    //test中でもlocal環境を見に行ってしまうため、キャッシュを読み込まないようにしている
  /*  public function createApplication()
    {
    if(file_exists(__DIR__.'/../bootstrap/cache/config.php'))
        unlink(__DIR__.'/../bootstrap/cache/config.php');
    }*/
}
