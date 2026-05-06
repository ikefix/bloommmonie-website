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

  function stepHasEmptyRequiredFields(index) {
    const inputs = steps[index].querySelectorAll('input, select, textarea');
    for (let input of inputs) {
      if (input.hasAttribute('required') && !input.value.trim()) {
        input.focus();
        return true;
      }
    }
    return false;
  }

  nextBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (!stepHasEmptyRequiredFields(currentStep)) {
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

  form.addEventListener('submit', function(e) {
    for (let i = 0; i < steps.length; i++) {
      if (stepHasEmptyRequiredFields(i)) {
        e.preventDefault();
        currentStep = i;
        showStep(currentStep);
        alert("Please fill in all required fields in this step."); // optional
        return false;
      }
    }
  });

  // Handle 'Other' options
  const industrySelect = document.getElementById('industry');
  const customIndustryContainer = document.getElementById('customIndustryContainer');
  const inventorySelect = document.getElementById('currentInventorySystem');
  const customInventorySystemContainer = document.getElementById('customInventorySystemContainer');

  if (industrySelect && customIndustryContainer) {
    industrySelect.addEventListener('change', () => {
      customIndustryContainer.classList.toggle('hidden', industrySelect.value !== 'Other');
    });
  }

  if (inventorySelect && customInventorySystemContainer) {
    inventorySelect.addEventListener('change', () => {
      customInventorySystemContainer.classList.toggle('hidden', inventorySelect.value !== 'other');
    });
  }

  showStep(currentStep);
});
