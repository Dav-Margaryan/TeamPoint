<?php

class BrevoMail
{
    private string $apiKey;
    private string $endpoint = 'https://api.brevo.com/v3/smtp/email';

    public function __construct()
    {
//        $this->apiKey = $_ENV['BREVO_API_KEY']; // Render env var
//        $this->apiKey =  getenv('BREVO_API_KEY');
        $this->apiKey =  BREVO_API_KEY;
    }

    public function send(string $to, string $subject, string $html): bool
    {
        $data = [
            "sender" => [
                "name" => "TeamPoint",
                "email" => "app.teampoint@gmail.com"
            ],
            "to" => [
                ["email" => $to]
            ],
            "subject" => $subject,
            "htmlContent" => $html
        ];

        $ch = curl_init($this->endpoint);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "api-key: {$this->apiKey}",
                "Content-Type: application/json",
                "Accept: application/json"
            ],
            CURLOPT_POSTFIELDS => json_encode($data)
        ]);

        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode >= 200 && $httpCode < 300;
    }
}
