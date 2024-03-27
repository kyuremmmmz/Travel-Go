
//==============================================ok function

const searchInput = document.getElementById('search');
const searchResults = document.getElementById('my-box');

// Simulated data for autocomplete suggestions
const suggestions = [ "Manila", "Quezon City", "Caloocan", "Makati", "Taguig", "Pasig",
"Valenzuela", "Parañaque",  "Muntinlupa", "Marikina",
"Navotas", "Malabon", "San Juan", "Pasay", "Mandaluyong", "Pateros",   "Parañaque",
"Las Piñas", "Muntinlupa", "Marikina", "Navotas", 
 "Mandaluyong", "Pateros",  "Manila", 
  "Pasig",  "Parañaque",
"Muntinlupa", "Marikina", "Navotas",  
"Mandaluyong", "Pateros", "Manila", "Quezon City",
 "Pasig", "Parañaque", "Muntinlupa",
"Marikina", "Navotas",  "Mandaluyong",
"Pateros",  "Manila",  "Cebu City",
"Bacolod City",
"Iloilo City",
"Tacloban City",
"Lapu-Lapu City",
"Mandaue City",
"Ormoc City",
"Roxas City",
"Tagbilaran City",
"Dumaguete City",
"Borongan City",
"Bago City",
"Baybay City",
"Calbayog City",
"Catbalogan City",
"Maasin City",
"Sagay City",
"Sipalay City",
"Silay City",
"Talisay City (Cebu)",
"Tanjay City",
"Toledo City",
"Victorias City",
"Carcar City",
"Kabankalan City",
"Himamaylan City",
"Bais City",
"Bayawan City",
"Canlaon City",
"Guihulngan City",
"Davao City",
"Cagayan de Oro City",
"Zamboanga City",
"General Santos City",
"Iligan City",
"Butuan City",
"Koronadal City",
"Tagum City",
"Kidapawan City",
"Dipolog City",
"Pagadian City",
"Malaybalay City",
"Cotabato City",
"Valencia City",
"Oroquieta City",
"Dapitan City",
"Mati City",
"Panabo City",
"Samal City",
"Tacurong City",
"Surigao City",
"Tandag City",
"Bislig City",
"Gingoog City",
"Cabadbaran City",
"Midsayap",
"Surallah",
"Isulan",
"Sultan Kudarat",
"Mlang",
"Tacurong",
"Buluan",
"Kabacan",
"Pigcawayan",
"Magpet",
"Bansalan",
"Malungon",
"Maasim",
"Kiamba",
"Pangasinan",
"San Fabian",
"Pampanga",
"Bulacan",
"Barangay Bayag (Cebu City)",
"Burat (Samar)",
"Agoo",
"La Union",
"Dagupan City",
"Malasiqui",
"Bahay ng pogi"
];

// Function to filter suggestions based on user input
function filterSuggestions(input) {
    return suggestions.filter(suggestion =>
        suggestion.toLowerCase().includes(input.toLowerCase())
    );
}

// Function to display autocomplete suggestions
function showSuggestions(input) {
    const filteredSuggestions = filterSuggestions(input);
    searchResults.innerHTML = '';
    filteredSuggestions.forEach(suggestion => {
        const li = document.createElement('li');
        li.textContent = suggestion;
        li.addEventListener('click', () => {
            searchInput.value = suggestion;
            searchResults.style.display = 'none';
        });
        searchResults.appendChild(li);
    });
    searchResults.style.display = filteredSuggestions.length > 0 ? 'block' : 'none';
}

// Event listener for input field
searchInput.addEventListener('input', () => {
    showSuggestions(searchInput.value);
});

// Event listener to hide suggestions when clicking outside the search box
document.addEventListener('click', (event) => {
    if (!searchResults.contains(event.target) && event.target !== searchInput) {
        searchResults.style.display = 'none';
    }
});









