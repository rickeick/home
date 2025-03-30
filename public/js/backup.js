const params = new URLSearchParams(window.location.search);

if (params.has('backup')) {
    response = params.get('backup');
    if (response == 0) {
        alert("Backup concluído com Sucesso!")
    } else {
        alert("Falhar ao executar o backup!")
    }
}

document.addEventListener("keydown", function(event) {
    if (event.altKey && event.key.toLowerCase() === "b") {
        event.preventDefault();
        window.location.replace("/backup");
    }
});
