function submitForm() {
	const input = document.getElementById("input").value;
	const action = document.getElementById("action").value;

	const form = document.createElement("form");
	form.method = "POST";
	form.action = "";

	const inputField = document.createElement("input");
	inputField.type = "hidden";
	inputField.name = "input";
	inputField.value = input;
	form.appendChild(inputField);

	const actionField = document.createElement("input");
	actionField.type = "hidden";
	actionField.name = "action";
	actionField.value = action;
	form.appendChild(actionField);

	document.body.appendChild(form);
	form.submit();
}
