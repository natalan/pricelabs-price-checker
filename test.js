function fetchPriceCheck(checkInDate, checkOutDate) {
    const baseUrl = 'https://natalan.com/wp-json/natalan/v1/pricecheck/';
    const url = new URL(baseUrl);
    url.searchParams.append('check_in', checkInDate);
    url.searchParams.append('check_out', checkOutDate);

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
}

// Example usage:
fetchPriceCheck('2024-03-08', '2024-03-15');