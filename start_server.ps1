Write-Host "🚀 Starting Laravel Server..."
Start-Process powershell -ArgumentList "-NoExit cd C:\xampp\htdocs\zouad; php artisan serve"

Start-Sleep -Seconds 5

Write-Host "🌍 Starting ngrok tunnel..."
Start-Process powershell -ArgumentList "-NoExit ngrok http 8000"
