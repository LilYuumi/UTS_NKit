<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NATIONKIT.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
            background-image: 
                linear-gradient(rgba(14, 165, 233, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(14, 165, 233, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            position: relative;
            transition: opacity 0.5s ease-out;
        }
        body.fade-out {
            opacity: 0;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(14, 165, 233, 0.05) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(14, 165, 233, 0.05) 0%, transparent 50%),
                        radial-gradient(circle at 40% 80%, rgba(14, 165, 233, 0.05) 0%, transparent 50%);
            animation: pulse 10s ease-in-out infinite alternate;
            pointer-events: none;
        }
        @keyframes pulse {
            0% { opacity: 0.3; }
            100% { opacity: 0.7; }
        }
        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            min-height: 900px;
            position: relative;
            z-index: 1;
        }
        .left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 50px;
        }
        .logo {
            font-family: 'Orbitron', monospace;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(14, 165, 233, 0.5);
        }
        .headline {
            font-family: 'Orbitron', monospace;
            font-size: 120px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
        }
        .headline .highlight {
            color: #0ea5e9;
            text-shadow: 0 0 30px rgba(14, 165, 233, 0.8);
        }
        .sub {
            font-size: 24px;
            font-weight: 400;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        .button {
            display: inline-block;
            background-color: #0ea5e9;
            color: white;
            padding: 20px 40px;
            font-size: 24px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(14, 165, 233, 0.5);
        }
        .button:hover {
            box-shadow: 0 0 30px rgba(14, 165, 233, 1);
            transform: scale(1.05);
        }
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 50px;
            position: relative;
        }
        .gundam {
            width: 600px;
            height: auto;
            filter: drop-shadow(0 0 30px rgba(14, 165, 233, 0.8));
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }
        .particle {
            position: absolute;
            background: rgba(14, 165, 233, 0.3);
            border-radius: 50%;
            animation: drift 15s linear infinite;
        }
        .particle:nth-child(1) { width: 4px; height: 4px; top: 10%; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 6px; height: 6px; top: 20%; left: 80%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 3px; height: 3px; top: 60%; left: 20%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 5px; height: 5px; top: 80%; left: 70%; animation-delay: 6s; }
        .particle:nth-child(5) { width: 4px; height: 4px; top: 40%; left: 50%; animation-delay: 8s; }
        @keyframes drift {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }
        .ticker {
            background-color: #0f172a;
            padding: 10px 0;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            z-index: 1;
        }
        .ticker-text {
            display: inline-block;
            font-size: 18px;
            animation: scroll 20s linear infinite;
        }
        @keyframes scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 20px;
                min-height: auto;
            }
            .left {
                padding-left: 0;
                margin-bottom: 40px;
            }
            .headline {
                font-size: 80px;
            }
            .sub {
                font-size: 18px;
            }
            .button {
                width: 100%;
                padding: 15px;
                font-size: 20px;
            }
            .right {
                padding-right: 0;
            }
            .gundam {
                width: 300px;
            }
            .particles {
                display: none; /* Hide particles on mobile for performance */
            }
        }
    </style>
</head>
<body>
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    <div class="hero">
        <div class="left">
            <div class="logo">NATIONKIT.ID</div>
            <div class="headline">BUILD YOUR GUNPLA <span class="highlight">20.</span></div>
            <div class="sub">1000+ Bandai kits • COD Bali • Workshop mingguan</div>
            <a href="index.php" class="button" onclick="transitionToPage()">GET STARTED</a>
        </div>
        <div class="right">
            <img src="assets/img/gundam2nobg.png" alt="RX-78-2 Gundam" class="gundam">
        </div>
    </div>
    <div class="ticker">
        <div class="ticker-text">FLASH BUILD 1-JAM • OFFLINE STORE IN BALI • WORKSHOP LETUS 4 • FLASH BUILD 1-JAM • AVAILABLE IN SHOPEE   • WORKSHOP LETUS 4</div>
    </div>
    <script>
        function transitionToPage() {
            document.body.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = 'index.php';
            }, 500); // Match the transition duration
        }
    </script>
</body>
</html>
