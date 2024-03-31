
//==============================================ok function


const searchInput = document.getElementById('search');
const autocompleteItems = document.getElementById('my-box');
let typingTimer;
const doneTypingInterval = 500; // milliseconds

searchInput.addEventListener('input', function() {
    clearTimeout(typingTimer);
    const query = this.value.trim();
    if (query !== '') {
        typingTimer = setTimeout(() => {
            fetchSuggestions(query);
        }, doneTypingInterval);
    } else {
        clearSuggestions();
    }
});

function fetchSuggestions(query) {
    const myHeaders = new Headers();
    myHeaders.append("X-API-KEY", "2ed3f8f207ac5be7669b246d2924381911403f34");
    myHeaders.append("Content-Type", "application/json");

    const raw = JSON.stringify({
        "q": query,
        "gl": "ph",
        "type": "autocomplete",
        "engine": "google"
    });

    const requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    fetch("https://google.serper.dev/places", requestOptions)
    .then(response => response.json())
    .then(data => {
        displaySuggestions(data.suggestions);
    })
    .catch(error => console.log('error', error));
}

function displaySuggestions(suggestions) {
    clearSuggestions();
    if (Array.isArray(suggestions)) {
        suggestions.forEach(suggestion => {
            const suggestionElement = document.createElement('li');
            suggestionElement.classList.add('my-box');
            suggestionElement.textContent = suggestion.value;
            suggestionElement.addEventListener('click', function() {
                searchInput.value = suggestion.value;
                clearSuggestions();
                // Perform search or other action here
            });
            autocompleteItems.appendChild(suggestionElement);
        });
        autocompleteItems.style.display = 'block'; // Display autocomplete items
    } else {
        console.error('Suggestions is not an array:', suggestions);
    }
}

function clearSuggestions() {
    while (autocompleteItems.firstChild) {
        autocompleteItems.removeChild(autocompleteItems.firstChild);
    }
    autocompleteItems.style.display = 'none';
}