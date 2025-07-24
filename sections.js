// Section content loader
const sections = {
    'comparison': 'sections/comparison.html',
    'overview': 'sections/overview.html',
    'blade': 'sections/blade.html',
    'livewire': 'sections/livewire.html',
    'alpine': 'sections/alpine.html',
    'htmx': 'sections/htmx.html',
    'vue': 'sections/vue.html',
    'react': 'sections/react.html',
    'inertia': 'sections/inertia.html'
};

// Load section content
async function loadSection(sectionName) {
    const elementId = `${sectionName}-content`;
    const element = document.getElementById(elementId);
    
    if (!element) return;
    
    try {
        const response = await fetch(sections[sectionName]);
        if (response.ok) {
            const content = await response.text();
            element.innerHTML = content;
            
            // Re-run highlight.js on new content
            setTimeout(() => {
                document.querySelectorAll(`#${elementId} pre code`).forEach((block) => {
                    hljs.highlightElement(block);
                });
            }, 100);
        } else {
            element.innerHTML = `<p class="text-red-600">Error loading ${sectionName} content.</p>`;
        }
    } catch (error) {
        element.innerHTML = `<p class="text-red-600">Error loading ${sectionName} content: ${error.message}</p>`;
    }
}

// Load all sections on page load
document.addEventListener('DOMContentLoaded', async () => {
    for (const section of Object.keys(sections)) {
        await loadSection(section);
    }
});