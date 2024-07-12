document.querySelectorAll('.button').forEach(function(button) {
    button.addEventListener('click', function() {
        var buttonId = this.id;
        fetch(`log_click.php?button=${buttonId}`)
            .then(response => response.text())
            .then(data => {
                console.log(data);
                fetchLog();
            });
    });
});

function fetchLog() {
    fetch('display_logs.php')
        .then(response => response.text())
        .then(data => {
            const logContainer = document.getElementById('log');
            logContainer.innerHTML = data;
            showLogsTemporarily();
        });
}

function showLogsTemporarily() {
    const logContainer = document.getElementById('log');
    logContainer.style.display = 'block';
    setTimeout(() => {
        logContainer.style.display = 'none';
    }, 7000);
}
