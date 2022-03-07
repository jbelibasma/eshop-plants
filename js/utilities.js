function loadpanier(panier) {
    var storage = JSON.parse(localStorage.getItem(panier));
    if (storage == null)
        storage = [];
    return storage
}

function saveStorage(data, panier) {
    var storage = JSON.stringify(data);
    localStorage.setItem(panier, storage);
}
