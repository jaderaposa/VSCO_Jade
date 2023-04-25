// Get references to HTML elements
const inputContainer = document.getElementById('input-container');
const addBtn = document.getElementById('add-btn');

// Add event listener to "Add Input" button
addBtn.addEventListener('click', () => {
  // Create new input row
  const newRow = document.createElement('div');
  newRow.classList.add('input-row');

  // Create new input element
  const newInput = document.createElement('input');
  newInput.setAttribute('type', 'text');
  newInput.setAttribute('name', 'input[]');
  newInput.setAttribute('placeholder', '');

  // Create new "Remove" button
  const removeBtn = document.createElement('button');
  removeBtn.classList.add('remove-btn');
  removeBtn.textContent = 'Remove';

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