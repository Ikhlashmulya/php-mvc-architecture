<?php

namespace Ikhlashmulya\Phpweb\Middleware;

class AuthMiddleware implements Middleware {
  public function handle() {
    echo("Before execute handler");
  }
}