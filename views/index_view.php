<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to My Website</h1>
    </header>
    <main>
        <p>Datenbank-Einträge:</p>
        <?php foreach($results AS $result): ?>
        <?php echo $result['hersteller'] ?>
        <?php endforeach; ?>
    </main>
    <footer>
        <p>&copy; 2024 Your Name</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>