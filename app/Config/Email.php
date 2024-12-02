<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // Setel email pengirim
    public string $fromEmail  = 'haris.febriyan.stmik@krw.horizon.ac.id';  // Ganti dengan email pengirim yang benar
    public string $fromName   = 'Sdn 01Wwdas'; // Ganti dengan nama pengirim yang benar
    public string $recipients = 'recipient@example.com'; // Ganti dengan email penerima yang benar

    // User agent
    public string $userAgent = 'CodeIgniter';

    // Protokol pengiriman email
    public string $protocol = 'smtp';

    // Pengaturan SMTP Mailtrap
    public string $SMTPHost = 'sandbox.smtp.mailtrap.io';  // SMTP server Mailtrap
    public string $SMTPUser = '52f6526741da63';  // Username Mailtrap Anda
    public string $SMTPPass = '********5461';  // Password Mailtrap Anda (ganti dengan password yang benar)
    public int $SMTPPort = 2525;  // Port SMTP Mailtrap
    public int $SMTPTimeout = 5;
    public bool $SMTPKeepAlive = false;
    public string $SMTPCrypto = 'tls';  // Gunakan TLS untuk pengamanan koneksi

    // Pengaturan lainnya
    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html';  // Setel ke 'html' untuk email dalam format HTML
    public string $charset = 'UTF-8';
    public bool $validate = false;
    public int $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";
    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;
}
?>