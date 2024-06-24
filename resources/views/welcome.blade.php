<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <script>
        const getPlayer = async () => {
            const response = await fetch('http://127.0.0.1:8000/api/player');
            const data = await response.json();
            data.cards.forEach(card => {
                if (card.rarity === 'rare') {
                    card.level = card.level + 2;
                }
                if (card.rarity === 'epic') {
                    card.level = card.level + 5;
                }
                if (card.rarity === 'legendary') {
                    card.level = card.level + 8;
                }
                if (card.rarity === 'champion') {
                    card.level = card.level + 10;
                }

                console.log(card.name, card.level, card.rarity);
            });
            return data;
        }

        getPlayer();
    </script>
</body>
</html>