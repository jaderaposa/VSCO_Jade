// Define the function to submit a form with input and action fields
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

// Function to handle image selection and update input field
function handleImageSelection() {
	const imageContainer = document.getElementById("image-container");
	const inputTextarea = document.getElementById("input");

	imageContainer.addEventListener("click", function (e) {
		if (e.target && e.target.matches(".selectable-image")) {
			const imagePath = e.target.getAttribute("data-value");

			if (inputTextarea.value.length > 0) {
				inputTextarea.value += "," + imagePath;
			} else {
				inputTextarea.value = imagePath;
			}
		}
	});
}

// Function to toggle dark mode
function toggleDarkMode() {
	const toggleButton = document.getElementById("dark-mode-toggle");
	const iconSun = toggleButton.querySelector(".fa-sun");
	const iconMoon = toggleButton.querySelector(".fa-moon");

	toggleButton.addEventListener("click", () => {
		document.body.classList.toggle("dark-mode");

		if (document.body.classList.contains("dark-mode")) {
			iconSun.style.display = "none";
			iconMoon.style.display = "";
		} else {
			iconSun.style.display = "";
			iconMoon.style.display = "none";
		}
	});
}

// Function to initialize speech recognition
function initializeSpeechRecognition() {
	var speechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
	if (typeof speechRecognition !== "undefined") {
		var recognition = new speechRecognition();
		var isListening = false; // Flag to track recording state
		var startBtn = document.getElementById("startBtn");

		recognition.continuous = true;
		recognition.interimResults = true;
		recognition.lang = "en-US";

		startBtn.onclick = function () {
			if (!isListening) {
				recognition.start();
				isListening = true;
				startBtn.classList.add("listening");
			} else {
				recognition.stop();
				isListening = false;
				startBtn.classList.remove("listening");
			}
		};

		recognition.onresult = function (event) {
			var transcript = "";
			for (var i = event.resultIndex; i < event.results.length; ++i) {
				transcript += event.results[i][0].transcript;
			}
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
}

// Function to handle text-to-speech
function initializeTextToSpeech() {
    var speakBtn = document.getElementById("speakBtn");
    if (speakBtn) {
        speakBtn.addEventListener("click", function () {
            var outputText = document.getElementById("output").textContent || document.getElementById("output").innerText;
            if ('speechSynthesis' in window) {
                var msg = new SpeechSynthesisUtterance(outputText);
                window.speechSynthesis.speak(msg);
            } else {
                console.log("Your browser does not support the Web Speech Synthesis API");
            }
        });
    }
}

// Initialize functionalities when DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
	console.log("DOM fully loaded and parsed");
	handleImageSelection();
	toggleDarkMode();
	initializeSpeechRecognition();
	initializeTextToSpeech();
});
