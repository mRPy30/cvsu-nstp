<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Generator</title>
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
    font-family: 'Arial', sans-serif;
}

.certificate-container {
    text-align: center;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

canvas {
    border: 1px solid #ccc;
    margin-top: 20px;
    border-radius: 5px;
}

input {
    margin-top: 10px;
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    margin-top: 20px;
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

</style>
</head>
<body>
<div class="certificate-container">
        <canvas id="certificateCanvas"></canvas>
        <input id="nameInput" type="text" placeholder="Your Name">
        <button id="generateButton">Generate Certificate</button>
    </div>
    <script>
        const canvas = document.getElementById('certificateCanvas');
const nameInput = document.getElementById('nameInput');
const generateButton = document.getElementById('generateButton');
const ctx = canvas.getContext('2d');

canvas.width = 800;
canvas.height = 600;

generateButton.addEventListener('click', generateCertificate);

function generateCertificate() {
    const recipientName = nameInput.value || 'Your Name';

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Certificate background
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Certificate header
    ctx.fillStyle = '#007bff';
    ctx.fillRect(0, 0, canvas.width, 100);

    // Certificate title
    ctx.font = 'bold 28px Arial';
    ctx.fillStyle = '#ffffff';
    ctx.textAlign = 'center';
    ctx.fillText('Certificate of Completion', canvas.width / 2, 70);

    // NSTP subject
    ctx.font = '24px Arial';
    ctx.fillStyle = '#333333';
    ctx.textAlign = 'center';
    ctx.fillText('National Service Training Program', canvas.width / 2, 150);

    // Recipient's name
    ctx.font = '24px Arial';
    ctx.fillStyle = '#333333';
    ctx.textAlign = 'center';
    ctx.fillText(`This is to certify that`, canvas.width / 2, 230);
    ctx.fillText(`${recipientName}`, canvas.width / 2, 270);
    ctx.fillText(`has successfully completed the NSTP subject`, canvas.width / 2, 310);
    
    // Subject name
    ctx.font = 'italic 24px Arial';
    ctx.fillStyle = '#555555';
    ctx.fillText(`Introduction to Civic Welfare Training Service`, canvas.width / 2, 360);
    
    // Date
    ctx.font = '18px Arial';
    ctx.fillText(`Date: August 31, 2023`, canvas.width / 2, 420);

    // Signature
    ctx.fillText('Signature:', canvas.width / 2, 480);
    // You can use an image for the signature
    
    // Download the certificate
    const downloadLink = document.createElement('a');
    downloadLink.href = canvas.toDataURL('image/png');
    downloadLink.download = 'nstp_certificate.png';
    downloadLink.click();
}

    </script>
</body>
</html>
