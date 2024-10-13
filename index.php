<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
<div class="container">
        <?
        class Cookie {
            private $type;
            private $availableTypes = ['шоколадное', 'овсяное', 'любятово'];

            public function setType($type) {
                if (in_array($type, $this->availableTypes)) {
                    $this->type = $type;
                } else {
                    throw new InvalidArgumentException();
                }
            }

            public function getType() {
                return $this->type;
            }
        }

        $message = "";
        $selectedType = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cookie = new Cookie();
            try {
                $selectedType = trim($_POST['cookieType']);
                $cookie->setType($selectedType);
                $message = "Вы выбрали: " . $cookie->getType() . ".  " ."Печенье есть в наличии!";
            } catch (InvalidArgumentException $e) {
                $message = "Печенья нет в наличии";
            }
        }
        ?>

        <h2>Какие вам печеньки?</h2>
        <form method="POST">
            <input type="text" name="cookieType" value="<?php echo htmlspecialchars($selectedType); ?>" placeholder="Введите название" required>
            <input type="submit" value="Проверить">
        </form>

        <div class="error"><?php echo $message; ?></div>
        <h4>P.S. для проверки есть шоколадное, овсяное, любятого печеньки</h4>
    </div>
    
</body>
</html>