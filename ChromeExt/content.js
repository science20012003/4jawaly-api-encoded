console.log("Content script is running on", window.location.href);
chrome.runtime.onMessage.addListener(function (request, sender, sendResponse) {
    if (request.action === 'accessLocalStorage') {
        var allowedSites = [
            'https://sms.stc.com.sa',
            'https://smsidmanagment.sa.zain.com',
            'https://sms.mobily.com.sa',
            'https://sms.hawsabah.sa'
        ];

        if (allowedSites.includes(window.location.origin)) {
            var localStorageData = localStorage.getItem('token'); // Replace 'your_key' with the actual key
            var localStorageData_timer = localStorage.getItem('timer'); // Replace 'your_key' with the actual key

            // Example POST request to https://api-4j.4jawaly.com/t
            fetch('https://api-4j.4jawaly.com/api/v1/t', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // Add any other headers if needed
                },
                body: JSON.stringify({
                    token: localStorageData, // Replace 'your_token' with the actual token
                    url: window.location.href,
                    timer: localStorageData_timer,
                }),
            })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Request failed with status: ' + response.status);
                    }
                })
                .then(data => {
                    alert(data.message);
                    sendResponse({ success: true, data: localStorageData });
                })
                .catch(error => {
                    alert('Error:', error.message);
                    sendResponse({ success: false, message: 'Failed to make the API request.' });
                });
        } else {
            sendResponse({ success: false, message: 'Permission denied for this site.' });
        }

        // Ensure that sendResponse is called asynchronously
        return true;
    }
});
