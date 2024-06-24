const levelFormat = (card) => {
    if (card.rarity === 'rare') {
        if (card.level === 12) {
            card.level = 14;
        }
    }
    if (card.rarity === 'epic') {
        if (card.level === 8) {
            card.level = 14;
        } else if (card.level === 9) {
            card.level = 15;
        }
    }
    if (card.rarity === 'legendary') {
        if (card.level === 6) {
            card.level = 14;
        } else if (card.level === 7) {
            card.level = 15;
        }
    }

    return card;
};

export default levelFormat;