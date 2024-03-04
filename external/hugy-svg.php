<?php

class HuGySVG {
    static public function get($type) {
    
        $svg = '';
        $viewBox = "0 0 40 40";
        switch($type) {
            case 'facebook':
                $svg = '<path d="M22.2,33.9V21.2h4.3l0.6-4.9h-4.9v-3.2c0-1.4,0.4-2.4,2.4-2.4l2.6,0V6.3c-0.5-0.1-2-0.2-3.8-0.2 c-3.8,0-6.4,2.3-6.4,6.5v3.6h-4.3v4.9H17v12.7H22.2L22.2,33.9z"/>';
                break;
            case 'dexter':
                $svg = '<path d="M6.6,17.1C7.2,17,7.8,17,8.5,17c1.1,0,1.9,0.2,2.4,0.7c0.5,0.5,0.9,1.1,0.9,2.1c0,1.3-0.5,2.4-1.4,3.1 c-0.8,0.6-1.8,0.9-3.2,0.9c-0.8,0-1.5-0.1-1.8-0.1L6.6,17.1z M7,22.6c0.2,0,0.4,0,0.6,0c0.8,0,1.5-0.3,1.9-0.8 c0.5-0.5,0.7-1.2,0.7-2c0-1.1-0.6-1.7-1.8-1.7c-0.2,0-0.5,0-0.6,0L7,22.6z"/>
                        <path d="M16.3,23.5c-0.6,0.3-1.3,0.4-1.8,0.4c-1.4,0-2.1-0.8-2.1-2.1c0-1.5,1.1-3,2.9-3c1,0,1.7,0.6,1.7,1.5 c0,1.2-1.2,1.7-3.2,1.6c0,0.1,0.1,0.4,0.2,0.5c0.2,0.2,0.5,0.4,0.9,0.4c0.5,0,1-0.1,1.4-0.3L16.3,23.5z M15,19.8 c-0.7,0-1.1,0.6-1.2,1c1.1,0,1.7-0.1,1.7-0.6C15.6,20,15.4,19.8,15,19.8z"/>
                        <path d="M19.1,18.9l0.3,0.7c0.1,0.4,0.2,0.6,0.3,0.8h0c0.2-0.3,0.3-0.5,0.5-0.8l0.5-0.8h1.6l-2.1,2.4l1.1,2.5H20 L19.7,23c-0.1-0.4-0.2-0.6-0.3-0.9h0c-0.1,0.2-0.3,0.5-0.5,0.8l-0.6,0.9h-1.7l2.1-2.5l-1.1-2.4C17.5,18.9,19.1,18.9,19.1,18.9z"/>
                        <path d="M25.1,17.6l-0.2,1.3h1L25.7,20h-1l-0.3,1.7c0,0.2-0.1,0.4-0.1,0.6c0,0.2,0.1,0.4,0.4,0.4c0.1,0,0.3,0,0.4,0 l-0.2,1.1c-0.2,0.1-0.5,0.1-0.9,0.1c-0.9,0-1.3-0.4-1.3-1.1c0-0.3,0-0.5,0.1-0.9l0.4-1.9h-0.6l0.2-1.1h0.6l0.2-0.9L25.1,17.6z"/>
                        <path d="M29.9,23.5c-0.6,0.3-1.3,0.4-1.8,0.4c-1.4,0-2.1-0.8-2.1-2.1c0-1.5,1.1-3,2.8-3c1,0,1.7,0.6,1.7,1.5 c0,1.2-1.2,1.7-3.2,1.6c0,0.1,0.1,0.4,0.2,0.5c0.2,0.2,0.5,0.4,0.9,0.4c0.5,0,1-0.1,1.4-0.3L29.9,23.5z M28.6,19.8 c-0.7,0-1.1,0.6-1.2,1c1.1,0,1.7-0.1,1.7-0.6C29.1,20,28.9,19.8,28.6,19.8z"/>
                        <path d="M30.8,23.8l0.5-2.9c0.1-0.7,0.2-1.6,0.2-2h1.2c0,0.3,0,0.7-0.1,1h0c0.4-0.6,0.9-1.1,1.6-1.1 c0.1,0,0.2,0,0.3,0l-0.3,1.4c-0.1,0-0.1,0-0.2,0c-0.9,0-1.3,0.8-1.5,1.8l-0.3,1.8H30.8z"/>';
                break;
            case 'schema':
                $svg = '<circle class="st0" cx="20" cy="20.4" r="11.5"/>
                        <line class="st0" x1="20" y1="12.3" x2="20" y2="22.4"/>
                        <line class="st0" x1="21" y1="20.9" x2="27.7" y2="20.9"/>';
                break;
            case 'infomentor':
                $svg = '<path d="M5.1,12.8c0,0.3-0.2,0.5-0.6,0.5c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.6-0.5C4.9,12.2,5.1,12.5,5.1,12.8z M4.1,19v-4.8H5V19H4.1z"/>
                        <path d="M6.5,15.5c0-0.5,0-0.9,0-1.3h0.8L7.2,15h0c0.2-0.4,0.8-0.9,1.6-0.9c0.7,0,1.7,0.4,1.7,2.1V19H9.7v-2.8 c0-0.8-0.3-1.4-1.1-1.4c-0.6,0-1,0.4-1.2,0.9c0,0.1-0.1,0.3-0.1,0.4V19H6.5L6.5,15.5L6.5,15.5z"/>
                        <path d="M12.1,19v-4.2h-0.7v-0.7h0.7v-0.2c0-0.7,0.2-1.3,0.6-1.7c0.3-0.3,0.8-0.4,1.2-0.4c0.3,0,0.6,0.1,0.8,0.1 l-0.1,0.7c-0.1-0.1-0.3-0.1-0.6-0.1c-0.8,0-0.9,0.6-0.9,1.4v0.3h1.2v0.7H13V19L12.1,19L12.1,19z"/>
                        <path d="M19.2,16.5c0,1.8-1.2,2.6-2.4,2.6c-1.3,0-2.3-1-2.3-2.5c0-1.6,1.1-2.6,2.4-2.6C18.2,14.1,19.2,15.1,19.2,16.5 z M15.3,16.6c0,1.1,0.6,1.9,1.5,1.9c0.8,0,1.5-0.8,1.5-1.9c0-0.8-0.4-1.8-1.4-1.8C15.8,14.7,15.3,15.7,15.3,16.6z"/>
                        <path d="M4,25.7c0-0.6,0-1.1,0-1.6h1.3l0.1,0.7h0C5.5,24.4,6,24,6.8,24c0.6,0,1.1,0.3,1.3,0.8h0 c0.2-0.3,0.4-0.5,0.6-0.6C9.1,24.1,9.4,24,9.7,24c0.9,0,1.6,0.7,1.6,2.1V29H9.9v-2.7c0-0.7-0.2-1.1-0.7-1.1 c-0.4,0-0.6,0.2-0.7,0.5c0,0.1-0.1,0.3-0.1,0.4V29H6.9v-2.7c0-0.6-0.2-1-0.7-1c-0.4,0-0.6,0.3-0.7,0.5c-0.1,0.1-0.1,0.3-0.1,0.4 V29H4L4,25.7L4,25.7z"/>
                        <path d="M13.8,27c0,0.6,0.7,0.9,1.4,0.9c0.5,0,0.9-0.1,1.3-0.2l0.2,1c-0.5,0.2-1.1,0.3-1.8,0.3c-1.7,0-2.6-1-2.6-2.5 c0-1.2,0.8-2.6,2.5-2.6c1.6,0,2.2,1.2,2.2,2.4c0,0.3,0,0.5-0.1,0.6H13.8z M15.5,26c0-0.4-0.2-1-0.9-1c-0.6,0-0.9,0.6-0.9,1H15.5z" />
                        <path d="M17.9,25.7c0-0.6,0-1.1,0-1.6h1.3l0.1,0.7h0c0.2-0.3,0.7-0.8,1.5-0.8c1,0,1.7,0.7,1.7,2.1V29H21v-2.7 c0-0.6-0.2-1.1-0.8-1.1c-0.4,0-0.7,0.3-0.8,0.6c0,0.1-0.1,0.2-0.1,0.4V29h-1.5L17.9,25.7L17.9,25.7z"/>
                        <path d="M25.4,22.8v1.3h1.1v1.1h-1.1V27c0,0.6,0.1,0.9,0.6,0.9c0.2,0,0.3,0,0.4,0l0,1.1c-0.2,0.1-0.6,0.1-1,0.1 c-0.5,0-0.9-0.2-1.1-0.4c-0.3-0.3-0.4-0.8-0.4-1.4v-2h-0.6v-1.1h0.6v-0.9L25.4,22.8z"/>
                        <path d="M32.1,26.5c0,1.8-1.3,2.6-2.6,2.6c-1.4,0-2.5-0.9-2.5-2.5c0-1.6,1-2.6,2.6-2.6C31.1,24,32.1,25,32.1,26.5z M28.6,26.5c0,0.8,0.4,1.5,1,1.5c0.6,0,1-0.6,1-1.5c0-0.7-0.3-1.5-1-1.5C28.9,25.1,28.6,25.8,28.6,26.5z"/>
                        <path d="M33.1,25.7c0-0.7,0-1.2,0-1.6h1.3l0.1,0.9h0c0.2-0.7,0.8-1,1.3-1c0.1,0,0.2,0,0.3,0v1.4c-0.1,0-0.2,0-0.4,0 c-0.6,0-0.9,0.3-1,0.8c0,0.1,0,0.2,0,0.3V29h-1.5L33.1,25.7L33.1,25.7z"/>';
                break;
            case 'matsedel':
                $svg = '<path d="M17.5,18.1v2L18,30.3v0.1c0,0.8-0.6,1.3-1.3,1.3c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-10.2v-2 c-1.1-0.5-1.9-1.9-1.9-3.6v-4.4c0-0.3,0.2-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v3.6c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-4 c0-0.3,0.3-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v4c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-3.6c0-0.3,0.3-0.5,0.5-0.5 c0.3,0,0.5,0.2,0.5,0.5v4.4C19.4,16.2,18.6,17.7,17.5,18.1L17.5,18.1z"/>
                        <path d="M24.6,31.7c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-9.3c-0.7,0-1.3-0.6-1.3-1.3v-3.2c0-4,0.9-7.2,1.9-7.2 c0.6,0,1.1,0.5,1.1,1.1v9.8L26,30.3v0.1C26,31.1,25.4,31.7,24.6,31.7L24.6,31.7z"/>
                        <path d="M17.5,18.1v2L18,30.3v0.1c0,0.8-0.6,1.3-1.3,1.3c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-10.2v-2 c-1.1-0.5-1.9-1.9-1.9-3.6v-4.4c0-0.3,0.2-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v3.6c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-4 c0-0.3,0.3-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v4c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-3.6c0-0.3,0.3-0.5,0.5-0.5 c0.3,0,0.5,0.2,0.5,0.5v4.4C19.4,16.2,18.6,17.7,17.5,18.1L17.5,18.1z"/>
                        <path d="M24.6,31.7c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-9.3c-0.7,0-1.3-0.6-1.3-1.3v-3.2c0-4,0.9-7.2,1.9-7.2 c0.6,0,1.1,0.5,1.1,1.1v9.8L26,30.3v0.1C26,31.1,25.4,31.7,24.6,31.7L24.6,31.7z"/>';
                break;
            case 'instagram':
                $svg = '<path d="M19.9,6c-3.8,0-4.3,0-5.7,0.1c-1.5,0.1-2.5,0.3-3.4,0.7S9.1,7.6,8.4,8.4s-1.3,1.5-1.6,2.4s-0.6,1.9-0.7,3.4S6,16.2,6,20
                        s0,4.3,0.1,5.7c0.1,1.5,0.3,2.5,0.7,3.4s0.8,1.7,1.6,2.5c0.8,0.8,1.6,1.3,2.5,1.6c0.9,0.4,1.9,0.6,3.4,0.7c1.5,0.1,2,0.1,5.7,0.1
                        s4.3,0,5.7-0.1c1.5-0.1,2.5-0.3,3.4-0.7c0.9-0.4,1.7-0.8,2.5-1.6c0.8-0.8,1.3-1.6,1.6-2.5c0.4-0.9,0.6-1.9,0.7-3.4
                        c0.1-1.5,0.1-2,0.1-5.7s0-4.3-0.1-5.7c-0.1-1.5-0.3-2.5-0.7-3.4c-0.4-0.9-0.8-1.7-1.6-2.5c-0.8-0.8-1.6-1.3-2.5-1.6
                        c-0.9-0.4-1.9-0.6-3.4-0.7C24.3,6.1,23.8,6,19.9,6z M25.6,8.6C27,8.7,27.7,9,28.2,9.2c0.7,0.2,1.1,0.5,1.6,1c0.5,0.5,0.8,1,1.1,1.6
                        c0.2,0.5,0.4,1.2,0.5,2.6c0.1,1.5,0.1,1.9,0.1,5.6s0,4.2-0.1,5.6c-0.1,1.4-0.3,2.1-0.5,2.6c-0.3,0.7-0.6,1.1-1.1,1.6
                        c-0.5,0.5-1,0.8-1.6,1.1c-0.5,0.2-1.2,0.4-2.6,0.5c-1.5,0.1-1.9,0.1-5.6,0.1c-3.8,0-4.2,0-5.6-0.1c-1.4-0.1-2.1-0.3-2.6-0.5
                        c-0.7-0.3-1.1-0.6-1.6-1.1s-0.8-1-1.1-1.6c-0.2-0.5-0.4-1.2-0.5-2.6c-0.1-1.5-0.1-1.9-0.1-5.6s0-4.2,0.1-5.6C8.6,13,8.8,12.2,9,11.7
                        c0.3-0.7,0.6-1.1,1.1-1.6s1-0.8,1.6-1.1c0.5-0.2,1.2-0.4,2.6-0.5c1.5-0.1,1.9-0.1,5.6-0.1 M19.9,12.8c-4,0-7.2,3.2-7.2,7.2
                        s3.2,7.2,7.2,7.2s7.2-3.2,7.2-7.2C27.2,16,23.9,12.8,19.9,12.8z M19.9,24.6c-2.6,0-4.7-2.1-4.7-4.7s2.1-4.7,4.7-4.7s4.7,2.1,4.7,4.7
                        S22.5,24.6,19.9,24.6z M29.1,12.6c0,0.9-0.8,1.7-1.7,1.7c-0.9,0-1.7-0.8-1.7-1.7s0.8-1.7,1.7-1.7C28.3,10.9,29.1,11.6,29.1,12.6z"/>';
                break;
            case 'tiktok':
                $svg = '<path d="M29.1,12c-0.2-0.1-0.4-0.2-0.6-0.3c-0.5-0.3-1-0.7-1.4-1.2c-1.1-1.2-1.5-2.4-1.6-3.3h0C25.4,6.5,25.5,6,25.5,6h-4.8v18.6
                        c0,0.2,0,0.5,0,0.7c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0,0,0,0,0,0c-0.1,1.4-0.9,2.6-2.1,3.2c-0.6,0.3-1.3,0.5-2,0.5
                        c-2.2,0-4.1-1.8-4.1-4.1s1.8-4.1,4.1-4.1c0.4,0,0.8,0.1,1.2,0.2l0-4.9c-2.5-0.3-5,0.4-6.9,2c-0.8,0.7-1.5,1.6-2.1,2.5
                        c-0.2,0.3-1,1.8-1.1,4c-0.1,1.3,0.3,2.6,0.5,3.2v0c0.1,0.3,0.6,1.4,1.3,2.4c0.6,0.8,1.3,1.4,2.1,2v0l0,0c2.3,1.6,4.9,1.5,4.9,1.5
                        c0.4,0,1.9,0,3.6-0.8c1.9-0.9,3-2.2,3-2.2c0.7-0.8,1.2-1.7,1.6-2.7c0.4-1.1,0.6-2.5,0.6-3.1v-9.9c0.1,0,0.8,0.5,0.8,0.5
                        s1.1,0.7,2.9,1.2c1.3,0.3,2.9,0.4,2.9,0.4v-4.8C31.5,12.8,30.3,12.6,29.1,12z"/>';
                break;
            case 'menu':
                $viewBox = "0 0 108 108";
                $svg = '<path class="st0" d="M104,54c0,27.6-22.4,50-50,50C26.4,104,4,81.6,4,54C4,26.4,26.4,4,54,4C81.6,4,104,26.4,104,54z M81.5,68.4
                        c-0.5-0.5-1-0.7-1.7-0.7H28.1c-0.6,0-1.2,0.3-1.7,0.7c-0.5,0.5-0.7,1.1-0.7,1.8v5c0,0.7,0.2,1.3,0.7,1.7c0.5,0.5,1,0.7,1.7,0.7h51.8
                        c0.6,0,1.2-0.3,1.7-0.7c0.5-0.5,0.7-1.1,0.7-1.7v-5C82.2,69.5,82,68.9,81.5,68.4z M81.5,48.9c-0.5-0.5-1-0.8-1.7-0.8H28.1
                        c-0.6,0-1.2,0.3-1.7,0.8c-0.5,0.5-0.7,1.1-0.7,1.7v5c0,0.7,0.2,1.3,0.7,1.8c0.5,0.5,1,0.7,1.7,0.7h51.8c0.6,0,1.2-0.3,1.7-0.7
                        c0.5-0.5,0.7-1.1,0.7-1.8v-5C82.2,50,82,49.4,81.5,48.9z M81.5,31.1c-0.5-0.5-1-0.8-1.7-0.8H28.1c-0.6,0-1.2,0.3-1.7,0.8
                        c-0.5,0.5-0.7,1.1-0.7,1.8v5c0,0.7,0.2,1.3,0.7,1.8c0.5,0.5,1,0.7,1.7,0.7h51.8c0.6,0,1.2-0.2,1.7-0.7c0.5-0.5,0.7-1.1,0.7-1.8v-5
                        C82.2,32.2,82,31.6,81.5,31.1z"/>';
                break;
            case 'picto':
                $viewBox = "0 0 108 108";
                $svg = '<path class="st0" d="M99.3,49.3C99.3,24.3,79,4,54,4C29,4,8.7,24.3,8.7,49.3S29,94.5,54,94.5c3.3,0,6.5-0.4,9.6-1l2.2,10.5 c18.6-8.9,31.9-27.3,33.3-49.3c0.1-1.5,0.1-3,0.1-4.5C99.2,49.9,99.3,49.6,99.3,49.3"/>
                        <path class="st1" d="M60.3,77.5c0,0,0.8,16.3,0.8,16.5c0.1,0,0.1,0,0.2,0c0.4-0.1,0.7-0.1,1.1-0.2c0.4-0.1,0.9-0.2,1.3-0.3 C63.5,93.2,60.3,77.5,60.3,77.5"/>';
                break;
            case 'search':
                $viewBox = "0 0 108 108";
                $svg = '<path class="st0" d="M104,54c0,27.6-22.4,50-50,50C26.4,104,4,81.6,4,54C4,26.4,26.4,4,54,4C81.6,4,104,26.4,104,54z"/>
                        <path class="st1" d="M65.7,49.3c0-4.5-1.6-8.4-4.8-11.6c-3.2-3.2-7.1-4.8-11.6-4.8c-4.5,0-8.4,1.6-11.6,4.8
                            c-3.2,3.2-4.8,7-4.8,11.6c0,4.5,1.6,8.4,4.8,11.6c3.2,3.2,7.1,4.8,11.6,4.8c4.5,0,8.4-1.6,11.6-4.8C64.1,57.7,65.7,53.8,65.7,49.3z
                            M84.4,79.8c0,1.3-0.4,2.4-1.4,3.3c-0.9,0.9-2,1.4-3.3,1.4c-1.3,0-2.4-0.5-3.3-1.4L63.9,70.6c-4.3,3-9.2,4.5-14.6,4.5
                            c-3.5,0-6.8-0.7-10-2c-3.2-1.3-5.9-3.2-8.2-5.5c-2.3-2.3-4.1-5-5.5-8.2c-1.3-3.2-2-6.5-2-10c0-3.5,0.7-6.8,2-10
                            c1.4-3.2,3.2-5.9,5.5-8.2c2.3-2.3,5.1-4.2,8.2-5.5c3.2-1.4,6.5-2,10-2c3.5,0,6.8,0.7,10,2c3.2,1.4,5.9,3.2,8.2,5.5
                            c2.3,2.3,4.1,5,5.5,8.2c1.4,3.2,2,6.5,2,10c0,5.4-1.5,10.2-4.5,14.6l12.5,12.5C84,77.4,84.4,78.5,84.4,79.8z"/>';
                break;
            case 'exclamation':
                $viewBox = "0 0 108 108";
                $svg = '<path class="st0" d="M104,54c0,27.6-22.4,50-50,50C26.4,104,4,81.6,4,54C4,26.4,26.4,4,54,4C81.6,4,104,26.4,104,54z"/>
                        <g>
                            <path class="st2" d="M60.5,83.8c0,2.7-1,4.9-3,6.9c-2,1.9-4.4,2.9-7.1,2.9c-2.7,0-5.1-1-7.1-2.9c-2-1.9-3-4.2-3-6.9 c0-2.7,1-5,3-6.9c2-1.9,4.4-2.9,7.1-2.9c2.7,0,5,1,7.1,2.9C59.5,78.9,60.5,81.2,60.5,83.8z"/>
                            <path class="st2" d="M70.4,33.9c-1.5,3.2-3.6,7.8-6.2,13.7c-2.7,6-5.4,12.7-8.3,20.1h-4c0.4-8.9,0.6-16.2,0.6-21.7 c0-5.5,0-9.5,0-11.9c0-2.1,0-3.7,0.1-4.9c0.1-1.2,0.2-2.4,0.5-3.7c0.7-3.2,2.3-5.6,4.7-7.2c2.4-1.6,4.9-2.4,7.7-2.4 c2.4,0,4.3,0.7,5.9,2.2c1.6,1.4,2.3,3.2,2.3,5.4c0,1.1-0.2,2.5-0.7,4.1C72.4,29.3,71.5,31.4,70.4,33.9z"/>
                        </g>';
                break;
        }
        if ($svg != '') {
            $svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="' . $viewBox . '" preserveAspectRatio="xMaxYMid meet" style="enable-background:new 0 0 40 40;" xml:space="preserve"><g>'.$svg.'</g></svg>';
        }
        return "<span class='quick-svg quick-{$type}'>{$svg}</span>";
		
    }
}