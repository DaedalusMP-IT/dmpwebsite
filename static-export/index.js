// Store feedback data
let feedbackData = {
    name: '',
    number: '',
    service: ''
};

function submitFeedback() {
    const apiUrl = '/api/submit'; // Laravel API endpoint

    readData()

    console.log('Sending data:', feedbackData); // Debug

    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify(feedbackData)
    })
    .then(response => {
        console.log('Response status:', response.status);
        
        // Try to parse response as JSON
        return response.text().then(text => {
            console.log('Response text:', text);
            try {
                // Extract JSON from response (remove PHP warnings)
                const jsonMatch = text.match(/\{.*\}/);
                if (jsonMatch) {
                    const data = JSON.parse(jsonMatch[0]);
                    if (!response.ok) {
                        throw new Error(data.message || 'Ошибка сервера');
                    }
                    return data;
                } else {
                    throw new Error('Нет JSON в ответе');
                }
            } catch (e) {
                console.error('JSON parse error:', e);
                throw new Error('Ошибка обработки ответа сервера');
            }
        });
    })
    .then(data => {
        console.log('Success:', data);
        const modal = document.getElementById("thankYouModal");
        modal.style.display = "block";
    })
    .catch(error => {
        alert('Ошибка отправки: ' + error.message);
        console.error('Error:', error);
    });
} 

function readData() {
    feedbackData.name = document.getElementById('input').value
    feedbackData.number = document.getElementById('input1').value
    feedbackData.service = document.getElementById('input2').value
}

function scrollDown() {
    document.getElementById("target").scrollIntoView({
        behavior: "smooth"
    });
};
  
function closeModal() {
    // Hide the modal
    const modal = document.getElementById("thankYouModal");
    modal.style.display = "none";
}
  
// Close modal if user clicks outside of it
window.onclick = function(event) {
    const modal = document.getElementById("thankYouModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
};