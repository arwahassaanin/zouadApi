<?php

namespace App\Services;

use Google\Client;
use Google\Service\Gmail;

class GmailService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Client();

        $this->client->setAuthConfig(storage_path('app/google/credentials.json'));
        $this->client->setRedirectUri('https://zouad-n2k6.onrender.com/gmail/callback');
        $this->client->setAccessType('offline');
        $this->client->setPrompt('consent');
        $this->client->addScope(Gmail::GMAIL_SEND);

        $this->service = new Gmail($this->client);
    }

    public function getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }

    public function handleCallback($code)
    {
        $token = $this->client->fetchAccessTokenWithAuthCode($code);
        session(['gmail_token' => $token]);
    }

    public function sendEmail($to, $subject, $messageText)
    {
        $strRawMessage = "To: <$to>\r\n";
        $strRawMessage .= "Subject: $subject\r\n";
        $strRawMessage .= "MIME-Version: 1.0\r\n";
        $strRawMessage .= "Content-Type: text/html; charset=utf-8\r\n\r\n";
        $strRawMessage .= $messageText;

        $mime = rtrim(strtr(base64_encode($strRawMessage), '+/', '-_'), '=');
        $msg = new \Google\Service\Gmail\Message();
        $msg->setRaw($mime);

        return $this->service->users_messages->send('me', $msg);
    }
}
