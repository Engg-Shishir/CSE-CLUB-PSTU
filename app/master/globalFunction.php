<?php

function shishirEnv(string $key): string
{
  return isset($_ENV[$key]) ? $_ENV[$key] : "";
}


function view(string $path,array $data=[]): void
{
  /**
   * extract() function get arrt data. Then make each array item into idividual item
   */
  extract($data);
  require_once VIEWS . '/' . $path;
}



function parray($data): void
{
  /**
   * extract() function get arrt data. Then make each array item into idividual item
   */
  
  echo"<h2 style='color:red;'>Associative array : </h2>";
  echo"<pre>";
    print_r($data);
  echo"</pre>";
}


function assets(string $path): string
{
  return ASSET_URL.'/'.$path;
}

