// document.addEventListener('DOMContentLoaded', function () {
//   function updateCosts() {
//     let passengersInput = document.getElementById('passengers');
//     let passengers = parseInt(passengersInput.value) || 0;
//     let stayLength = parseInt(document.getElementById('stay_length').value) || 0;
//     let valueDiskon = document.getElementById('diskon');

//     let hargaPaket = {
//       Standar: 500000,
//       Delux: 750000,
//       Family: 1000000,
//     };
//     let hargaServis = {
//       transportasi: 200000,
//       konsumsi: 80000,
//     };

//     // parse ke rupiah
//     function formatRupiah(number) {
//       return new Intl.NumberFormat('id-ID', {
//         style: 'currency',
//         currency: 'IDR',
//       }).format(number);
//     }

//     // hitung total biaya paket
//     let selectedPackage = document.getElementById('package').value;
//     let totalPackage = hargaPaket[selectedPackage] * passengers;

//     // hitung diskon
//     if (stayLength > 3) {
//       totalPackage *= 0.9;
//     }

//     document.getElementById('total_paket').value = formatRupiah(totalPackage);

//     // hitung total biaya layanan
//     let totalServices = 0;
//     let checkboxes = document.querySelectorAll(
//       'input[type="checkbox"]:checked'
//     );
//     checkboxes.forEach(function (checkbox) {
//       let service = checkbox.id;
//       let serviceCost = hargaServis[service] * stayLength * passengers;
//       totalServices += serviceCost;
//     });
//     document.getElementById('total_layanan').value =
//       formatRupiah(totalServices);

//     // hitung total biaya keseluruhan
//     let totalCost = totalPackage + totalServices;
//     document.getElementById('total_cost').value = formatRupiah(totalCost);
//   }

//   document.getElementById('passengers').addEventListener('input', updateCosts);
//   document.getElementById('stay_length').addEventListener('input', updateCosts);
//   document.getElementById('package').addEventListener('change', updateCosts);
//   let checkboxes = document.querySelectorAll('input[type="checkbox"]');
//   checkboxes.forEach(function (checkbox) {
//     checkbox.addEventListener('change', updateCosts);
//   });

//   // validasi identitas
//   let identityInput = document.getElementById('identity');
//   identityInput.addEventListener('input', function () {
//     var identity = document.getElementById('identity').value;
//     var errorDiv = document.getElementById('identity-error');
//     var submitButton = document.getElementById('submit-button');

//     if (identity.length !== 16) {
//       errorDiv.style.display = 'block';
//       submitButton.disabled = true;
//     } else {
//       errorDiv.style.display = 'none';
//       submitButton.disabled = false;
//     }
//   });
// });
document.addEventListener('DOMContentLoaded', function () {
  function updateCosts() {
    let passengersInput = document.getElementById('passengers');
    let passengers = parseInt(passengersInput.value) || 0;
    let stayLength =
      parseInt(document.getElementById('stay_length').value) || 0;
    let valueDiskon = document.getElementById('discount');

    let hargaPaket = {
      Standar: 500000,
      Delux: 750000,
      Family: 1000000,
    };
    let hargaServis = {
      transportasi: 200000,
      konsumsi: 80000,
    };

    // parse ke rupiah
    function formatRupiah(number) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
      }).format(number);
    }

    // hitung total biaya paket
    let selectedPackage = document.getElementById('package').value;
    let totalPackage = hargaPaket[selectedPackage] * passengers;

    // hitung diskon
    if (stayLength > 3) {
      totalPackage *= 0.9;
      valueDiskon.value = 10; 
    } else {
      // valueDiskon.value = ''; 
    }

    document.getElementById('total_paket').value = formatRupiah(totalPackage);

    // hitung total biaya layanan
    let totalServices = 0;
    let checkboxes = document.querySelectorAll(
      'input[type="checkbox"]:checked'
    );
    checkboxes.forEach(function (checkbox) {
      let service = checkbox.id;
      let serviceCost = hargaServis[service] * stayLength * passengers;
      totalServices += serviceCost;
    });
    document.getElementById('total_layanan').value =
      formatRupiah(totalServices);

    // hitung total biaya keseluruhan
    let totalCost = totalPackage + totalServices;
    document.getElementById('total_cost').value = formatRupiah(totalCost);
  }

  document.getElementById('passengers').addEventListener('input', updateCosts);
  document.getElementById('stay_length').addEventListener('input', updateCosts);
  document.getElementById('package').addEventListener('change', updateCosts);
  let checkboxes = document.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', updateCosts);
  });

  // validasi identitas
  let identityInput = document.getElementById('identity');
  identityInput.addEventListener('input', function () {
    var identity = document.getElementById('identity').value;
    var errorDiv = document.getElementById('identity-error');
    var submitButton = document.getElementById('submit-button');

    if (identity.length !== 16) {
      errorDiv.style.display = 'block';
      submitButton.disabled = true;
    } else {
      errorDiv.style.display = 'none';
      submitButton.disabled = false;
    }
  });
});
