function search() {
    const array = document.querySelector('#keywords').value.trim().split(' ');
    const keywords = array.slice(1);
    const mechanism = array[0];
    var query = null;
    var base = null;
    if (array.length < 2) {
        return;
    }
    switch (mechanism) {
        case '@g':
            base = 'https://www.google.com/search?q=';
            query = keywords.join('+'); break;
        case '@y':
            base = 'https://www.youtube.com/results?search_query=';
            query = keywords.join('+'); break;
        case '@a':
            base = 'https://animesonlinecc.to/search/';
            query = keywords.join('+'); break;
        case '@f':
            base = 'https://animefire.plus/pesquisar/';
            query = keywords.join('-'); break;
        case '@w':
            base = 'https://wallpapercave.com/search?q=';
            query = keywords.join('+'); break;
        case '@m':
            base = 'https://lista.mercadolivre.com.br/';
            query = keywords.join('-'); break;
        default:
            return;
    }
    window.location.assign(base+query);
}

document.querySelector('#keywords').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        search();
    }
});
