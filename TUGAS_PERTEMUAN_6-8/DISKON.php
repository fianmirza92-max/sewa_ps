
<?php
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = $totalBelanja * 0.10;
    } elseif ($totalBelanja >= 50000) {
        $diskon = $totalBelanja * 0.05;
    }

    return $diskon;
}

$totalBelanja = "";
$diskon = 0;
$totalBayar = 0;

if (isset($_POST['hitung'])) {
    $totalBelanja = (int) $_POST['totalBelanja'];

    $diskon = hitungDiskon($totalBelanja);
    $totalBayar = $totalBelanja - $diskon;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hitung Diskon</title>

    <style>
        body {
            font-family: Arial;
            background: #eeeeee;
            padding: 40px;
        }

        .container {
            background: white;
            width: 350px;
            margin: auto;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #2878d0;
            color: white;
            border: none;
            cursor: pointer;
        }

        .hasil {
            background: #f2f2f2;
            padding: 12px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Program Hitung Diskon</h2>

    <form method="POST">
        <label>Total Belanja (Rp)</label>

        <input type="number" name="totalBelanja"
        placeholder="Masukkan total belanja"
        min="0" required>

        <button type="submit" name="hitung">Hitung Diskon</button>
    </form>

    <?php if (isset($_POST['hitung'])) { ?>

    <div class="hasil">
        <h3>Hasil Perhitungan</h3>

        <p>Total Belanja : Rp <?php echo number_format($totalBelanja, 0, ',', '.'); ?></p>

        <p>Diskon : Rp <?php echo number_format($diskon, 0, ',', '.'); ?></p>

        <p>Total Bayar : Rp <?php echo number_format($totalBayar, 0, ',', '.'); ?></p>
    </div>

    <?php } ?>

</div>

</body>
</html>
