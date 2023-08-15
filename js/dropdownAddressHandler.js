const countryDropdown = document.getElementById('country');
const cityDropdown = document.getElementById('city');

const citiesByCountry = {
  Philippines: ['Manila', 'Quezon City', 'Cebu City', 'Davao City'],
  // Add more countries and cities as needed
};

countryDropdown.addEventListener('change', function () {
  const selectedCountry = countryDropdown.value;
  populateCityDropdown(selectedCountry);
});

function populateCityDropdown(country) {
  cityDropdown.innerHTML = ''; // Clear existing options

  const cities = citiesByCountry[country] || [];
  cities.forEach((city) => {
    const option = document.createElement('option');
    option.value = city;
    option.text = city;
    cityDropdown.appendChild(option);
  });
}
