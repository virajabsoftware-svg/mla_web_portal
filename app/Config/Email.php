<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{


    //protocol	mail	smtp
    //SMTPHost	empty ''	smtp.gmail.com
    //SMTPPort	25	587
    //SMTPTimeout	5	30
    //mailType	text	html
    //validate	false	true

    public string $fromEmail = '';
    public string $fromName = 'Voter Portal';

    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';

    // SMTP enable
    public string $protocol = 'smtp';

    public string $mailPath = '/usr/sbin/sendmail';

    // Gmail SMTP
    public string $SMTPHost = 'smtp.gmail.com';

    public string $SMTPAuthMethod = 'login';

    public string $SMTPUser = '';

    public string $SMTPPass = '';

    public int $SMTPPort = 587;

    public int $SMTPTimeout = 30;

    public bool $SMTPKeepAlive = false;

    public string $SMTPCrypto = 'tls';

    public bool $wordWrap = true;

    public int $wrapChars = 76;

    public string $mailType = 'html';

    public string $charset = 'UTF-8';

    public bool $validate = true;

    public int $priority = 3;

    public string $CRLF = "\r\n";

    public string $newline = "\r\n";

    public bool $BCCBatchMode = false;

    public int $BCCBatchSize = 200;

    public bool $DSN = false;

    public function __construct()
    {
        $this->fromEmail = (string) (getenv('email.fromEmail') ?: '');
        $this->fromName = (string) (getenv('email.fromName') ?: 'Voter Portal');
        $this->SMTPHost = (string) (getenv('email.SMTPHost') ?: 'smtp.gmail.com');
        $this->SMTPUser = (string) (getenv('email.SMTPUser') ?: '');
        $this->SMTPPass = preg_replace(
            '/\s+/',
            '',
            (string) (getenv('email.SMTPPass') ?: '')
        ) ?? '';
    }
}