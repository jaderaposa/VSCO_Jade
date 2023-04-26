// Get references to HTML elements
const inputContainer = document.getElementById('input-container');
const addBtn = document.getElementById('add-btn');

// Add event listener to "Add Input" button
addBtn.addEventListener('click', () => {
  // Create new input row
  const newRow = document.createElement('div');
  newRow.classList.add('input-row');
  newRow.setAttribute('style', 'margin-bottom:5px;');

  // Create new input element
  const newInput = document.createElement('input');
  newInput.setAttribute('type', 'text');
  newInput.setAttribute('name', 'input[]');
  newInput.setAttribute('placeholder', '');
  newInput.setAttribute('style', 'width:274px;margin-right:5px;');

  const icon = document.createElement('i');
  icon.classList.add('fa', 'fa-minus');

  // Create new "Remove" button
  const removeBtn = document.createElement('button');
  removeBtn.classList.add('remove-btn');
  removeBtn.setAttribute('style', 'border: none;background: transparent;padding: 0;margin: 0;');
  removeBtn.textContent = '';

  removeBtn.appendChild(icon);

  // Add event listener to "Remove" button
  removeBtn.addEventListener('click', () => {
    newRow.remove();
  });

  // Add new input and "Remove" button to input row
  newRow.appendChild(newInput);
  newRow.appendChild(removeBtn);

  // Add new input row to input container
  inputContainer.appendChild(newRow);
});