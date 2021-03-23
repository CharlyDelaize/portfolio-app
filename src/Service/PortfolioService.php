<?php
// src/Service/PortfolioService
//...

use Symfony\Component\Security\Core\Security;

class PortfolioService{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function someMethod()
    {
        $user = $this->security->getUser();
    }
}

?>