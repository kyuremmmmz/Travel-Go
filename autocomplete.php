<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Autocomplete Search</title>
<style>
    .autocomplete {
        position: relative;
        display: inline-block;
    }

    input[type="text"] {
        width: 300px;
        padding: 10px;
        font-size: 16px;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-top: none;
        z-index: 99;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #ffffff;
        max-height: 200px;
        overflow-y: auto;
    }

    .autocomplete-item {
        padding: 10px;
        cursor: pointer;
    }

    .autocomplete-item:hover {
        background-color: #f1f1f1;
    }
</style>
</head>
<body>

<div class="autocomplete">
    <input type="text" id="searchInput" placeholder="Search...">
    <div class="autocomplete-items" id="autocompleteItems"></div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const autocompleteItems = document.getElementById('autocompleteItems');
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
                const suggestionElement = document.createElement('div');
                suggestionElement.classList.add('autocomplete-item');
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
</script>

</body>
</html>
