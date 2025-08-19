import './bootstrap';

import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
  duration: 1000, // animation duration (ms)
  once: true      // animate only once
});

window.Alpine = Alpine;

Alpine.start();
