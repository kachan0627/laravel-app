<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    //test中でもlocal環境を見に行ってしまうため、キャッシュを読み込まないようにしている
    //if(file_exists(_DIR_.''))
}
