const letterToName = {
	'A' : "Aghanim's Scepter", 'B' : 'Black King Bar', 'C' : 'Crystalys', 'D' : 'Daedalus',
	'E' : 'Eye of Skadi', 'F' : 'Force Staff', 'G' : 'Ghost Scepter', 'H' : 'Heart of Tarrasque',
	'I' : 'Iron Branch', 'J' : 'Javelin', 'K' : 'Kaya', 'L' : "Linken's Sphere",
	'M' : 'Mjollnir', 'N' : 'Null Talisman', 'O' : 'Octarine Core', 'P' : 'Power Treads',
	'Q' : 'Quelling Blade', 'R' : 'Radiance', 'S' : 'Shadow Blade', 'T' : 'Tango',
	'U' : 'Urn of Shadows', 'V' : 'Vanguard', 'W' : 'Wind Lace', 'X' : 'Aegis of the Immortal',
	'Y' : 'Yasha', 'Z' : 'Divine Rapier'
};

const nameToPicture = {
    "Aghanim's Scepter" : 'img/Aghanims_Scepter_icon.png', 'Black King Bar' : 'img/Black_King_Bar_icon.png',
    'Crystalys' : 'img/Crystalys_icon.png', 'Daedalus' : 'img/Daedalus_icon.png',
    'Eye of Skadi' : 'img/Eye_of_Skadi_icon.png', 'Force Staff' : 'img/Force_Staff_icon.png',
    'Ghost Scepter' : 'img/Ghost_Scepter_icon.png', 'Heart of Tarrasque' : 'img/Heart_of_Tarrasque_icon.png',
    'Iron Branch' : 'img/Iron_Branch_icon.png', 'Javelin' : 'img/Javelin_icon.png',
    'Kaya' : 'img/Kaya_icon.png', "Linken's Sphere" : 'img/Linkens_Sphere_icon.png',
    'Mjollnir' : 'img/Mjollnir_icon.png', 'Null Talisman' : 'img/Null_Talisman_icon.png',
    'Octarine Core' : 'img/Octarine_Core_icon.png', 'Power Treads' : 'img/Power_Treads_icon.png',
    'Quelling Blade' : 'img/Quelling_Blade_icon.png', 'Radiance' : 'img/Radiance_(Active)_icon.png',
    'Shadow Blade' : 'img/Shadow_Blade_icon.png', 'Tango' : 'img/Tango_icon.png',
    'Urn of Shadows' : 'img/Urn_of_Shadows_icon.png', 'Vanguard' : 'img/Vanguard_icon.png',
    'Wind Lace' : 'img/Wind_Lace_icon.png', 'Aegis of the Immortal' : 'img/Aegis_of_the_Immortal_icon.png',
    'Yasha' : 'img/Yasha_icon.png', 'Divine Rapier' : 'img/Divine_Rapier_icon.png'
};


// Define the function to submit a form with input and action fields
function submitForm() {
	const inputDiv = document.getElementById("input");
	const hiddenInputText = document.getElementById("hiddenInputText");
	const hiddenImagePath = document.getElementById("hiddenImagePath");
	const action = document.getElementById("action").value;

	// Store the input content in localStorage before submitting
	localStorage.setItem("inputContent", inputDiv.innerHTML);

	if (action === "encryption") {
		hiddenInputText.value = inputDiv.textContent || inputDiv.innerText;
	} else if (action === "decryption") {
		const imagePathRegex = /src="([^"]*)"/g;
		let inputPaths = "";
		let match;
		while ((match = imagePathRegex.exec(inputDiv.innerHTML))) {
			inputPaths += match[1] + ",";
		}
		if (inputPaths.length > 0) {
			inputPaths = inputPaths.slice(0, -1); // Remove the last comma
		}
		hiddenImagePath.value = inputPaths;
	}

	// Dynamically create and submit the form
	const form = document.createElement("form");
	form.method = "POST";
	form.action = ""; // Ensure this targets the correct endpoint, if necessary

	// Append the action field to the form
	const actionField = document.createElement("input");
	actionField.type = "hidden";
	actionField.name = "action";
	actionField.value = action;
	form.appendChild(actionField);

	// Append the hidden input fields to the form
	const inputFieldText = document.createElement("input");
	inputFieldText.type = "hidden";
	inputFieldText.name = "hiddenInputText";
	inputFieldText.value = hiddenInputText.value;
	form.appendChild(inputFieldText);

	const inputFieldImage = document.createElement("input");
	inputFieldImage.type = "hidden";
	inputFieldImage.name = "hiddenImagePath";
	inputFieldImage.value = hiddenImagePath.value;
	form.appendChild(inputFieldImage);

	document.body.appendChild(form);
	form.submit();
}

// Function to handle image selection and update input field
function handleImageSelection() {
	const imageContainer = document.getElementById("image-container");
	const inputDiv = document.getElementById("input"); // Ensure this is the correct ID for your input box

	imageContainer.addEventListener("click", function (e) {
		if (e.target && e.target.matches(".selectable-image")) {
			const imagePath = e.target.getAttribute("data-value");

			// Append the new image to the existing content of inputDiv
			inputDiv.innerHTML += `<img src="${imagePath}" alt="Selected Image" style="max-width:100%;">`;

			// Optionally, update the hidden input to include the new image path
			// This assumes updateHiddenInput function is designed to handle multiple paths
			updateHiddenInput(imagePath); // This function is already designed to handle adding/removing paths
		}
	});
}

// Function to update hidden input value
function updateHiddenInput(imagePath) {
	var hiddenInput = document.getElementById("hiddenImagePath");
	var currentPaths = hiddenInput.value ? hiddenInput.value.split(",") : [];

	if (currentPaths.includes(imagePath)) {
		// Remove imagePath from array if it's already there (toggle functionality)
		currentPaths = currentPaths.filter(function (e) {
			return e !== imagePath;
		});
	} else {
		// Add imagePath to array
		currentPaths.push(imagePath);
	}

	// Update hidden input value
	hiddenInput.value = currentPaths.join(",");
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
			document.getElementById("input").innerText = transcript; // Changed from .value to .innerText
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

// Function to populate voice selection dropdown
function populateVoiceList() {
	var voices = speechSynthesis.getVoices();
	var voiceSelect = document.getElementById("voiceSelection");
	voiceSelect.innerHTML = ""; // Clear the dropdown

	// Create and add the 'Select Voice' option as the first option
	var defaultOption = document.createElement("option");
	defaultOption.textContent = "Select Voice";
	defaultOption.value = "";
	voiceSelect.appendChild(defaultOption);

	// Populate the dropdown with available voices
	voices.forEach(function (voice) {
		var option = document.createElement("option");
		option.textContent = voice.name + " (" + voice.lang + ")";
		if (voice.default) {
			option.textContent += " -- DEFAULT";
		}
		option.setAttribute("data-lang", voice.lang);
		option.setAttribute("data-name", voice.name);
		voiceSelect.appendChild(option);
	});
}

// Modified initializeTextToSpeech function to use selected voice
function initializeTextToSpeech() {
	var speakBtn = document.getElementById("speakBtn");
	if (speakBtn) {
		speakBtn.addEventListener("click", function () {
			var outputText = document.getElementById("output").textContent || document.getElementById("output").innerText;
			if ("speechSynthesis" in window) {
				var msg = new SpeechSynthesisUtterance(outputText);
				var voices = window.speechSynthesis.getVoices();
				var voiceSelect = document.getElementById("voiceSelection");
				var selectedOption = voiceSelect.selectedOptions[0].getAttribute("data-name");
				var selectedVoice = voices.find(function (voice) {
					return voice.name === selectedOption;
				});
				if (selectedVoice) {
					msg.voice = selectedVoice;
				} else {
					console.log("Selected voice not found. Using default voice.");
				}
				window.speechSynthesis.speak(msg);
			} else {
				console.log("Your browser does not support the Web Speech Synthesis API");
			}
		});
	}
}

// Call populateVoiceList when the page loads and when voices change
populateVoiceList();
if (speechSynthesis.onvoiceschanged !== undefined) {
	speechSynthesis.onvoiceschanged = populateVoiceList;
}

// Initialize functionalities when DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
	console.log("DOM fully loaded and parsed");
	handleImageSelection();
	toggleDarkMode();
	initializeSpeechRecognition();
	initializeTextToSpeech();

	const inputDiv = document.getElementById("input");

	// Restore stored input content
	const storedInputContent = localStorage.getItem("inputContent");
	if (storedInputContent) {
		inputDiv.innerHTML = storedInputContent;
		localStorage.removeItem("inputContent"); // Optionally clear the stored content
	}

	// Add event listener for input changes
	inputDiv.addEventListener("input", function () {
		const imagePathRegex = /(?:https?:\/\/.*\.(?:png|jpg))/i;
		const content = inputDiv.innerHTML;

		if (imagePathRegex.test(content)) {
			const imagePath = content.match(imagePathRegex)[0];
			inputDiv.innerHTML = `<img src="${imagePath}" alt="Image" style="max-width:100%;">`;
		}
	});
});
