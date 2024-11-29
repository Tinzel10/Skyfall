<!DOCTYPE html>
<html>
<head>
    <title>Quadratic Equation Calculator</title>
</head>
<body>
    <h2>Kuadratik</h2>

    <?php
    $a = "";
    $b = "";
    $c = "";
    $x1 = "";
    $x2 = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];

        // Check if the inputs are numeric
        if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
            // Calculate the discriminant
            $discriminant = ($b * $b) - (4 * $a * $c);

            if ($discriminant > 0) {
                $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
                $x2 = (-$b - sqrt($discriminant)) / (2 * $a);
            } elseif ($discriminant == 0) {
                $x1 = $x2 = -$b / (2 * $a);
            } else {
                $x1 = "No real roots";
                $x2 = "No real roots";
            }
        } else {
            $x1 = "Invalid inputs";
            $x2 = "Invalid inputs";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Masukkan koefisien dari persamaan ax^2 + bx + c:<br><br>
        a: <input type="text" name="a" value="<?php echo $a; ?>"><br><br>
        b: <input type="text" name="b" value="<?php echo $b; ?>"><br><br>
        c: <input type="text" name="c" value="<?php echo $c; ?>"><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php if ($x1 !== "" && $x2 !== ""): ?>
        <h3>Hasil:</h3>
        <p>x1: <?php echo $x1; ?></p>
        <p>x2: <?php echo $x2; ?></p>
    <?php endif; ?>
</body>
</html>
