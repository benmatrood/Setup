export function truncate(str, n) {
    return str.length > n ? str.substr(0, n - 2) + '...' : str;
}

export function dateTransformer(date) {
    const dateParts = date.split('-');
    const jour = dateParts[2];
    const mois = dateParts[1];
    const annee = dateParts[0];

    return `${jour}-${mois}-${annee}`;
}