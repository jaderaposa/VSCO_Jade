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

document.addEventListener("DOMContentLoaded", function () {
	console.log("DOM fully loaded and parsed"); // Check if DOMContentLoaded is triggered
	const imageContainer = document.getElementById("image-container");
	console.log(imageContainer); // Verify the imageContainer is correctly selected
	const inputTextarea = document.getElementById("input");
	console.log(inputTextarea); // Verify the inputTextarea is correctly selected

	imageContainer.addEventListener("click", function (e) {
		console.log("Image container clicked");
		if (e.target && e.target.matches(".selectable-image")) {
			const imagePath = e.target.getAttribute("data-value");
			console.log(imagePath);

			// Check if the input box already contains text
			if (inputTextarea.value.length > 0) {
				// If yes, append the new path after a comma
				inputTextarea.value += "," + imagePath;
			} else {
				// If no, simply set the input box value to the new path
				inputTextarea.value = imagePath;
			}
		}
	});

	// Add your speech recognition code here
	var speechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
	if (speechRecognition) {
		var recognition = new speechRecognition();
		recognition.onresult = function (event) {
			var transcript = "";
			for (var i = event.resultIndex; i < event.results.length; ++i) {
				transcript += event.results[i][0].transcript;
			}
			document.getElementById("input").value = transcript;
		};
		// Additional speech recognition setup like start, stop, etc. can go here
	} else {
		console.log("Speech recognition not supported in this browser.");
	}
});

// Add this to your theme_template.js or create a new JS file and include it in your HTML
document.addEventListener("DOMContentLoaded", (event) => {
	const toggleButton = document.getElementById("dark-mode-toggle");
	const iconSun = toggleButton.querySelector(".fa-sun");
	const iconMoon = toggleButton.querySelector(".fa-moon");

	toggleButton.addEventListener("click", () => {
		document.body.classList.toggle("dark-mode");
		// Check if dark mode is active
		if (document.body.classList.contains("dark-mode")) {
			iconSun.style.display = "none";
			iconMoon.style.display = "";
		} else {
			iconSun.style.display = "";
			iconMoon.style.display = "none";
		}
	});
});

// Check if the browser supports the SpeechRecognition API
// Define speechRecognition in a global scope
var speechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;

document.addEventListener("DOMContentLoaded", function () {
	console.log("DOM fully loaded and parsed");

	// Other DOMContentLoaded code...

	// Check if the browser supports the SpeechRecognition API
	if (typeof speechRecognition !== "undefined") {
		var recognition = new speechRecognition();
		var speechInput = document.getElementById("speechInput");
		var startBtn = document.getElementById("startBtn");

		recognition.continuous = true;
		recognition.interimResults = true;
		recognition.lang = "en-US";

		var isListening = false; // Flag to track recording state

		startBtn.onclick = function () {
			console.log("Start button clicked");
			if (!isListening) {
				recognition.start();
				console.log("Recognition started");
				isListening = true;
				startBtn.classList.add("listening");
			} else {
				recognition.stop();
				console.log("Recognition stopped");
				isListening = false;
				startBtn.classList.remove("listening");
			}
		};

		recognition.onresult = function (event) {
			console.log("Recognition result received");
			var transcript = "";
			for (var i = event.resultIndex; i < event.results.length; ++i) {
				transcript += event.results[i][0].transcript;
			}
			console.log("Transcript:", transcript);
			document.getElementById("input").value = transcript;
		};

		recognition.onerror = function (event) {
			console.error("Speech recognition error", event.error);
		};

		recognition.onend = function () {
			isListening = false;
			startBtn.classList.remove("listening");
		};
	} else {
		console.log("Your browser does not support the Web Speech API");
	}
});
