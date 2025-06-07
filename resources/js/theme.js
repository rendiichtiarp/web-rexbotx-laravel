// Theme Management
const themeToggle = () => {
    // Check if theme exists in localStorage
    const theme = localStorage.getItem('theme') || 'dark';
    
    // Function to update theme
    const updateTheme = (theme) => {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        
        // Update checkbox state
        const toggles = document.querySelectorAll('.theme-controller');
        toggles.forEach(toggle => {
            toggle.checked = theme === 'dark';
        });
    };

    // Initial theme setup
    updateTheme(theme);

    // Listen to toggle changes
    document.addEventListener('DOMContentLoaded', () => {
        const toggles = document.querySelectorAll('.theme-controller');
        
        toggles.forEach(toggle => {
            // Set initial state
            toggle.checked = theme === 'dark';
            
            // Listen to changes
            toggle.addEventListener('change', (e) => {
                const newTheme = e.target.checked ? 'dark' : 'light';
                updateTheme(newTheme);
            });
        });
    });
};

export default themeToggle; 