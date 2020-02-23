<?php

declare(strict_types=1);

namespace HttpClient\Aliyun;

use HttpClient\Client;

class LogServiceProject extends Client
{
    use LogService\EncapsulatesRequests,
        LogServiceProject\ManagesInfo,
        LogServiceProject\ManagesLogs,
        LogServiceProject\ManagesLogstores;

    public function __construct(array $options = [])
    {
        parent::__construct($options);

        $this->setBaseUri('https://'.$this->options['endpoint']);
    }
}