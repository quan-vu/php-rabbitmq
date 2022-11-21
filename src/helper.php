<?php

 if (!function_exists('configs'))
 {
     function config(string $key): string
     {
         return getenv($key);
//         $config = Config();
//         return $config[$key];
     }
 }
