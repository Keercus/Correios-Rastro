<?php declare(strict_types=1);

namespace Correios\Rastro;

class Config
{
    const TYPE_LIST_OBJECT = 'L';

    const TYPE_INTERVAL_OBJECT = 'F';

    const RESULT_LIST_EVENT = 'T';

    const RESULT_LAST_EVENT = 'U';

    private $username = 'ECT';

    private $password = 'SRO';

    private $type = self::TYPE_LIST_OBJECT;

    private $resultType = self::RESULT_LAST_EVENT;

    private $language = '101';

    public function __construct(?array $data = [])
    {
        $this->username = $data['user'] ?? $this->username;
        $this->password = $data['pass'] ?? $this->password;
        $this->type = $data['tipo'] ?? $this->type;
        $this->resultType = $data['resultado'] ?? $this->resultType;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function getResultType() : string
    {
        return $this->resultType;
    }

    public function getLanguage() : string
    {
        return $this->language;
    }
}
