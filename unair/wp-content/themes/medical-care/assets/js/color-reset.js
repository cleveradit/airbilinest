(function($) {
    function resetColorsToDefault() {
        // Define default values for your color settings
        const defaultColors = {
            'background_color': '#ffffff',
            'medical_care_primary_color': '#29b6f6',
            'medical_care_secondary_color': '#003153',
            'medical_care_service_bg': '#f3fbff',
            'medical_care_heading_color': '#000',
            'medical_care_text_color' :'#656566',
            'medical_care_primary_fade': '#ebf9ff',
            'medical_care_post_bg': '#ffffff',
        };

        // Iterate over each setting and set it to its default value
        for (let settingId in defaultColors) {
            wp.customize(settingId).set(defaultColors[settingId]);
        }

        // Optionally refresh the preview
        wp.customize.previewer.refresh();
    }

    // Attach reset function to global scope
    window.resetColorsToDefault = resetColorsToDefault;

    $(document).ready(function() {
        $('.color-reset-btn').val('RESET'); // This adds the 'RESET' text inside the button
    });
})(jQuery);