const searchInput = document.getElementById("searchInput");
const dataTable = document
  .getElementById("dataTable")
  .getElementsByTagName("tbody")[0];

searchInput.addEventListener("input", function () {
  const searchText = searchInput.value.toLowerCase();
  const rows = dataTable.getElementsByTagName("tr");

  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const rowData = row.getElementsByTagName("td");
    let foundMatch = false;

    for (let j = 0; j < rowData.length; j++) {
      const cell = rowData[j];

      if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
        foundMatch = true;
        break;
      }
    }

    if (foundMatch) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
});

const roleFilter = document.getElementById("roleFilter");
const tableRows = document.querySelectorAll("#dataTable tbody tr");

roleFilter.addEventListener("change", function () {
  const selectedRole = roleFilter.value.toLowerCase();

  tableRows.forEach((row) => {
    const roleCell = row.querySelector("td[data-role]");
    const role = roleCell.dataset.role.toLowerCase();

    if (selectedRole === "" || role === selectedRole) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
});
