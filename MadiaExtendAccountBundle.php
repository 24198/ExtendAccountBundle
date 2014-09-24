<?php

namespace Madia\Bundle\ExtendAccountBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MadiaExtendAccountBundle extends Bundle {
        
    public function getParent() {
        return 'OroCRMAccountBundle';
    }
}
