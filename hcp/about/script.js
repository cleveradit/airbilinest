// script.js

function toggleMenu() {
    const navbar = document.getElementById("navbar");
    navbar.classList.toggle("active");
}

function toggleRoadmap() {
    const content = document.getElementById('roadmapContent');
    content.classList.toggle('collapsed');
}