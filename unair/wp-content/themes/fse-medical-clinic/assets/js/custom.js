document.addEventListener('DOMContentLoaded', () => {
    function createFullCircleText(target, size = 150) {
        const textElement = target.querySelector('p');
        const text = textElement.textContent.trim();
        const radius = size / 2; // Radius of the circle
        const segmentAngle = 360 / text.length; // Angle per character for a full circle

        // Clear existing content
        textElement.textContent = '';
        textElement.style.position = 'relative';
        textElement.style.display = 'inline-block';
        textElement.style.width = `${size}px`;

        // Create and position each character
        text.split('').forEach((char, index) => {
            const angle = index * segmentAngle; // Position character along the circle
            const charElement = document.createElement('span');
            charElement.textContent = char;
            charElement.classList.add('semi-circle-char');
            charElement.style.rotate = `${angle}deg`;
            charElement.style.transform = `translateY(-${radius}px)`;
            textElement.appendChild(charElement);
        });
    }

    // Initialize the text for a full circle
    const circleText = document.querySelector('.circle-text');
    if (circleText) {
        createFullCircleText(circleText, 120); // Adjust size as needed
    }
});
