<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Camera</title>
    <script src="https://cdn.jsdelivr.net/npm/qr-scanner@1.4.2/qr-scanner.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #111; color: white; margin:0; padding:20px; }
        video { width:100%; max-width:500px; border:5px solid #0f0; border-radius:15px; }
        #result { margin:20px; padding:20px; background:#222; border-radius:12px; font-size:1.4em; min-height:80px; }
        button { padding:18px 35px; font-size:1.3em; margin:10px; border-radius:12px; background:#0f0; color:black; font-weight:bold; }
    </style>
</head>
<body>
    <h1>📷 Scanare QR cu Camera</h1>
    <p>Apasă butonul pentru a porni camera</p>
    
    <video id="video"></video>
    <div id="result">Aștept scanare...</div>
    
    <button onclick="startScan()">▶ Pornire Cameră</button>
    <button onclick="stopScan()">⏹ Oprire Cameră</button>

    <script>
        let qrScanner = null;

        function startScan() {
            const video = document.getElementById('video');
            
            qrScanner = new QrScanner(video, result => {
                document.getElementById('result').innerHTML = `
                    <strong>✅ Cod scanat:</strong><br>
                    <span style="color:#0f0; font-size:1.3em;">${result}</span>
                `;
                alert("✅ Scanat cu succes!\n\n" + result);
                stopScan();
            }, {
                highlightScanRegion: true,
                highlightCodeOutline: true,
                facingMode: "environment"
            });

            qrScanner.start().catch(err => {
                alert("❌ Eroare la pornirea camerei:\n" + err);
            });
        }

        function stopScan() {
            if (qrScanner) {
                qrScanner.stop();
            }
        }
    </script>
</body>
</html>
