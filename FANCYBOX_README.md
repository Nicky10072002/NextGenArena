# Fancybox Implementation for YouTube Videos

## Overview
This project now uses Fancybox to display YouTube videos in an elegant, responsive lightbox overlay.

## Features Implemented

### 1. Fancybox Integration
- **CDN Links**: Fancybox CSS and JS are loaded from CDN
- **Video Support**: Both YouTube videos now use Fancybox for enhanced viewing experience
- **Responsive Design**: Videos adapt to different screen sizes

### 2. Styling Features
- **Attractive Buttons**: Video links are styled as gradient buttons with hover effects
- **Play Icon**: Animated play button (▶) with pulse animation
- **Hover Effects**: Smooth transitions and elevation on hover
- **Responsive**: Different sizes for mobile, tablet, and desktop

### 3. Configuration Options
- **Animation**: Smooth zoom in/out transitions
- **Video Settings**: 16:9 aspect ratio, no autoplay
- **Keyboard Navigation**: Full keyboard support (arrows, escape, etc.)
- **Touch Support**: Drag to close functionality
- **Fullscreen**: Fullscreen video viewing option

## Files Modified

### 1. `Pages/Home.html`
- Updated second video to use Fancybox (`data-fancybox` attribute)
- Added Fancybox configuration script with enhanced options
- Both videos now use consistent Fancybox implementation

### 2. `StyleSheets/Home.css`
- Added comprehensive styling for Fancybox video links
- Responsive design for mobile, tablet, and desktop
- Hover effects and animations
- Gradient backgrounds and play button styling

## Usage

### Video Links
```html
<a data-fancybox data-type="iframe" 
   src="https://www.youtube.com/embed/VIDEO_ID" 
   title="Video Title">
   Open YouTube Video
</a>
```

### CSS Classes
- `.video-wrapper a[data-fancybox]` - Main video button styling
- `.video-wrapper a[data-fancybox]:hover` - Hover effects
- `.video-wrapper a[data-fancybox]::before` - Play button icon

## Browser Support
- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile browsers (iOS Safari, Chrome Mobile)
- Responsive design for all screen sizes

## Benefits
1. **Better UX**: Professional video viewing experience
2. **Mobile Friendly**: Touch-optimized for mobile devices
3. **Keyboard Accessible**: Full keyboard navigation support
4. **Performance**: Lightweight and fast loading
5. **Customizable**: Easy to modify styling and behavior

## Future Enhancements
- Add video thumbnails
- Implement video playlists
- Add custom video controls
- Support for other video platforms (Vimeo, etc.) 