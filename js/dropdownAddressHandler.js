const countryDropdown = document.getElementById("sgnCouSel");
const cityDropdown = document.getElementById("sgnCitSel");
const phoneNumberInput = document.getElementById("sgnPhoInp");
cityDropdown.disabled = true;
const citiesByCountry = {
  Philippines: ["Manila", "Quezon City", "Cebu City", "Davao City"],
  // Add more countries and cities as needed
};

countryDropdown.addEventListener("change", function () {
  const selectedCountry = countryDropdown.value;
  if (selectedCountry !== null) {
    cityDropdown.disabled = false;
  }
  populateCityDropdown(selectedCountry);
  updatePhoneNumberCountryCode(selectedCountry);
});

function populateCityDropdown(country) {
  cityDropdown.innerHTML = ""; // Clear existing options

  const cities = citiesByCountry[country] || [];
  cities.forEach((city) => {
    const option = document.createElement("option");
    option.value = city;
    option.text = city;
    cityDropdown.appendChild(option);
  });
}

function updatePhoneNumberCountryCode(country) {
  phoneNumberInput.innerHTML = "";

  const countryCodes = {
    Philippines: "+63",
  };

  const countryCode = countryCodes[country] || "";
  phoneNumberInput.value = countryCode + " ";
}
