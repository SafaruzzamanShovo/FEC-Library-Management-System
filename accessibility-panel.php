<!-- Floating Accessibility Panel -->
<div id="accessibility-panel" class="accessibility-panel">
  <h5>Accessibility Settings</h5>
  
  <!-- Close Button (Cross) -->
  <span id="close-panel" class="close-panel-btn" onclick="togglePanel()">×</span>

  <!-- Font Size Controls -->
  <div class="control-group">
    <label for="font-size">Font Size</label>
    <button id="increase-font" class="btn-control">A+</button>
    <button id="decrease-font" class="btn-control">A-</button>
  </div>

  <!-- Contrast Controls -->
  <div class="control-group">
    <label for="contrast">Contrast</label>
    <button id="high-contrast" class="btn-control">High Contrast</button>
    <button id="normal-contrast" class="btn-control">Normal</button>
  </div>

  <!-- Text to Speech Control (Optional) -->
  <!-- <button id="text-to-speech" class="btn-control">Text to Speech</button> -->
</div>

<!-- Add accessibility panel button -->
<div class="accessibility-toggle" onclick="togglePanel()">
  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
</div>

<!-- Custom Styles for the Accessibility Panel -->
<style>
  /* Floating Accessibility Panel */
  .accessibility-panel {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    display: none;
    z-index: 9999;
    max-width: 250px;
  }

  /* Button styling for control */
  .btn-control {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    margin: 5px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
  }

  .btn-control:hover {
    background-color: #0056b3;
  }

  /* Toggle button to show the accessibility panel */
  .accessibility-toggle {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    padding: 12px 15px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    z-index: 50;
  }

  .accessibility-toggle i {
    font-size: 20px;
  }

  /* Contrast Mode Styling */
  .high-contrast {
    background-color: #000;
    color: #fff;
  }

  .normal-contrast {
    background-color: #fff;
    color: #000;
  }

  /* Control group styling */
  .control-group {
    margin-bottom: 15px;
  }

  /* Cross button to close the panel */
  .close-panel-btn {
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 20px;
    color: #333;
    cursor: pointer;
    font-weight: bold;
  }
</style>

<!-- JavaScript for Accessibility Controls -->
<script>
  // Toggle Accessibility Panel visibility
  function togglePanel() {
    const panel = document.getElementById('accessibility-panel');
    panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
  }

  // Get the current font size
  let currentFontSize = parseFloat(window.getComputedStyle(document.body).fontSize);

  // Function to increase font size
  document.getElementById('increase-font').addEventListener('click', function() {
    currentFontSize += 2;  // Increase font size by 2px
    document.body.style.fontSize = currentFontSize + 'px';
  });

  // Function to decrease font size
  document.getElementById('decrease-font').addEventListener('click', function() {
    currentFontSize -= 2;  // Decrease font size by 2px
    document.body.style.fontSize = currentFontSize + 'px';
  });

  // Set High Contrast Mode
  document.getElementById('high-contrast').addEventListener('click', function() {
    document.body.classList.add('high-contrast');
    document.body.classList.remove('normal-contrast');
  });

  // Set Normal Contrast Mode
  document.getElementById('normal-contrast').addEventListener('click', function() {
    document.body.classList.add('normal-contrast');
    document.body.classList.remove('high-contrast');
  });

  // Optional: Text to Speech feature (requires additional integration with APIs)
  /*
  document.getElementById('text-to-speech').addEventListener('click', function() {
    const text = document.body.innerText;
    const speech = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(speech);
  });
  */
</script>
