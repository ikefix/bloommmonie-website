document.addEventListener('DOMContentLoaded', function () {
  const steps = Array.from(document.querySelectorAll('.step'));
  const nextBtns = document.querySelectorAll('.next-btn');
  const prevBtns = document.querySelectorAll('.prev-btn');
  const indicators = [
    document.getElementById('step-1-indicator'),
    document.getElementById('step-2-indicator'),
    document.getElementById('step-3-indicator')
  ];
  const form = document.querySelector('form');

  let currentStep = 0;

  function showStep(index) {
    steps.forEach((step, i) => {
      step.style.display = i === index ? 'block' : 'none';
      indicators[i].classList.toggle('active', i === index);
    });
  }

  function validateStep(index) {
    const inputs = steps[index].querySelectorAll('input, select, textarea');
    for (let input of inputs) {
      if (!input.checkValidity()) {
        input.reportValidity(); // shows the browser's validation message
        return false;
      }
    }
    return true;
  }

  nextBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (validateStep(currentStep)) {
        if (currentStep < steps.length - 1) {
          currentStep++;
          showStep(currentStep);
        }
      }
    });
  });

  prevBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
      }
    });
  });

  // Validate all steps on submit
  form.addEventListener('submit', (e) => {
    for (let i = 0; i < steps.length; i++) {
      if (!validateStep(i)) {
        e.preventDefault(); // stop submission
        currentStep = i;
        showStep(currentStep); // go to first invalid step
        return false;
      }
    }
  });

  // Handle 'Other' options
  const industrySelect = document.getElementById('industry');
  const customIndustryContainer = document.getElementById('customIndustryContainer');
  const inventorySelect = document.getElementById('currentInventorySystem');
  const customInventorySystemContainer = document.getElementById('customInventorySystemContainer');

  industrySelect.addEventListener('change', () => {
    customIndustryContainer.classList.toggle('hidden', industrySelect.value !== 'Other');
  });

  inventorySelect.addEventListener('change', () => {
    customInventorySystemContainer.classList.toggle('hidden', inventorySelect.value !== 'other');
  });

  // Initial render
  showStep(currentStep);
});
