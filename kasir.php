<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Harga Bayar dengan Diskon</title>
    <style>
body {
    font-family: 'Verdana', sans-serif;
    background-color: #e3e4e8;
    display: grid;
    place-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #ffffff;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    max-width: 400px;
    text-align: left;
}

h1 {
    color: #2c3e50;
    margin-bottom: 15px;
    font-size: 24px;
    font-weight: 700;
}

label {
    font-weight: 500;
    display: inline-block;
    margin-bottom: 5px;
    color: #3e4a56;
}

input[type="text"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

input[type="text"]:focus, select:focus {
    border-color: #16a085;
}

button {
    background-color: #1abc9c;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #148f77;
}

h2 {
    color: #2c3e50;
    margin: 10px 0;
    font-size: 20px;
}


    </style>
</head>
<body>

<div class="container">
    <h1>Kalkulator Kasir Belanja</h1>
    <form method="POST">
        <label for="member">Status Member</label>
        <select name="member" id="member">
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>

        <label for="total">Total Belanja</label>
        <input type="text" id="total" name="total" placeholder="Masukkan total belanja" required>

        <button type="submit" name="submit">Hitung Diskon</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $is_member = $_POST['member'] === 'yes';
        $total_belanja = floatval($_POST['total']);
        $diskon = 0;
        $potongan = 0;

        if ($is_member) {
            if ($total_belanja >= 1000000) {
                $diskon = 15;
                $potongan = 10; 
            } elseif ($total_belanja >= 500000) {
                $diskon = 10;
                $potongan = 10; 
            } else {
                $potongan = 10; 
            }
        } else {
            if ($total_belanja >= 1000000) {
                $diskon = 10;
            } elseif ($total_belanja >= 500000) {
                $diskon = 5;
            } else {
                $diskon = 0; 
            }
        }

        $jumlah_diskon = ($diskon / 100) * $total_belanja;
        $potongan_diskon = ($potongan / 100) * $total_belanja;
        $total_bayar = $total_belanja - $jumlah_diskon - $potongan_diskon;

        if ($diskon > 0) {
            echo "<h2>Diskon: $diskon%</h2>";
            echo "<h2>Jumlah Diskon: Rp " . number_format($jumlah_diskon, 0, ',', '.') . "</h2>";
        }
        
        if ($potongan > 0) {
            echo "<h2>Potongan: $potongan%</h2>";
            echo "<h2>Jumlah Potongan: Rp " . number_format($potongan_diskon, 0, ',', '.') . "</h2>";
        }

        echo "<h2>Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "</h2>";
    }
    ?>
</div>

</body>
</html>