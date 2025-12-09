<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>We are attaching the PDF document you generated.</p>
</body>
</html>

email sending mail from the controller:
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;

Mail::to('test@example.com')->send(new PDFMail());
