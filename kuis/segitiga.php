<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator 4 Piramida Grid 2x2</title>
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-color: #1e293b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: var(--card-bg);
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 900px;
            box-sizing: border-box;
            text-align: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: var(--primary);
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: var(--primary);
        }

        button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s, transform 0.1s;
        }

        button:hover {
            background-color: var(--primary-hover);
        }

        button:active {
            transform: scale(0.98);
        }

        .error {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        /* Mengatur tata letak grid 2x2 */
        .result-container {
            margin-top: 25px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        @media (max-width: 768px) {
            .result-container {
                grid-template-columns: 1fr; /* Responsif jadi 1 kolom di layar HP kecil */
            }
        }

        .piramida-box {
            background-color: #0f172a;
            border-radius: 10px;
            padding: 15px;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.4);
            box-sizing: border-box;
            text-align: left;
        }

        .piramida-title {
            color: #38bdf8;
            font-weight: bold;
            font-size: 13px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hasil {
            font-family: 'Courier New', Courier, monospace;
            font-size: 15px;
            line-height: 1.2;
            color: #4ade80;
            margin: 0;
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>✨ Generator 4 Piramida (Layout Grid 2x2)</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="tinggi">Masukkan Tinggi/Ukuran (1 - 10):</label>
                <input type="number" id="tinggi" name="tinggi" min="1" max="10" 
                       value="<?php echo isset($_POST['tinggi']) ? htmlspecialchars($_POST['tinggi']) : ''; ?>" 
                       placeholder="Contoh: 5" required>
            </div>
            <button type="submit">Tampilkan 4 Piramida</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = trim($_POST['tinggi']);

            // Validasi input bilangan bulat antara 1 sampai 10
            $tinggi = filter_var($input, FILTER_VALIDATE_INT, [
                "options" => [
                    "min_range" => 1,
                    "max_range" => 10
                ]
            ]);

            if ($tinggi === false) {
                echo '<div class="error">⚠️ Input tidak valid! Harap masukkan angka bulat antara 1 sampai 10.</div>';
            } else {
                echo '<div class="result-container">';

                // --- PIRAMIDA 1: Siku-siku Rata Kiri ---
                echo '<div class="piramida-box">';
                echo '<div class="piramida-title">1. Siku-siku Rata Kiri</div>';
                echo '<pre class="hasil">';
                for ($i = 1; $i <= $tinggi; $i++) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo "* ";
                    }
                    echo "\n";
                }
                echo '</pre></div>';

                // --- PIRAMIDA 2: Siku-siku Rata Kanan ---
                echo '<div class="piramida-box">';
                echo '<div class="piramida-title">2. Siku-siku Rata Kanan</div>';
                echo '<pre class="hasil">';
                for ($i = 1; $i <= $tinggi; $i++) {
                    for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                        echo "  ";
                    }
                    for ($j = 1; $j <= $i; $j++) {
                        echo "* ";
                    }
                    echo "\n";
                }
                echo '</pre></div>';

                // --- PIRAMIDA 3: Normal Simetris ---
                echo '<div class="piramida-box">';
                echo '<div class="piramida-title">3. Normal Simetris</div>';
                echo '<pre class="hasil">';
                for ($i = 1; $i <= $tinggi; $i++) {
                    for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                        echo " ";
                    }
                    for ($j = 1; $j <= $i; $j++) {
                        echo "* ";
                    }
                    echo "\n";
                }
                echo '</pre></div>';

                // --- PIRAMIDA 4: Terbalik ---
                echo '<div class="piramida-box">';
                echo '<div class="piramida-title">4. Piramida Terbalik</div>';
                echo '<pre class="hasil">';
                for ($i = $tinggi; $i >= 1; $i--) {
                    for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                        echo " ";
                    }
                    for ($j = 1; $j <= $i; $j++) {
                        echo "* ";
                    }
                    echo "\n";
                }
                echo '</pre></div>';

                echo '</div>'; // Tutup result-container
            }
        }
        ?>
    </div>

</body>
</html>