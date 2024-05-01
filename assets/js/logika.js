document.addEventListener('DOMContentLoaded', function () {
  function updateCosts() {
    var passengersInput = document.getElementById('passengers');
    var passengers = parseInt(passengersInput.value) || 0;

    // if (passengers < 1) {
    //   passengers = 1;
    //   passengersInput.value = passengers;
    // }

    var stayLength =
      parseInt(document.getElementById('stay_length').value) || 0;

    // if (stayLength < 1) {
    //   stayLength = 1;
    //   document.getElementById('stay_length').value = stayLength;
    // }

    var hargaPaket = {
      'Paket A': 500000,
      'Paket B': 750000,
      'Paket C': 1000000,
      'Paket D': 1250000,
    };
    var hargaServis = {
      penginapan: 300000,
      transportasi: 200000,
      konsumsi: 150000,
    };

    // hitung total paket
    var selectedPackage = document.getElementById('package').value;
    var totalPackage = hargaPaket[selectedPackage] * passengers;
    document.getElementById('total_paket').value = parseInt(totalPackage);

    // hitung total layanan
    var totalServices = 0;
    var checkboxes = document.querySelectorAll(
      'input[type="checkbox"]:checked'
    );
    checkboxes.forEach(function (checkbox) {
      var service = checkbox.id;
      var serviceCost = hargaServis[service] * stayLength * passengers;
      totalServices += serviceCost;
    });
    document.getElementById('total_layanan').value = parseInt(totalServices);

    // hitung toal biaya
    var totalCost = totalPackage + totalServices;
    document.getElementById('total_cost').value = parseInt(totalCost);
  }

  document.getElementById('passengers').addEventListener('input', updateCosts);
  document.getElementById('stay_length').addEventListener('input', updateCosts);
  document.getElementById('package').addEventListener('change', updateCosts);
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', updateCosts);
  });
});
