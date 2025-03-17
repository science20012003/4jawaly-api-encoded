document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('accessLocalStorage').addEventListener('click', accessLocalStorage);
});

function accessLocalStorage() {
    chrome.tabs.query({ active: true, currentWindow: true }, function (tabs) {
        chrome.tabs.sendMessage(tabs[0].id, { action: 'accessLocalStorage' }, function (response) {
            console.log(response);
        });
    });
}
