function showTab(event, tabId) {
    // Get all tab contents and hide them
    var tabContents = document.getElementsByClassName('tab-content');
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove('active');
    }

    // Get all tab buttons and deactivate them
    var tabButtons = document.getElementsByClassName('tab-button');
    for (var i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove('active');
    }

    // Show the selected tab content and activate the corresponding tab button
    document.getElementById(tabId).classList.add('active');
    event.currentTarget.classList.add('active');
}

// Set the default tab to show
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.tab-button').click();
});
