// Get the input fields
const horaEntrada = document.getElementById('h_entrada');
const horaSaida = document.getElementById('h_saida');

// Add a change event listener to the horaSaida field
horaSaida.addEventListener('change', () => {
  // Check if the horaEntrada value is greater than the horaSaida value
  if (horaEntrada.value > horaSaida.value) {
    // Display an error message
    alert('Hora de entrada não pode ser maior que hora de saída!');
    // Reset the horaSaida value to the previous value
    horaSaida.value = horaSaida.dataset.previousValue;
  } else {
    // Store the current horaSaida value as the previous value
    horaSaida.dataset.previousValue = horaSaida.value;
  }
});
