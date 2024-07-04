<?php

namespace App\Actions;

class EmailData
{

    /**
     * @param string $subject
     * @param array $lines
     * @param string $from
     * @param null|string $remark
     * @param bool $action
     * @param null|string $action_text
     * @param null|string $action_url
     * @param null|string $replyTo
     */

    public function __construct(public string $subject,
        public array $lines,
        public string $from = "no-reply@africanies.com",
        public null|string $remark = null,
        public bool $action = false,
        public null|string $action_text = null,
        public null|string $action_url = null,
        public null|string $replyTo = null,
    ) { }

    public function toArray(): array
    {
        return [
            'subject' => $this->subject,
            'from' => $this->from,
            'lines' => $this->lines,
            'remark' => $this->remark,
            'action' => $this->action,
            'action_text' => $this->action_text,
            'action_url' => $this->action_url,
            'replyTo' => $this->replyTo
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toObject(): object
    {
        return (object) $this->toArray();
    }
}
