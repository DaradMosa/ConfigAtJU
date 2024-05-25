let lastPressedButtons = [];

function buttonPressed(buttonName, url) {
    // Update the array of last pressed buttons
    lastPressedButtons.unshift(buttonName);
    if (lastPressedButtons.length > 2) {
        lastPressedButtons.pop();
    }

    // Update the text in the 'last-buttons' span
    document.getElementById('last-buttons').innerText = lastPressedButtons.join(', ');

    // Navigate to the specified URL
    window.location.href = url;
}
